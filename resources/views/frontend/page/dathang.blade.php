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

<div class="container" style="width:95%;border:1px solid whitesmoke">
    <div id="content" style="padding-left: 100px;">
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
                        <input type="number" name="sdt" id="sdt"  value="<?php echo isset($kh->sdt_kh) ? $kh->sdt_kh :'' ?>">
                    </div>

                    <div class="form-block">
                        <label for="note">Ghi chú</label>
                        <textarea name="note" id="note"></textarea>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection