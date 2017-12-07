<?php

namespace App\Http\Controllers;

use App\Thong_bao;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    public function index(Request $req)
    {
        $tintuc = Thong_bao::orderby('id', 'desc')->get();
        return view('backend.tintuc.index', compact('tintuc'));
    }

    public function getAdd()
    {
        return view('backend.tintuc.add');
    }

    public function add(Request $request)
    {
        $this->validate($request,
            [
                'tieude' => 'required',
                'noidung' => 'required',
                'image' => 'required',
            ],
            [
                'tieude.required' => "Nhập tiêu đề",
                'noidung.required' => "Nhập nội dung",
                'image.required' => "Chọn ảnh mới",
            ]
        );

        $tintuc = new Thong_bao;
        $tintuc->tieu_de_tb = $request->tieude;
        $tintuc->noi_dung_tb = $request->noidung;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/tintuc/add')->with('loi', 'Bạn phải chọn file ảnh');
            }

            $name = $file->getClientOriginalName();
            while (file_exists("upload/tintuc/.$name")) {
                $name = $request->file('image')->getClientOriginalName();
            }

            $tintuc->anh_tb = $name;
            $file->move('upload/tintuc/add', $name);
            $tintuc->save();
            return redirect('admin/tintuc/add')->with('thongbao', "Thêm tintuc thành công");
        }
    }

    public function getEdit($id)
    {
        $tintuc = Thong_bao::find($id);
        return view('backend.tintuc.edit', compact('tintuc'));
    }

    public function edit(Request $request, $id)
    {
        $tintuc = Thong_bao::find($id);
        $this->validate($request,
            [
                'tieude' => 'required',
                'noidung' => 'required',
                'image' => 'required',
            ],
            [
                'tieude.required' => "Nhập tiêu đề",
                'noidung.required' => "Nhập nội dung",
                'image.required' => "Chọn ảnh mới",
            ]
        );

        $tintuc->tieu_de_tb =$request->tieude;
        $tintuc->noi_dung_tb =$request->noidung;
        $anh_cu = $tintuc->anh_tb;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/tintuc/edit/' . $id)->with('loi', 'Bạn phải chọn file ảnh');
            }
            $name = $file->getClientOriginalName();
            while (file_exists("upload/tintuc/.$name")) {
                $name = $request->file('image')->getClientOriginalName();
            }
            $tintuc->anh_tb = $name;
            if (file_exists("upload/tintuc/add/" . $anh_cu)) {
                unlink("upload/tintuc/add/" . $anh_cu);
            }
            $file->move('upload/tintuc/add', $name);
        }
        $tintuc->save();
        return redirect('admin/tintuc/index')->with('thongbao', "Sửa tin thành công");
    }

    public function delete($id){
        $s = Thong_bao::find($id);
        $s->delete();
        return back()->with('thongbao',"Xóa thành công");
    }

}
