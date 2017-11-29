<?php

namespace App\Http\Controllers;

use App\Phan_hoi;
use Illuminate\Http\Request;

class PhanHoiController extends Controller
{
    //
    public function index()
    {
        $list = Phan_hoi::all();
        return view('backend.phanhoi.index', compact('list'));
    }



    public function delete($id){
        $feedback = Phan_hoi::find($id);
        $feedback->delete();
        return back();
    }
}
