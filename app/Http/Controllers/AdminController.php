<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function getLogin(){
        return view('backend.admin.login');
    }

    public function login(Request $req)
    {
        $this->validate($req,
            [
                'email' => 'required|email',
                'password' => 'required|min:3'
            ],
            [
                'email.required' => "Nhập email",
                'email.email' => "Email không hợp lệ",
                'password.required' => "Vui lòng nhập mật khẩu",
                'password.min' => 'Mật khẩu ít nhất 3 kí tự'
            ]
        );
        $email = $req->input('email');
        $pass = $req->input('password');
        $check = Admin::where(['email_ad'=>$email,'mk_ad'=>$pass])->get();
        $kh = Admin::where(['email_ad'=>$email,'mk_ad'=>$pass])->first();
        if(count($check)>0) {
            Session::put('admin',$kh->ten_ad);
            Session::put('admin_id',$kh->id);
            return redirect('admin/dashboard')->with('thongbao', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->with('loi', 'Email không tồn tại');
        }
    }

    public function logout(Request $request){
        if(Session::has('admin')){
            $request->session()->forget('admin');
        }
        return redirect('admin/login');
    }

}
