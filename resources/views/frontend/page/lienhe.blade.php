@extends("master")
@section("content")

    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Contacts</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="index.html">Home</a>/<span>Contacts</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="beta-map" style="width:90%;margin:auto;">
      @if(Session::has('flag'))
                        <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}

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
        <div class="abs-fullwidth beta-map wow flipInX">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.637751514068!2d105.84212491431308!3d21.00715318601015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac763e5cefbf%3A0x16e1dd841f58fb22!2zMSBUcuG6p24gxJDhuqFpIE5naMSpYSwgQsOhY2ggS2hvYSwgSGFpIELDoCBUcsawbmcsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1506481850405"></iframe>
        </div>
        <div class="container" style="width:100%;">
            <div id="content" class="space-top-none">

                <div class="space50">&nbsp;</div>
                <div class="row" style="border: whitesmoke solid thin">

                    <div class="col-sm-7">
                        <h2>Gửi phẩn hồi</h2>
                        <div class="space20">&nbsp;</div>
                        <p>Hãy đưa ra phản hồi về sản phẩm, phục vụ... để chúng tôi có thể hoàn thiện hơn!</p>
                        <div class="space20">&nbsp;</div>
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
                            <div class="tieu_de">
                                <textarea style="height:70px;" name="tieu_de" placeholder="Title"></textarea>
                            </div>
                            <div class="form-block">
                                <textarea name="noidung" placeholder="Your Message"></textarea>
                            </div>
                            <div class="form-block">
                                <button type="submit" class="btn btn-success">Gửi phản hồi</button>
                            </div>
                        </form>
                        <?php } else {?>
                        <i>Bạn phải đăng nhập mới có thể gửi phản hồi</i>
                        <?php } ?>

                    </div>
                    <div class="col-sm-5">
                        <h2>Thông tin liên hệ</h2>
                        <div class="space20">&nbsp;</div>
                        <div style="padding-left: 5px;">
                            <b class="contact-title">Địa chỉ</b>
                            <p>
                                Số 1 Trần Đại Nghĩa<br>
                                Số 163 Tư Đình, p. Long Biên, Long Biên, Hà Nội, Việt Nam<br>
                                Số 873 Nguyễn Trãi<br>
                                Số 60 Lê Thanh Nghị
                            </p>
                            <div class="space20">&nbsp;</div>
                            <b class="contact-title">Liên lạc</b>
                            <p>19001009</p> <br>
                            <b class="contact-title">Email</b>
                            <p>bksmart@gmail.com</p> <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div> <!-- #content -->
        </div> <!-- .container -->
    </div>
@endsection