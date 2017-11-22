<?php

namespace App\Http\Controllers;

use App\Loai_san_pham;
use App\Producer;
use App\San_pham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index(Request $req)
    {
        if($req->searchid) {
            $product = San_pham::where('id', 'like', '%' . $req->searchid . '%')->get();
        }
        else if($req->searchname) {
            $product = San_pham::where('ten_sp', 'like', '%' . $req->searchname . '%')->get();
        }
        else {
            $product = San_pham::orderby('id', 'desc')->get();
        }
        $cate = Loai_san_pham::all();

        return view('backend.product.index', compact('product','cate'));
    }
    public function getAdd()
    {
        $cate = Loai_san_pham::all();
        return view('backend.product.add', compact('cate'));
    }
    public function add(Request $request){
        $product = new San_pham();
        $product->ten_sp = $request->name;
        $product->loai_spID = $request->category;
        $product->mo_ta_sp = $request->description;
        $product->gia_sp = $request->price;
        $product->ngay_sx = $request->mfg;
        $product->khuyen_mai = $request->discount;
        $product->bao_hanh = $request->warranty;
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
    public function getEdit($id)
    {
        $product = San_pham::find($id);
        $cate = Loai_san_pham::all();
        return view('backend.product.edit', compact('product', 'cate'));
    }

    public function edit(Request $request, $id)
    {
        $product = San_pham::find($id);
        $this->validate($request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => "Nhập tên slide",
                'name.unique' => "Tên đã tồn tại",
            ]
        );

        $slide->ten_slide = ($request->name);
        $anh_cu = $slide->anh_slide;
//        print_r($request->name);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/slide/edit/'.$id)->with('loi', 'Bạn phải chọn file ảnh');
            }

            $name = $file->getClientOriginalName();
            while (file_exists("upload/slide/.$name")) {
                $name = $request->file('image')->getClientOriginalName();
            }

            $slide->anh_slide = $name;


            unlink("upload/slide/add/".$anh_cu);
            $file->move('upload/slide/add', $name);

            $slide->save();
            return redirect('admin/slide/edit/'.$id)->with('thongbao', "Sửa slide thành công");
        }
    }

    public function delete($id){
        $s = San_pham::find($id);
        $s->delete();
        return back()->with('thongbao',"Xóa thành công");
    }

    public function timKiem(Request $req)
    {
        if($req->searchid) {
            $product = San_pham::where('id', 'like', '%' . $req->searchid . '%')->get();
        }

        else if($req->searchname){
        $product = San_pham::where('ten_sp', 'like', '%' . $req->searchname . '%')->get();

    }
        return view('backend.product.timkiem', compact('product'));
    }

}
