<?php

namespace App\Http\Controllers;

use App\Don_hang;
use App\Don_hang_chi_tiet;
use Illuminate\Http\Request;

class DonHangChiTietController extends Controller
{
    public function index(Request $req){
        if($req->searchid) {
            $list = Don_hang_chi_tiet::where('id', 'like', '%' . $req->searchid . '%')->get();
        }
        else if($req->searchname) {
            $list = Don_hang_chi_tiet::where('don_hangID', 'like', '%' . $req->searchname . '%')->get();
        }
        else {
            $list = Don_hang_chi_tiet::orderby('id', 'desc')->get();
        }
        return view('backend.donhangchitiet.index',compact('list'));
    }

    public function delete($id){
        $donhangchitet = Don_hang_chi_tiet::find($id);
        $soluong = $donhangchitet->so_luong;
        $gia = $donhangchitet->tinh_tien;
        $id_don_hang = $donhangchitet->don_hangID;
        $donhang = Don_hang::where('id',$id_don_hang)->first();
        $donhang->thanh_toan = $donhang->thanh_toan - $soluong*$gia;
        if($donhang->thanh_toan == 0){
            $donhang->delete();
        }

        $donhang->save();
        $donhangchitet->delete();
        return back()->with('thongbao','Xóa thành công');
    }

}
