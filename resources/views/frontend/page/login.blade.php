@extends('master')
@section('content')
    <style>
        [view=login] {
            display: flex;
            justify-content: center;

            margin-top: 20px;
            margin-bottom: 350px;
        }

        [view=login] .main {
            width: 800px;
            font-family: Arial !important;
        }

        [view=login] .main h1 {
            font-size: 22px !important;
            margin-bottom: 15px;

            color: black;
        }

        [view=login] input {
            padding: 5px;
            border: none;
            outline: none;
        }

        [view=login] .input .bottom-line {
            display: flex;
            justify-content: center;

            width: 100%;
            height: 2px;
            background: #eee;
        }

        
        [view=login] .input .bottom-line::after {
            content: '';
            height: 100%;
            width: 0px;
            background: black;
        }

        [view=login] .input.focus .bottom-line::after {
            width: 100%;
        }

        [view=login] .input .bottom-line::after {
            transition: 0.5s;
        }

        [view=login] .input input {
            width: 100%;
            font-size: 14px !important;
            padding: 0px;
            margin: 0px;
        }

        [view=login] input {
            padding: 8px !important;
        }

        [view=login] .input {
            margin-bottom: 8px;
        }

        [view=login] button {
            padding: 5px 20px;
            font-size: 14px !important;
            background: black;
            color: white;
            border: none;
            outline: none;

            margin-top: 20px;
        }

        [view=login] .error {
            color: red;
            font-size: 14px !important;
        }
    </style>

    <div view="login">
        <form class="main" action="{{route('login')}}" method="post">
            <h1>Đăng nhập</h1>

            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

            <div class="input">
                <input type="text" name="email" placeholder="Email Address">
                <div class="bottom-line"></div>
            </div>

            <div class="input">
                <input type="password" name="password" placeholder="Password">
                <div class="bottom-line"></div>
            </div>
            
            @if(count($errors)> 0)
                <div class="error">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif
            @if(Session::has('loi'))
                <div class="error">
                    {{Session::get('loi')}}
                </div>
            @endif
            @if(Session::has('thongbao'))
                <div class="error">
                    {{Session::get('thongbao')}}
                </div>
            @endif

            <button type="submit">Hoàn tất</button>
        </form>
    </div>

    <script>
        document.querySelectorAll('[view=login] input').forEach(function (el) {
            el.addEventListener('focus', function () {
                el.parentElement.classList.add('focus')
            })

            el.addEventListener('blur', function () {
                el.parentElement.classList.remove('focus')
            })
        })
    </script>
@endsection