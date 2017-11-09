<?php

namespace App\Http\Controllers;

use App\Don_hang;
use App\Don_hang_chi_tiet;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function index(){
        $list = Don_hang::all();
        return view('backend.donhang.index',compact('list'));
    }

    public function XuLi($id){
        $donhang = Don_hang::find($id);
        $donhang->stt_don_hang = 1;
        $donhangchitiet = Don_hang_chi_tiet::where('don_hangID',$donhang->id)->get();
        foreach ($donhangchitiet as $dh) {
            $dh->stt_don_hang_chi_tiet = 1;
            $dh->save();
        }

        $donhang->save();
        return back()->with('thongbao','Xử lí đơn hàng thành công');
    }

    public function delete($id){
        $donhang = Don_hang::find($id);
        $dhct = Don_hang_chi_tiet::where('don_hangID',$donhang->id);
        $donhang->delete();
        $dhct->delete();
        return back()->with('thongbao','Xóa đơn hàng thành công');
    }

}
