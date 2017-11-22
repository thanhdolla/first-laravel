<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{

    public function index(){
        $nhanvien = Admin::orderby('id','DESC')->get();
        return view('backend.nhanvien.index', compact('nhanvien'));
    }

    public function getAdd(){

        return view('backend.nhanvien.add');
    }

    public function add(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'mk' => 'required',
                'email' => 'required',
                'sdt' => 'required|min:6|integer',
            ],
            [
                'name.required' => "Nhập tên nhân viên",
                'mk.required' => "Nhập mật khẩu",
                'email.required' => "Nhập email nhân viên",
                'sdt.min' => 'Số điện thoại phải lớn hơn 5 số',
                'sdt.integer' => 'Số điện thoại là số từ 1 đến 9',
                'sdt.required' => 'Vui lòng nhập số điện thoại',

            ]
        );

        $nhanvien = new Admin;
        $nhanvien->ten_ad = $request->name;
        $nhanvien->mk_ad = $request->mk;
        $nhanvien->email_ad = $request->email;
        $nhanvien->sdt_ad = $request->sdt;
        $nhanvien->save();
        return redirect('admin/nhanvien/index')->with('thongbao','Thêm mới thành công');
    }

    public function getEdit($id)
    {
        $nhanvien = Admin::find($id);
        return view('backend.nhanvien.edit', compact('nhanvien'));
    }

    public function edit(Request $request, $id)
    {
        $nhanvien = Admin::find($id);
        $this->validate($request,
            [
                'name' => 'required',
                'mk' => 'required',
                'email' => 'required',
                'sdt' => 'required|min:6|integer',
            ],
            [
                'name.required' => "Nhập tên nhân viên",
                'mk.required' => "Nhập mật khẩu",
                'email.required' => "Nhập email nhân viên",
                'sdt.min' => 'Số điện thoại phải lớn hơn 5 số',
                'sdt.integer' => 'Số điện thoại là số từ 1 đến 9',
                'sdt.required' => 'Vui lòng nhập số điện thoại',

            ]
        );

        $nhanvien->ten_ad = $request->name;
        $nhanvien->email_ad = $request->email;
        $nhanvien->sdt_ad = $request->sdt;
        $nhanvien->save();
        return redirect('admin/nhanvien/index')->with('thongbao','Sửa thành công');
    }

    public function delete($id){
        $s = Admin::find($id);
        $s->delete();
        return back()->with('thongbao',"Xóa thành công");
    }
}
