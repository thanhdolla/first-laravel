<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NhanVienController extends Controller
{

    public function index(){
        $nhanvien = Admin::orderby('id','DESC')->get();
        return view('backend.nhanvien.index', compact('nhanvien'));
    }

    public function getAdd(){
        $a = (Session::get('admin_id'));
        if($a ==1) {
            return view('backend.nhanvien.add');
        }else{
            return back()->with('loi','Bạn không có quyền thêm nhân viên');
        }
    }

    public function add(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'mk' => 'required',
                'email' => 'required',
                'sdt' => 'required|min:6|max:11',
            ],
            [
                'name.required' => "Nhập tên nhân viên",
                'mk.required' => "Nhập mật khẩu",
                'email.required' => "Nhập email nhân viên",
                'sdt.min' => 'Số điện thoại phải lớn hơn 5 số',
                'sdt.max' => 'Số điện thoại phải nhỏ hơn 12 số',
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
        $a = (Session::get('admin_id'));
        if($a !=1) {
            if($a != $nhanvien->id){
                return back()->with('loi','Bạn không có quyền sửa nhân viên');
            }
            return view('backend.nhanvien.edit', compact('nhanvien'));
        }else{
            return view('backend.nhanvien.edit', compact('nhanvien'));
        }
    }

    public function edit(Request $request, $id)
    {
        $nhanvien = Admin::find($id);
        $this->validate($request,
            [
                'name' => 'required',
                'mk' => 'required',
                'email' => 'required',
                'sdt' => 'required|min:6|max:11',
            ],
            [
                'name.required' => "Nhập tên nhân viên",
                'mk.required' => "Nhập mật khẩu",
                'email.required' => "Nhập email nhân viên",
                'sdt.min' => 'Số điện thoại phải lớn hơn 5 số',
                'sdt.max' => 'Số điện thoại phải nhỏ hơn 12 số',
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
        $nhanvien = Admin::find($id);
        $a = (Session::get('admin_id'));
        if($a ==1) {
            $nhanvien->delete();
        }else{
            return back()->with('loi',"Bạn không có quyền xóa");
        }

        return back()->with('thongbao',"Xóa thành công");
    }
}
