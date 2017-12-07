<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;


class SlideController extends Controller
{
    public function index()
    {

        $slide = Slide::all();
        return view('backend.slide.index', compact('slide'));
    }

    public function getAdd()
    {
        return view('backend.slide.add');
    }

    public function add(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'image' => 'required|image'
            ],
            [
                'name.required' => "Nhập tên slide",
                'image.required' => "Thêm ảnh slide",
            ]
        );

        $slide = new Slide;
        $slide->ten_slide = $request->name;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/slide/add')->with('loi', 'Bạn phải chọn file ảnh');
            }

            $name = $file->getClientOriginalName();
            while (file_exists("upload/slide/.$name")) {
                $name = $request->file('image')->getClientOriginalName();
            }

            $slide->anh_slide = $name;
            $file->move('upload/slide/add', $name);
            $slide->save();
            return redirect('admin/slide/add')->with('thongbao', "Thêm slide thành công");
        }
    }

    public function getEdit($id)
    {
        $slide = Slide::find($id);
        return view('backend.slide.edit', compact('slide'));
    }

    public function edit(Request $request, $id)
    {
        $slide = Slide::find($id);
        $this->validate($request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => "Nhập tên slide",
                'name.unique' => "Tên đã tồn tại",
            ]
        );

        $slide->ten_slide = $request->name;
        $anh_cu = $slide->anh_slide;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/slide/edit/' . $id)->with('loi', 'Bạn phải chọn file ảnh');
            }

            $name = $file->getClientOriginalName();
            while (file_exists("upload/slide/.$name")) {
                $name = $request->file('image')->getClientOriginalName();
            }

            $slide->anh_slide = $name;
            if (file_exists("upload/product/cate/" . $anh_cu)) {
                unlink("upload/slide/add/" . $anh_cu);
            }
            $file->move('upload/slide/add', $name);
        }
        $slide->save();
        return redirect('admin/slide/edit/' . $id)->with('thongbao', "Sửa slide thành công");
    }

    public function delete($id)
    {
        $s = Slide::find($id);
        $s->delete();
        return back()->with('thongbao', "Xóa thành công");
    }

}
