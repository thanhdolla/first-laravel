@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đặt hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        @if(count($errors)> 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif
        @if(Session::has('thongbao'))
            <div class="alert alert-success">
                {{Session::get('thongbao')}}
            </div>
        @endif
        <form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
            <input name="_token" type="hidden" value="{{csrf_token()}}"/>
            <div class="row">
                <div><h3>Form nhập thông tin mua hàng</h3>
                </div><hr></hr>
                <h5>Tông tiền cần thanh toán: <b style="color: red"><?php  $tong_tien = Cart::subtotal();

                        echo $tong_tien ?></b></h5>
                <div class="col-sm-6">
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text"  id="name" name="name" placeholder="Họ tên"  value="<?php echo isset($kh->ten_kh) ? $kh->ten_kh :'' ?>">
                    </div>
                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" name="email" id="email"  placeholder="expample@gmail.com" value="<?php echo isset($kh->email_kh) ? $kh->email_kh :'' ?>">
                    </div>

                    <div class="form-block">
                        <label for="diachi">Địa chỉ*</label>
                        <input type="text" name="diachi" id="diachi" placeholder="Street Address"   value="<?php echo isset($kh->dia_chi_kh) ? $kh->dia_chi_kh :'' ?>">
                    </div>


                    <div class="form-block">
                        <label for="sdt">Điện thoại*</label>
                        <input type="text" name="sdt" id="sdt"  value="<?php echo isset($kh->sdt_kh) ? $kh->sdt_kh :'' ?>">
                    </div>

                    <div class="form-block">
                        <label for="note">Ghi chú</label>
                        <textarea name="note" id="note"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                <div>
                                    <!--  one item	 -->
                                    <div class="media">
                                        <img width="25%" src="assets/dest/images/shoping1.jpg" alt="" class="pull-left">
                                        <div class="media-body">
                                            <p class="font-large">Men's Belt</p>
                                            <span class="color-gray your-order-info">Color: Red</span>
                                            <span class="color-gray your-order-info">Size: M</span>
                                            <span class="color-gray your-order-info">Qty: 1</span>
                                        </div>
                                    </div>
                                    <!-- end one item -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black">$235.00</h5></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                    </div>
                                </li>

                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
                                    <label for="payment_method_cheque">Chuyển khoản </label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        Chuyển tiền đến tài khoản sau:
                                        <br>- Số tài khoản: 123 456 789
                                        <br>- Chủ TK: Nguyễn A
                                        <br>- Ngân hàng ACB, Chi nhánh TPHCM
                                    </div>
                                </li>

                            </ul>
                        </div>

                        <div class="text-center"><button type="submit" class="beta-btn primary" href="">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection