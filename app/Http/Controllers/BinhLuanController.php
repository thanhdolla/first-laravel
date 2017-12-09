<?php

namespace App\Http\Controllers;

use App\Binh_luan;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    //
    public function index()
    {
        $list = Binh_luan::all();
        return view('backend.binhluan.index', compact('list'));
    }



    public function delete($id){
        $binhluan = Binh_luan::find($id);
        $binhluan->delete();
        return back();
    }
}
