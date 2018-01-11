@extends("master")
@section("content")

    <style>
        [view=contact] {
            display: flex;
            flex-flow: column;
            align-items: center;

            margin-bottom: 100px;
            margin-top: 40px;
        }

        [view=contact] .main {
            display: flex;
            width: 1000px;
            margin-top: 40px;
        }

        [view=contact] .map {
            width: 1000px;
        }

        [view=contact] .map iframe {
            width: 1000px;
            height: 500px;
        }

        [view=contact] .left {
            width: 50%;
        }

        [view=contact] .right {
            width: 50%;
            margin-left: 20px;
        }

        [view=contact] h2 {
            font-family: Lato;
            font-size: 24px;
        }

        [view=contact] h3 {
            font-family: Lato;
            font-size: 18.75px;
        }

        [view=contact] p {
            font-family: Arial;
            font-size: 14px;
        }
        
        [view=contact] input {
            padding: 5px;
            border: none;
            outline: none;
        }

        [view=contact] .input .bottom-line {
            display: flex;
            justify-content: center;

            width: 100%;
            height: 2px;
            background: #eee;
        }

        [view=contact] .label {
            font-size: 12px !important;
            color: black;
        }
        
        [view=contact] .input .bottom-line::after {
            content: '';
            height: 100%;
            width: 0px;
            background: black;
        }

        [view=contact] .input.focus .bottom-line::after {
            width: 100%;
        }

        [view=contact] .input .bottom-line::after {
            transition: 0.5s;
        }
        
        [view=contact] .input input,
        [view=contact] .input textarea {
            width: 100%;
            font-size: 14px !important;
            padding: 0px;
            margin: 0px;

            resize: vertical;
            
            padding: 8px !important;

            background: none;
            outline: none;
            border: none !important;
        }

        [view=contact] .input {
            margin-bottom: 8px;
        }

        [view=contact] button {
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

    <div view="contact">
        <div class="map">
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

            <h2>Bản đồ</h2>

            <br>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.637751514068!2d105.84212491431308!3d21.00715318601015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac763e5cefbf%3A0x16e1dd841f58fb22!2zMSBUcuG6p24gxJDhuqFpIE5naMSpYSwgQsOhY2ggS2hvYSwgSGFpIELDoCBUcsawbmcsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1506481850405"></iframe>
        </div>

        <div class="main">
            <div class="left">
                <h2>Phản hồi</h2>

                <br>

                <p>Hãy đưa ra phản hồi về sản phẩm, phục vụ... để chúng tôi có thể hoàn thiện hơn!</p>

                <br>

                @if(count($errors)> 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                @if(Session::has('loi'))
                    <div class="alert alert-danger">
                        {{Session::get('loi')}}
                    </div>
                @endif
                @if(Session::has('thongbao'))
                    <div class="alert alert-success">
                        {{Session::get('thongbao')}}
                    </div>
                @endif
                
                <?php if(Session::has('khach_hang_id')) { ?>
                <form action="{{route('phanhoi')}}" method="post" class="contact-form">
                    <input name="_token" type="hidden" value="{{csrf_token()}}"/>

                    <div class="input">
                        <div class="label">Title</div>
                        <input name="tieu_de" placeholder="Text..."></input>
                        <div class="bottom-line"></div>
                    </div>
                    
                    <div class="input">
                        <div class="label">Message</div>
                        <textarea name="noidung" placeholder="Your Message..."></textarea>
                        <div class="bottom-line"></div>
                    </div>
                    
                    <button type="submit">Gửi</button>
                </form>
                
                <?php } else {?>
                <i>Bạn phải đăng nhập mới có thể gửi phản hồi</i>
                <?php } ?>
            </div>

            <div class="right">
                <h2>Thông tin liên hệ</h2>

                <br>
                
                <h3>Địa chỉ</h3>
                <p>
                    Số 1 Trần Đại Nghĩa<br>
                    Số 163 Tư Đình, p. Long Biên, Long Biên, Hà Nội, Việt Nam<br>
                    Số 873 Nguyễn Trãi<br>
                    Số 60 Lê Thanh Nghị
                </p>
                
                <br>

                <h3>Liên lạc</h3>
                <p>19001009</p> <br>

                <br>

                <h3>Email</h3>
                <p>bksmart@gmail.com</p>
            </div>
        </div>
    </div>
    
    <script>
        document.querySelectorAll('[view=contact] input, [view=contact] textarea').forEach(function (el) {
            el.addEventListener('focus', function () {
                el.parentElement.classList.add('focus')
            })

            el.addEventListener('blur', function () {
                el.parentElement.classList.remove('focus')
            })
        })
    </script>
@endsection