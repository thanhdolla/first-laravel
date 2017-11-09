<?php

namespace App\Http\Controllers;

use App\San_pham;
use Illuminate\Http\Request;

class ProductManagementController extends Controller
{
    public function index()
    {

        $product = San_pham::all();
        return view('backend.product.index', compact('product'));
    }
    public function add(Request $request){
//        $product = new San_pham();
//        $product->ten_slide = $request->name;
//        if ($request->hasFile('image')) {
//            $file = $request->file('image');
//            $duoi = $file->getClientOriginalExtension();
//            if ($duoi != 'jpg' && $duoi != 'png') {
//                return redirect('admin/slide/add')->with('loi', 'Bạn phải chọn file ảnh');
//            }
//
//            $name = $file->getClientOriginalName();
//            while (file_exists("upload/slide/.$name")) {
//                $name = $request->file('image')->getClientOriginalName();
//            }
//
//            $slide->anh_slide = $name;
//            $file->move('upload/slide/add', $name);
//            $slide->save();
//            return redirect('admin/slide/add')->with('thongbao', "Thêm slide thành công");
//        }
    }
}
