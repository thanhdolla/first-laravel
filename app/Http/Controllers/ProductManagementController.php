<?php

namespace App\Http\Controllers;

use App\Loai_san_pham;
use App\Producer;
use App\San_pham;
use Illuminate\Http\Request;

class ProductManagementController extends Controller
{
    public function index()
    {

        $product = San_pham::all();

        return view('backend.product.index', compact('product'));
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

}
