<?php

namespace App\Http\Controllers;

use App\Loai_san_pham;
use App\Producer;
use App\San_pham;
use Illuminate\Http\Request;
use App\Chi_nhanh;

class SanPhamController extends Controller
{
    public function index(Request $req)
    {
        if ($req->searchid) {
            $product = San_pham::where('id', 'like', '%' . $req->searchid . '%')->get();
        } else if ($req->searchname) {
            $product = San_pham::where('ten_sp', 'like', '%' . $req->searchname . '%')->get();
        } else if ($req->catalog) {
            $product = San_pham::where('loai_spID', '=', '' . $req->catalog)->get();
        } else {
            $product = San_pham::orderby('id', 'desc')->get();
        }
        $cate = Loai_san_pham::all();

        return view('backend.product.index', compact('product', 'cate'));
    }

    public function cateIndex()
    {
        $cate = Loai_san_pham::all();
        return view('backend.category.index', compact('cate'));
    }

    public function getAdd()
    {
        $ds_cn = Chi_nhanh::all();
        foreach ($ds_cn as $row) {
            $chi_nhanh = array(
                'id' => $row->id,
                'ten_chi_nhanh' => $row->ten_chi_nhanh,
                'embed' => $row->embed
            );
            $ds[] = $chi_nhanh;
        }

        $cate = Loai_san_pham::all();
        return view('backend.product.add', compact('cate','ds'));
    }

    public function getCateAdd()
    {

        return view('backend.category.add');
    }

    public function add(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'category' => 'required',
                'description' => 'required',
                'price' => 'required',
                'mfg' => 'required',
                'chinhanh' => 'required',
                'warranty' => 'required',

                'image' => 'required',
            ],
            [
                'name.required' => "Nhập tên sản phẩm",
                'description.required' => "Nhập mô tả sản phẩm",
                'price.required' => "Nhập giá sản phẩm",
                'mfg.required' => "Nhập ngày sản xuất sản phẩm",
                'chinhanh.required' => "Nhập chi nhánh có sản phẩm",
                'warranty.required' => "Nhập thời gian bảo hành",
                'name.unique' => "Tên đã tồn tại",

                'image.required' => "Chọn ảnh mới",
            ]
        );
        $product = new San_pham();
        $product->ten_sp = $request->name;
        $product->loai_spID = $request->category;
        $product->mo_ta_sp = $request->description;
        $product->gia_sp = $request->price;
        $product->ngay_sx = $request->mfg;
        $product->khuyen_mai = $request->discount;
        $product->luot_view = 0;
        $product->bao_hanh = $request->warranty;

        $a = $request->chinhanh;
        $b = str_split($a);
        $c =json_encode($b);
        $product->chi_nhanh = $c;
        $anh_cu = $product->anh_sp;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/product/add')->with('loi', 'Bạn phải chọn file ảnh');
            }

            $name = $file->getClientOriginalName();
            while (file_exists("upload/product/.$name")) {
                $name = $request->file('image')->getClientOriginalName();
            }

            $product->anh_sp = $name;
            $file->move('upload/product/add', $name);
            $product->save();
            return redirect('admin/product/add')->with('thongbao', "Thêm sản phẩm thành công");
        }
    }

    public function addCate(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',

                'image' => 'required',
            ],
            [
                'name.required' => "Nhập tên loại sản phẩm",


                'name.unique' => "Tên đã tồn tại",

                'image.required' => "Chọn ảnh mới",
            ]
        );
        $cate = new Loai_san_pham();
        $cate->ten_loai_sp = $request->name;
        $cate->mo_ta = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpeg' && $duoi != 'png') {
                return redirect('admin/category/add')->with('loi', 'Bạn phải chọn file ảnh');
            }

            $name = $file->getClientOriginalName();
            while (file_exists("upload/product/.$name")) {
                $name = $request->file('image')->getClientOriginalName();
            }

            $cate->anh_loai_sp = $name;
            $file->move('upload/product/cate', $name);
            $cate->save();
            return redirect('admin/category/add')->with('thongbao', "Thêm loại sản phẩm thành công");
        }
    }

    public function getEdit($id)
    {

        $product = San_pham::find($id);
        $cate = Loai_san_pham::all();
        $ds_cn = Chi_nhanh::all();
        $list_cn = json_decode($product->chi_nhanh);
        foreach ($list_cn as $row) {
            $chinhanh = Chi_nhanh::where('id', $row)->get();
            foreach ($chinhanh as $cn) {
                $chi_nhanh = array(
                    'id' => $cn->id,
                    'ten_chi_nhanh' => $cn->ten_chi_nhanh,
                    'embed' => $cn->embed
                );
                $list[] = $chi_nhanh;
//
            }
        }
        foreach ($ds_cn as $row) {
                $chi_nhanh = array(
                    'id' => $row->id,
                    'ten_chi_nhanh' => $row->ten_chi_nhanh,
                    'embed' => $row->embed
                );
                $ds[] = $chi_nhanh;
        }
        return view('backend.product.edit', compact('product', 'cate','list','ds'));
    }

    public function getCateEdit($id)
    {
        $cate = Loai_san_pham::find($id);
        return view('backend.category.edit', compact('cate'));
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'category' => 'required',
                'description' => 'required',
                'price' => 'required',
                'chinhanh' => 'required',
//                'discount' => 'required',
                'warranty' => 'required',
            ],
            [
                'name.required' => "Nhập tên sản phẩm",
                'description.required' => "Nhập mô tả sản phẩm",
                'price.required' => "Nhập giá sản phẩm",
                'mfg.required' => "Nhập ngày sản xuất sản phẩm",
                'chinhanh.required' => "Nhập chi nhánh",
//                'mfg.required' => "Nhập tên sản phẩm",
                'warranty.required' => "Nhập thời gian bảo hành",
                'name.unique' => "Tên đã tồn tại",

            ]
        );
        $product = San_pham::find($id);
        $product->ten_sp = $request->name;
        $product->loai_spID = $request->category;
        $product->mo_ta_sp = $request->description;
        $product->gia_sp = $request->price;
        $product->ngay_sx = $request->mfg;
        $product->khuyen_mai = $request->discount;
        $product->bao_hanh = $request->warranty;

        $a = $request->chinhanh;
        $b = str_split($a);
        $c =json_encode($b);
        $product->chi_nhanh = $c;
        $anh_cu = $product->anh_sp;
