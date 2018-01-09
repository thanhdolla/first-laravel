<?php

namespace App\Http\Controllers;

use App\Don_hang;
use App\Khach_hang;
use App\Loai_san_pham;
use App\Phan_hoi;
use App\San_pham;
use App\Thong_bao;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
//        $date =date('d-m-Y');
//        $all = Don_hang::all();
//        foreach($all as $row){
//            $row->created_at = date('d-m-Y');
//            echo $row->created_at;
//        }

        $sanpham = San_pham::all();
        $khachhang = Khach_hang::all();
        $donhang = Don_hang::all();
        $tintuc = Thong_bao::all();
        $loaisp = Loai_san_pham::all();
        $phanhoi = Phan_hoi::all();
        return view('backend.home.index',compact('sanpham','khachhang','donhang','tintuc','loaisp','phanhoi'));
    }
}
