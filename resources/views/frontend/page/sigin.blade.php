@extends('master')
@section("content")

    <style>
        [view=signin] {
            display: flex;
            justify-content: center;

            margin-top: 20px;
            margin-bottom: 200px;
        }

        [view=signin] .main {
            width: 800px;
            font-family: Arial !important;
        }

        [view=signin] .main h1 {
            font-size: 22px !important;
            margin-bottom: 15px;
        }

        [view=signin] input {
            padding: 5px;
            border: none;
            outline: none;
        }

        [view=signin] .input .bottom-line {
            display: flex;
            justify-content: center;

            width: 100%;
            height: 2px;
            background: #eee;
        }

        [view=signin] .line {
            display: flex;
        }

        [view=signin] .line > * {
            flex: 0 0 auto;
            width: 50%;
        }

        [view=signin] .line > :not(:first-child) {
            margin-left: 10px;
        }

        [view=signin] .input .label {
            font-size: 12px !important;
            color: black;
            font-weight: normal;
        }
        
        [view=signin] .input .bottom-line::after {
            content: '';
            height: 100%;
            width: 0px;
            background: black;
        }

        [view=signin] .input.focus .bottom-line::after {
            width: 100%;
        }

        [view=signin] .input .bottom-line::after {
            transition: 0.5s;
        }

        [view=signin] .input input {
            width: 100%;
            font-size: 14px !important;
            padding: 0px;
            margin: 0px;
        }

        [view=signin] input {
            padding: 8px !important;
        }

        [view=signin] .input {
            margin-bottom: 8px;
        }

        [view=signin] button {
            padding: 5px 20px;
            font-size: 14px !important;
            background: black;
            color: white;
            border: none;
            outline: none;

            margin-top: 20px;
        }

        [view=signin] .error {
            color: red;
            font-size: 14px !important;
        }
    </style>

    <div view="signin">
        <form class="main" action="{{route('sigin')}}" method="post">
            <h1>Đăng kí</h1>

            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

            <div class="input">
                <p class="label">Email Address</p>
                <input type="text" name="email" placeholder="e.g. abc@example.com">
                <div class="bottom-line"></div>
            </div>
            
            <div class="input">
                <p class="label">Name</p>
                <input type="text" name="fullname">
                <div class="bottom-line"></div>
            </div>

            <div class="line">
                <div class="input">
                    <p class="label">Address</p>
                    <input type="text" name="address" placeholder="e.g. London">
                    <div class="bottom-line"></div>
                </div>

                <div class="input">
                    <p class="label">Phone</p>
                    <input type="text" name="phone" placeholder="e.g. 09xxxxxxxx">
                    <div class="bottom-line"></div>
                </div>
            </div>

            <br/>

            <div class="input">
                <input type="password" name="password" placeholder="Password">
                <div class="bottom-line"></div>
            </div>

            <div class="input">
                <input type="password" name="re_password" placeholder="Repassword">
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
            @if(Session::has('thanhcong'))
                <div class="error">
                    {{Session::get('thanhcong')}}
                </div>
            @endif

            <button type="submit">Hoàn tất</button>
        </form>
    </div>

    <script>
        document.querySelectorAll('[view=signin] input').forEach(function (el) {
            el.addEventListener('focus', function () {
                el.parentElement.classList.add('focus')
            })

            el.addEventListener('blur', function () {
                el.parentElement.classList.remove('focus')
            })
        })
    </script>
@endsection