//        print_r($request->name);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/product/edit/' . $id)->with('loi', 'Bạn phải chọn file ảnh');
            }

            $name = $file->getClientOriginalName();
            while (file_exists("upload/product/.$name")) {
                $name = $request->file('image')->getClientOriginalName();
            }

            $product->anh_sp = $name;
            if (file_exists("upload/product/add/" . $anh_cu)) {
                unlink("upload/product/add/" . $anh_cu);
            }
            $file->move('upload/product/add', $name);
        }
        $product->save();
        return redirect('admin/product/edit/' . $id)->with('thongbao', "Sửa sản phẩm thành công");
    }

    public function editCate(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'image' => 'required',
            ],
            [
                'name.required' => "Nhập tên loại sản phẩm",
                'name.unique' => "Tên đã tồn tại",

                'image.required' => "Chọn ảnh mới",
            ]
        );
        $cate = new Loai_san_pham();
        $cate->ten_loai_sp = $request->name;
        $cate->mo_ta = $request->description;
        $anh_cu = $cate->anh_loai_sp;

//        print_r($request->name);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpeg' && $duoi != 'png') {
                return redirect('admin/category/edit/' . $id)->with('loi', 'Bạn phải chọn file ảnh');
            }

            $name = $file->getClientOriginalName();
            while (file_exists("upload/product/.$name")) {
                $name = $request->file('image')->getClientOriginalName();
            }

            $cate->anh_loai_sp = $name;
            if (file_exists("upload/product/cate/" . $anh_cu)) {
                unlink("upload/product/cate/" . $anh_cu);
            }
            $file->move('upload/product/cate', $name);

            $cate->save();
            return redirect('admin/category/edit/' . $id)->with('thongbao', "Sửa loại sản phẩm thành công");
        }
    }

    public function delete($id)
    {
        $s = San_pham::find($id);
        $s->delete();
        return back()->with('thongbao', "Xóa thành công");
    }

    public function deleteCate($id)
    {
        $cate = Loai_san_pham::find($id);
        $cate->delete();
        return back()->with('thongbao', "Xóa thành công");
    }

    public function timKiem(Request $req)
    {
        if ($req->searchid) {
            $product = San_pham::where('id', 'like', '%' . $req->searchid . '%')->get();
        } else if ($req->searchname) {
            $product = San_pham::where('ten_sp', 'like', '%' . $req->searchname . '%')->get();

        }
        return view('backend.product.timkiem', compact('product'));
    }

}
