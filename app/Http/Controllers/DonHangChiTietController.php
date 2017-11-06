<?php

namespace App\Http\Controllers;

use App\Don_hang_chi_tiet;
use Illuminate\Http\Request;

class DonHangChiTietController extends Controller
{
    public function index(){
        $list = Don_hang_chi_tiet::all();
        return view('backend.donhangchitiet.index',compact('list'));
    }

    public function delete($id){
        $donhangchitet = Don_hang_chi_tiet::find($id);
        $donhangchitet->delete();

    }
}
