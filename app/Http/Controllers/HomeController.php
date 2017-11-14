<?php

namespace App\Http\Controllers;

use App\Binh_luan;
use App\Compare;
use App\Don_hang;
use App\Don_hang_chi_tiet;
use App\Khach_hang;
use App\Phan_hoi;
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
//        print_r($slide);  exit;
        $newpr = San_pham::where('san_pham_moi', 1)->paginate(4);
//        print_r($newpr);
        $khuyenmai = San_pham::where('khuyen_mai', '<>', 0)->paginate(8);

        return view('frontend.page.content', compact('newpr', 'slide', 'khuyenmai'));


    }

    public function getLoaiSanPham($type)
    {

        $sp = San_pham::where('loai_spID', $type)->paginate(6);
        $km = San_pham::where('khuyen_mai', '<>', 0)->paginate(6);
//        $loai
        $loai_sp = Loai_san_pham::where('id', $type)->first();
        return view('frontend.page.loaisanpham', compact('sp', 'km', 'loai_sp'));
    }

    public function getChiTietSanPham($id)
    {
        $chitiet = San_pham::where('id', $id)->first();
        $id = $chitiet->id;
        $binhluan = Binh_luan::where('san_phamID', $id)->orderBy('id', 'DESC')->get();
        return view('frontend.page.chitietsanpham', compact('chitiet', 'binhluan'));
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

        $phanhoi = new Phan_hoi;
        $phanhoi->khach_hangID = Session::get('khach_hang_id');
        $phanhoi->noi_dung = $request->message;
        $phanhoi->save();
        return back()->with('thongbao', 'gửi phản hồi thành công');
    }

    public function binhLuan(Request $request, $id)
    {
        $chitiet = San_pham::where('id', $id)->first();
        echo "$chitiet";
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
        $oldCompare = Session('compare') ? Session::get('compare') : null;
        $compare = new Compare($oldCompare);
        $count = $compare->totalQty;
        if($count < 3){
            $compare->add($sanpham, $id);
            $request->session()->put('compare', $compare);
            return back()->with('thongbao', 'Add to compare thành công');

        }else{
            return back()->with('loi','Chỉ thêm được hai sản phẩm vào so sánh');
        }


    }

    public function deleteCompare($id){
        $sanpham = San_pham::find($id);
        $oldCompare = Session('compare') ? Session::get('compare') : null;
        $compare = new Compare($oldCompare);
        $compare->reduceByOne($sanpham->id);
        return back()->with('thongbao','Xóa thành công');
    }

    public function getCompare()
    {
        $oldCompare = Session('compare') ? Session::get('compare') : null;
        $compare = new Compare($oldCompare);
        Session::put('compare_qty',$compare->totalQty);
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
        foreach ($giohang as $row){
            $id =$row->rowId;
            $qty = $request->qty_cart;
            Cart::update($id,$qty);
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
//        print_r($cart);
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
//        echo $tong_tien;
        $kh = new Khach_hang;
        $bill = new Don_hang;
        if (!Session('khach_hang_id')){
            $bill->khach_hangID  = 0;
        }


        $bill->khach_hangID = Session('khach_hang_id');
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
                'email.umique' => 'Email đã tồn tại',
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
            return redirect('index')->with(['flag' => 'success', 'message' => 'Đăng nhập thành công']);
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập không thành công']);
        }

    }

    public function logout(Request $request)
    {
        if (Session::has('khach_hang')) {
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
                'phone' => 'required:min:9',
                're_password' => 'required|same:password'

            ],
            [
                'email.required' => "Nhập email",
                'email.email' => "Email không hợp lệ",
                'email.umique' => 'Email đã tồn tại',
                'password.required' => "Vui lòng nhập mật khẩu",
                're_password.same' => "Mật khẩu không giống nhau",
                'password.min' => 'Mật khẩu ít nhất 6 kí tự'

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

    public function lichSuGioHang(){
        if(Session::has('khach_hang_id')) {
            $id = Session::get('khach_hang_id');
            $donhang = Don_hang::where('khach_hangID', $id)->get();
            foreach ($donhang as $row) {
                $dhct = Don_hang_chi_tiet::where('don_hangID', $row->id)->get();
                foreach ($dhct as $sp ){
                    $sp_id = $sp->san_phamID;
                    print_r($sp_id);
                $sp = San_pham::where('id',$sp_id)->get();
                }
            }

            return view('frontend.page.lichsugiohang',compact('donhang','dhct','sp'));
        }
    }

    public function lichSuGioHangChiTiet(){
        if(Session::has('khach_hang_id')) {
            $id = Session::get('khach_hang_id');
            $donhang = Don_hang::where('khach_hangID', $id)->get();
            foreach ($donhang as $row) {
                $dhct = Don_hang_chi_tiet::where('don_hangID', $row->id)->get();
            }
            return view('frontend.page.lichsugiohang',compact('dhct'));
        }
    }

    public function timKiem(Request $req)
    {
        $product = San_pham::where('ten_sp', 'like', '%' . $req->key . '%')->get();
        return view('frontend.page.timkiem', compact('product'));
    }
}
