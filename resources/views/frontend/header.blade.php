<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-email"></i>bksmart@gmail.com</a></li>
                    <li><a href=""><i class="fa fa-home"></i>Số 1 Trần Đại Nghĩa </a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 19001009</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
                    @if(!Session::has('khach_hang'))
                    <li><a href="{{route('sigin')}}">Đăng kí</a></li>
                    <li><a href="{{route('login')}}">Đăng nhập</a></li>
                        @else
                        <li><a href="{{route('sigin')}}">{{Session::get('khach_hang')}}</a></li>
                        <li><a href="{{route('logout')}}">Logout</a></li>
                        @endif

                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->

    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="index.html" id="logo"><img src="source/frontend/assets/dest/images/logo/a.jpg" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
                        <input type="text" value="" name="key" id="keysp" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    <div class="cart">
                        <div class="beta-selec">
                            <a class="glyphicon glyphicon-shopping-cart"> </a>
                                <?php $count = Cart::count()?>
                                <a  href="{{route('cart')}}"> Giỏ hàng ({{$count}})</a>

                        </div>

                    </div> <!-- .cart -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->

    <div class="header-bottom" style="background-color:#90908e;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu" >
                <ul class="l-inline ov" >
                    <li><a href="{{route('trang_chu')}}">Trang chủ</a></li>
                    <li><a>Danh mục sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($loai_sp as $loai)
                            <li><a href="{{route('loai-san-pham',$loai->id)}}">{{$loai->ten_loai_sp}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
                    <li><a href="{{route('lienhe')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->