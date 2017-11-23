<?php

namespace App\Http\Controllers;
use App\Khach_hang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function index(Request $req){
        if ($req->searchname) {
            $khachhang = Khach_hang::where('ten_kh', 'like', '%' . $req->searchname . '%')->get();
        }
        else {
            $khachhang = Khach_hang::orderby('id', 'desc')->get();
        }
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
