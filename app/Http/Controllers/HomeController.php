<?php

namespace App\Http\Controllers;

use App\Binh_luan;
use App\Chi_nhanh;
use App\Compare;
use App\Don_hang;
use App\Don_hang_chi_tiet;
use App\Khach_hang;
use App\Phan_hoi;
use App\Thong_bao;
use Cart;
use App\Loai_san_pham;
use App\Slide;
use Illuminate\Http\Request;
use App\San_pham;
use Illuminate\Support\Facades\Session;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $newpr = San_pham::orderBy('id', 'DESC')->paginate(8);
        $khuyenmai = San_pham::where('khuyen_mai', '<>', 0)->paginate(8);
        return view('frontend.page.content', compact('newpr', 'slide', 'khuyenmai'));
    }

    public function getLoaiSanPham($type)
    {
        $sp = San_pham::where('loai_spID', $type)->paginate(4);
        $km = San_pham::where('khuyen_mai', '<>', 0 )->where('Loai_spID',$type)->paginate(4);
        $loai_sp = Loai_san_pham::where('id', $type)->first();
        return view('frontend.page.loaisanpham', compact('sp', 'km', 'loai_sp'));
    }

    public function getChiTietSanPham($id)
    {
$ids = San_pham::find($id);
        if ($ids) {
            $chitiet = San_pham::where('id', $id)->first();
            $id = $chitiet->id;

            $list_cn = json_decode($chitiet->chi_nhanh);
            foreach ($list_cn as $row) {
                $chinhanh = Chi_nhanh::where('id', $row)->get();
                foreach ($chinhanh as $cn) {
                    $chi_nhanh = array(
                        'id' => $cn->id,
                        'ten_chi_nhanh' => $cn->ten_chi_nhanh,
                        'embed' => $cn->embed,
                        'sdt' => $cn->sdt
                    );
                    $list[] = $chi_nhanh;
                }
            }
            $binhluan = Binh_luan::where('san_phamID', $id)->orderBy('id', 'DESC')->get();
            return view('frontend.page.chitietsanpham', compact('chitiet', 'binhluan', 'list'));
        }
        else{
            $slide = Slide::all();
            $newpr = San_pham::orderBy('id', 'DESC')->paginate(8);
            $khuyenmai = San_pham::where('khuyen_mai', '<>', 0)->paginate(8);
            return view('frontend.page.content', compact('newpr', 'slide', 'khuyenmai'));
        }
    }

    public function chiNhanh(Request$req, $id){
        $chi_nhanh = Chi_nhanh::find($id);
        return view("frontend.page.chinhanh",compact('chi_nhanh'));
    }
    public function getLienHe()
    {
        return view("frontend.page.lienhe");
    }

    public function phanHoi(Request $request)
    {
        if (!Session::has('khach_hang')) {
            return back()->with('loi', 'Bạn phải đăng nhập mới có thể giử phản hồi');
        }
        $this->validate($request,
            [
                'tieu_de' => 'required',
                'noidung' => 'required',
            ],
            [
                'tieu_de.required' => "Vui lòng nhập tiêu đề",
                'noidung.requered' => "Vui lòng nhập nội dung phản hồi",
            ]
        );
        $phanhoi = new Phan_hoi;
        $phanhoi->khach_hangID = Session::get('khach_hang_id');
        $phanhoi->noi_dung = $request->message;
        $phanhoi->ten_kh = Session::get('khach_hang');
        $phanhoi->tieu_de = $request->tieu_de;
        $phanhoi->stt_phan_hoi =0;
        $phanhoi->save();
        return back()->with('thongbao', 'gửi phản hồi thành công');
    }

    public function binhLuan(Request $request, $id)
    {
        $chitiet = San_pham::where('id', $id)->first();

        if (!Session::has('khach_hang')) {
            return back()->with('loi', 'Bạn phải đăng nhập mới có thể giử bình luận');
        }

        $cmt = new Binh_luan;
        $cmt->ten_kh = Session::get('khach_hang');
        $cmt->khach_hangID = Session::get('khach_hang_id');
        $cmt->san_phamID = $chitiet->id;
        $cmt->noi_dung = $request->message;
        $cmt->save();
        return back()->with('thongbao', 'Gửi bình luận thành công');
    }

    public function addToCompare(Request $request, $id)
    {
        $sanpham = San_pham::find($id);
        $loaisp = $sanpham->loai_spID;
        $oldCompare = Session('compare') ? Session::get('compare') : null;
        $compare = new Compare($oldCompare);
        $count = $compare->totalQty;
        if ($count >= 2) {
            return back()->with('loi', 'Chỉ thêm tối đa được hai sản phẩm vào so sánh');
        } else {
            //khi đã có sản phẩm trong danh mục so sánh mơi ktra điều kiện này
            if ($count > 0) {
                $cp = $compare->items;
                foreach ($cp as $row) {
                    $sp = $row['item'];
                    if ($id == $sp->id) {
                        return back()->with('loi', 'Sản phẩm đã tồn tại trong danh mục so sánh');
                    }
                    if($loaisp != $sp->loai_spID){
                        return back()->with('loi', 'Hai sản phẩm không cùng loại');
                    }
                }
            }

            $compare->add($sanpham, $id);
            Session::put('compare_qty', $compare->totalQty);
            $request->session()->put('compare', $compare);
            return back()->with('thongbao', 'Thêm vào so sánh sản phẩm thành công');
        }
    }

    public function deleteCompare(Request $request, $id)
    {
        $oldCompare = Session('compare') ? Session::get('compare') : null;
        $compare = new Compare($oldCompare);
        $compare->reduceByOne($id);
        Session::put('compare_qty', $compare->totalQty);
        $request->session()->put('compare', $compare);
        if($compare->totalQty < 1){
            $compare->totalQty == 0;
            Session::put('compare_qty', $compare->totalQty);
            return view('frontend.page.compare');
        }
        return back()->with('thongbao', 'Xóa thành công');
    }

    public function getCompare()
    {
        $oldCompare = Session('compare') ? Session::get('compare') : null;
        $compare = new Compare($oldCompare);
        if($compare->totalQty == 0){
            return back()->with('loi','Chưa có sản phẩm so sánh');
        }
        $list = (Session::get('compare'));

        $cp = $list->items;
        return view('frontend.page.compare', compact('cp', 'count'));

    }

    public function getGioiThieu()
    {
        return view("frontend.page.gioithieu");
    }

    public function getAddCart($id)
    {
        $product = San_pham::where('id', $id)->first();
        if ($product->khuyen_mai == 0) {
            $gia = $product->gia_sp;
        } else {
            $gia = $product->gia_sp - $product->khuyen_mai;
        }
        Cart::add(array('id' => $id, 'name' => $product->ten_sp, 'qty' => 1, 'price' => $gia));
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        $giohang = Cart::content();//lấy nội dung cart
        foreach ($giohang as $row) {
            $id = $row->rowId;
            $qty = $request->$id;
            Cart::update($id, $qty);
        }

        return redirect()->route('cart');
    }


    public function getCart()
    {
        $count = Cart::count();
        $total = Cart::subtotal();
        $cart = Cart::content();
        return view('frontend.page.cart', compact('cart', 'total', 'count'));
    }

    public function removeCart($id)
    {
        Cart::remove($id);
        return redirect()->route('cart');
    }

    public function removeAll()
    {
        Cart::destroy();
        return redirect()->route("cart");
    }

    public function getDatHang()
    {
        if (Session::has('khach_hang_id')) {
            $id = Session::get('khach_hang_id');
            $kh = Khach_hang::find($id);
            Session::put('kh_info', $kh);
        }

        return view('frontend.page.dathang', compact('kh'));
    }

    public function datHang(Request $req)
    {
        $cart = Session::get('cart');
        $total_items = Cart::count();
        $content = Cart::content();
        $total = Cart::subtotal();
        $tong = str_replace(',', '', $total);
        if ($total_items <= 0) {
            redirect();
        }
        $tong_tien = 0; // laay ra tong so tien thanh toan
        foreach ($content as $row) {
            $tong_tien = $total;
        }
        $kh = new Khach_hang;
        $bill = new Don_hang;
        if (!Session('khach_hang_id')) {
            $bill->khach_hangID = 0;
        } else {
            $bill->khach_hangID = Session('khach_hang_id');
        }
        $this->validate($req,
            [
                'email' => 'required|email',
                'name' => 'required',
                'sdt' => 'required|min:6|max:12',
                'diachi' => 'required',
                'note' => 'required'

            ],
            [
                'email.required' => "Vui lòng nhập email",
                'email.email' => "Email không hợp lệ",
                'email.umique' => 'Email đã tồn tại',
                'name.required' => "Vui lòng nhập họ tên",
                'note.required' => "Vui lòng nhập chú thích ngày giờ bạn muốn nhận hàng",
                'diachi.required' => "Vui lòng nhập địa chỉ",
                'sdt.min' => 'Số điện thoại phải lớn hơn 5 số',
                'sdt.max' => 'Số điện thoại phải nhở hơn 12 số',
                'sdt.required' => 'Vui lòng nhập số điện thoại',

            ]
        );
        $bill->ten = $req->name;
        $bill->dia_chi = $req->diachi;
        $bill->email = $req->email;
        $bill->sdt = $req->sdt;
        $bill->thanh_toan = $tong;
        $bill->note = $req->note;
        $bill->stt_don_hang = 0;
        $bill->save();
        foreach ($content as $key => $value) {
            $bill_detail = new Don_hang_chi_tiet;
            $bill_detail->don_hangID = $bill->id;
            $bill_detail->san_phamID = $value->id;
            $bill_detail->so_luong = $value->qty;
            $bill_detail->stt_don_hang_chi_tiet = 0;
            $bill_detail->tinh_tien = $value->price;
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->route('trang_chu')->with('thongbao', "Đặt hàng thành công");
    }

    public function getLogin()
    {
        return view('frontend.page.login');
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
        $check = Khach_hang::where(['email_kh' => $email, 'mk_kh' => $pass])->get();
        $kh = Khach_hang::where(['email_kh' => $email, 'mk_kh' => $pass])->first();
        if (count($check) > 0) {
            Session::put('khach_hang', $kh->ten_kh);
            Session::put('khach_hang_id', $kh->id);
            Cart::destroy();
             $oldCompare = Session('compare') ? Session::get('compare') : null;
             $compare = new Compare($oldCompare);
            $compare->totalQty == 0;
            Session::put('compare_qty', $compare->totalQty);
            $req->session()->forget('compare');

            return redirect('index')->with('thongbao', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->with(['loi' => 'Email hoặc mật khẩu không đúng']);
        }

    }

    public function logout(Request $request)
    {
        if (Session::has('khach_hang')) {
            Cart::destroy();
            $oldCompare = Session('compare') ? Session::get('compare') : null;
            $compare = new Compare($oldCompare);
            $compare->totalQty == 0;
            Session::put('compare_qty', $compare->totalQty);
            $request->session()->forget('compare');

            $request->session()->forget('khach_hang');
        }

        return redirect('index');
    }

    public function getSigin()
    {
        return view('frontend.page.sigin');
    }

    public function sigin(Request $req)
    {
        $this->validate($req,
            [
                'email' => 'required|email',
                'password' => 'required|min:6',
                'fullname' => 'required',
                'phone' => 'required|min:6|max:11',
                're_password' => 'required|same:password'

            ],
            [
                'email.required' => "Vui lòng nhập email",
                'fullname.required' => "Vui lòng nhập họ tên",
                'email.email' => "Email không hợp lệ",
                'email.umique' => 'Email đã tồn tại',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.max' => 'Số điện thoại nhỏ hơn 12 kí tự',
                'phone.min' => 'Số điện thoại lớn hơn 5 kí tự',
                're_password.same' => "Mật khẩu không giống nhau",
                're_password.required' => "Vui lòng nhập lại mật khẩu",

            ]
        );

        $kh = new Khach_hang;
        $kh->ten_kh = $req->fullname;
        $kh->mk_kh = $req->password;
        $kh->email_kh = $req->email;
        $kh->dia_chi_kh = $req->address;
        $kh->sdt_kh = $req->phone;
        $kh->save();
        return redirect()->back()->with('thanhcong', "Tạo tài khoản thành công");

    }

    public function quanLiTaiKhoan()
    {
        $id = Session::get('khach_hang_id');
        $kh = Khach_hang::find($id);
        return view('frontend.page.quanlitaikhoan', compact('kh'));
    }

    public function luuTaiKhoan(Request $req)
    {
        $id = Session::get('khach_hang_id');
        $kh = Khach_hang::find($id);
        $kh->ten_kh = $req->name;
        $kh->mk_kh = $req->mk_kh;
        $kh->email_kh = $req->email;
        $kh->dia_chi_kh = $req->diachi;
        $kh->sdt_kh = $req->sdt;
        $kh->save();
        return back()->with('thongbao', 'Lưu thành công');
    }

    public function lichSuTuongTac()
    {
        if (Session::has('khach_hang_id')) {
            $id = Session::get('khach_hang_id');
            $donhang = Don_hang::where('khach_hangID', $id)->get();
            $phanhoi = Phan_hoi::where('khach_hangID', $id)->get();
            if (count($donhang) == 0 && count($phanhoi) == 0) {
                return back()->with('thongbao', 'Bạn chưa có đơn hàng hoặc phản hồi nào');
            }
            if (count($donhang) > 0) {
                foreach ($donhang as $row) {
                    $dhct = Don_hang_chi_tiet::where('don_hangID', $row->id)->get();
                    foreach ($dhct as $sp) {
                        $sp_id = $sp->san_phamID;
                        $sp = San_pham::where('id', $sp_id)->get();
                    }
                }

                return view('frontend.page.lichsutuongtac', compact('donhang', 'dhct', 'sp', 'ph'));
            } else {
                $dhct = array();
                return view('frontend.page.lichsutuongtac', compact('dhct'));
            }
        }
    }

    public function timKiem(Request $req)
    {
        if ($req->gianho && $req->gialon) {
            $product = San_pham::whereBetween('gia_sp', [$req->gianho, $req->gialon])->get();
        } else if ($req->gianho && !$req->gialon) {
            $product = San_pham::where('gia_sp', '>=', $req->gianho)->get();
        } else if (!$req->gianho && $req->gialon) {
            $product = San_pham::where('gia_sp', '<=', $req->gialon)->get();
        } else {
            $product = San_pham::where('ten_sp', 'like', '%' . $req->key . '%')->get();
        }
        return view('frontend.page.timkiem', compact('product'));
    }

    public function tinTuc($id)
    {
        $tin = Thong_bao::find($id);
        return view('frontend.page.tintuc', compact('tin'));
    }
}
