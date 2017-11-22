<?php

namespace App\Http\Controllers;
use App\Khach_hang;

class KhachHangController extends Controller
{
    public function index(){
        $khachhang = Khach_hang::orderby('id','desc')->get();
        return view('backend.khachhang.index', compact('khachhang'));
    }

    public function getAdd(){

        return view('backend.khachhang.add');
    }

    public function delete($id){
        $s = Khach_hang::find($id);
        $s->delete();
        return back()->with('thongbao',"Xóa thành công");
    }
}
