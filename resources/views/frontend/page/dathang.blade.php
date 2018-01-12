@extends('master')
@section('content')
    <style>
        [view=order] {
            display: flex;
            flex-flow: column nowrap;
            align-items: center;

            margin-top: 20px;
            margin-bottom: 80px;
        }

        [view=order] .main {
            width: 1000px;
        }

        [view=order] h1 {
            font-family: Lato;
            font-size: 24px;
        }

        [view=order] h2 {
            font-family: Lato;
            font-size: 18.75px;
        }

        [view=order] .price {
            color: orange;
        }
        
        [view=order] input {
            padding: 5px;
            border: none;
            outline: none;
        }

        [view=order] .input .bottom-line {
            display: flex;
            justify-content: center;

            width: 100%;
            height: 2px;
            background: #eee;
        }

        [view=order] .label {
            font-size: 12px !important;
            color: black;

            padding: 0px;
        }
        
        [view=order] .input .bottom-line::after {
            content: '';
            height: 100%;
            width: 0px;
            background: black;
        }

        [view=order] .input.focus .bottom-line::after {
            width: 100%;
        }

        [view=order] .input .bottom-line::after {
            transition: 0.5s;
        }
        
        [view=order] .input input,
        [view=order] .input textarea {
            width: 100%;
            font-size: 14px !important;
            padding: 0px;
            margin: 0px;

            font-family: Arial;
            font-size: 14px;

            padding: 8px !important;

            background: none;
            outline: none;
            border: none !important;
        }
        
        [view=order] .input textarea {
            resize: vertical;
            height: 80px;
        }

        [view=order] .input {
            margin-bottom: 8px;
        }

        [view=order] button {
            padding: 5px 20px;
            font-size: 14px !important;
            background: black;
            color: white;
            border: none;
            outline: none;

            margin-top: 20px;

            font-family: Lato;
            font-size: 14px;
        }
    </style>

    <div view="order">
        <div class="main">
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

            <h1>Form nhập thông tin đặt hàng</h1>

            @if(Session::has('flag'))
                <div class="alert alert-{{Session::get('flag')}}">
                    {{Session::get('message')}}
                </div>
            @endif
            @if(Session::has('thongbao'))
                <div class="alert alert-success" style="background:#00ced1;font-size:16px;color:black">
                    {{Session::get('thongbao')}}
                </div>
            @endif
            @if(Session::has('loi'))
                <div class="alert alert-danger" style="background:Red; color:black;font-size:16px;">
                    {{Session::get('loi')}}
                </div>
            @endif

            <h2>
                Tổng số tiền cần thanh toán: <span class="price"><?php $tong_tien = Cart::subtotal(); echo $tong_tien ?></span>
            </h2>

            <form action="{{route('dathang')}}" method="post">
                <input name="_token" type="hidden" value="{{csrf_token()}}"/>

                <div class="input">
                    <div class="label">Họ tên</div>
                    <input type="text" name="name" placeholder="Họ tên" value="<?php echo isset($kh->ten_kh) ? $kh->ten_kh :'' ?>">
                    <div class="bottom-line"></div>
                </div>
                <div class="input">
                    <div class="label">Email</div>
                    <input type="email" name="email" placeholder="expample@gmail.com" value="<?php echo isset($kh->email_kh) ? $kh->email_kh :'' ?>">
                    <div class="bottom-line"></div>
                </div>
                <div class="input">
                    <div class="label">Địa chỉ</div>
                    <input type="text" name="diachi" placeholder="Street Address" value="<?php echo isset($kh->dia_chi_kh) ? $kh->dia_chi_kh :'' ?>">
                    <div class="bottom-line"></div>
                </div>
                <div class="input">
                    <div class="labe">Điện thoại</div>
                    <input type="number" name="sdt" value="<?php echo '0'.isset($kh->sdt_kh) ? '0'.$kh->sdt_kh :'' ?>">
                    <div class="bottom-line"></div>
                </div>

                <div class="input">
                    <div class="label">Ghi chú</div>
                    <textarea name="note" placeholder="Your Message..."></textarea>
                    <div class="bottom-line"></div>
                </div>
                
                <button type="submit">Đặt hàng</button>
            </form>
        </div>
    </div>

    
    <script>
        document.querySelectorAll('[view=order] input, [view=order] textarea').forEach(function (el) {
            el.addEventListener('focus', function () {
                el.parentElement.classList.add('focus')
            })

            el.addEventListener('blur', function () {
                el.parentElement.classList.remove('focus')
            })
        })
    </script>
@endsection