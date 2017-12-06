<?php

namespace App\Http\Controllers;

use App\Don_hang;
use App\Khach_hang;
use App\Loai_san_pham;
use App\San_pham;
use App\Thong_bao;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $sanpham = San_pham::all();
        $khachhang = Khach_hang::all();
        $donhang = Don_hang::all();
        $tintuc = Thong_bao::all();
        $loaisp = Loai_san_pham::all();
        return view('backend.home.index',compact('sanpham','khachhang','donhang','tintuc','loaisp'));
    }
}
