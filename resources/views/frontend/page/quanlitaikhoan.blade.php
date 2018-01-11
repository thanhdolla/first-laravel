@extends('master')
@section("content")
    <style>
        [view=profile] {
            display: flex;
            justify-content: center;

            margin-bottom: 240px;
        }

        [view=profile] .main {
            width: 800px;
        }

        [view=profile] h1 {
            font-family: Lato;
            font-size: 24px;
        }

        [view=profile] .input .bottom-line {
            display: flex;
            justify-content: center;

            width: 100%;
            height: 2px;
            background: #eee;
        }

        
        [view=profile] .input .bottom-line::after {
            content: '';
            height: 100%;
            width: 0px;
            background: black;
        }

        [view=profile] .input.focus .bottom-line::after {
            width: 100%;
        }

        [view=profile] .input .bottom-line::after {
            transition: 0.5s;
        }

        [view=profile] .input input {
            width: 100%;
            font-size: 14px !important;
            padding: 0px;
            margin: 0px;

            font-family: Arial;

            border: none;
            outline: none;
        }

        [view=profile] input {
            padding: 8px !important;
        }

        [view=profile] .input {
            margin-bottom: 8px;
        }

        [view=profile] button {
            padding: 5px 20px;
            font-size: 14px !important;
            background: black;
            color: white;
            border: none;
            outline: none;

            margin-top: 20px;
        }

        [view=profile] .input .label {
            font-size: 12px !important;
            color: black;
            font-weight: normal;
        }
    </style>

    <div view="profile">
        <div class="main">
            <h1>Thông tin tài khoản</h1>

            <br/>

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

            @if(count($errors)> 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}
                    @endforeach
                </div>
            @endif
            @if(Session::has('thongbao'))
                <div class="alert alert-success">
                    {{Session::get('thongbao')}}
                </div>
            @endif

            <br/>

            <form action="{{route('luuthongtinkhachhang')}}" method="post">
                <div class="input">
                    <div class="label" for="name">Họ tên</div>
                    <input
                        type="text" id="name" name="name" placeholder="Họ tên" required
                        value="<?php echo isset($kh->ten_kh) ? $kh->ten_kh : '' ?>">
                    <div class="bottom-line"></div>
                </div>

                <div class="input">
                    <div class="label" for="email">Mật khẩu</div>
                    <input
                        type="text" name="mk_kh" id="mk_kh" required
                        value="<?php echo isset($kh->mk_kh) ? $kh->mk_kh : '' ?>">
                    <div class="bottom-line"></div>
                </div>


                <div class="input">
                    <div class="label" for="email">Email</div>
                    <input
                        type="email" name="email" id="email" required placeholder="expample@gmail.com"
                        value="<?php echo isset($kh->email_kh) ? $kh->email_kh : '' ?>">
                    <div class="bottom-line"></div>
                </div>

                <div class="input">
                    <div class="label" for="diachi">Địa chỉ</div>
                    <input 
                        type="text" name="diachi" required
                        value="<?php echo isset($kh->dia_chi_kh) ? $kh->dia_chi_kh : '' ?>">
                    <div class="bottom-line"></div>
                </div>

                <div class="input">
                    <div class="label" for="sdt">Điện thoại</div>
                    <input 
                        type="text" name="sdt" required
                        value="<?php echo isset($kh->sdt_kh) ? $kh->sdt_kh : '' ?>">
                    <div class="bottom-line"></div>
                </div>

                <button type="submit">Lưu thông tin</button>
            </form>
        </div>
    </div>

    <script>
        document.querySelectorAll('[view=profile] input').forEach(function (el) {
            el.addEventListener('focus', function () {
                el.parentElement.classList.add('focus')
            })

            el.addEventListener('blur', function () {
                el.parentElement.classList.remove('focus')
            })
        })
    </script>
@endsection