
<!-- Left side content -->
<div id="left_content">
    <div id="leftSide" style="padding-top:30px;">

        <!-- Account panel -->

        <div class="sideProfile">
            <a href="#" title="" class="profileFace"><img width="40" src="source\backend\admin\images\user.png" /></a>
            <span>Xin chào: <strong>Admin! </strong></span>
            <span><?php if(Session::has('admin')) echo Session::get('admin') ?></span>
            <div class="clear"></div>
        </div>
        <div class="sidebarSep"></div>
        <!-- Left navigation -->

        <ul id="menu" class="nav">

            <li class="home">

                <a href="{{route('admin/dashboard')}}" class="active" id="current">
                    <span>Bảng điều khiển</span>
                    <strong></strong>
                </a>


            </li>
            <li class="tran">

                <a href="admin/tran.html" class=" exp" >
                    <span>Quản lý bán hàng</span>
                    <strong>2</strong>
                </a>

                <ul class="sub">
                    <li >
                        <a href="{{route('admin/donhang/index')}}">
                            Danh sách đơn hàng							</a>
                    </li>
                </ul>

            </li>
            <li class="product">

                <a href="admin/product.html" class=" exp" >
                    <span>Sản phẩm</span>
                    <strong>3</strong>
                </a>

                <ul class="sub">
                    <li >
                        <a href="{{route('admin/product/index')}}">
                            Sản phẩm							</a>
                    </li>
                    <li >
                        <a href="{{route('admin/category/index')}}">
                            Danh mục							</a>
                    </li>
                </ul>

            </li>
            <li class="account">

                <a href="admin/account.html" class=" exp" >
                    <span>Tài khoản</span>
                    <strong>2</strong>
                </a>

                <ul class="sub">
                    <li >
                        <a href="{{route('admin/nhanvien/index')}}">
                            Ban quản trị							</a>
                    </li>
                    <li >
                        <a href="{{route('admin/khachhang/index')}}">
                            Khách hàng thành viên						</a>
                    </li>
                </ul>

            </li>
            <li class="content">

                <a href="admin/content.html" class=" exp" >
                    <span>Nội dung</span>
                    <strong>2</strong>
                </a>

                <ul class="sub">
                    <li >
                        <a href="{{route('admin/slide/index')}}">
                            Slide							</a>
                    </li>
                    <li >
                        <a href="{{route('admin/tintuc/index')}}">
                            Tin tức							</a>
                    </li>
                </ul>

            </li>

            <li class="content">

                <a href="admin/content.html" class=" exp" >
                    <span>Tương tác khách hàng</span>
                    <strong>2</strong>
                </a>

                <ul class="sub">
                    <li >
                        <a href="{{route('admin/feedback/index')}}">
                            Phản hồi							</a>
                    </li>
                    <li >
                        <a href="{{route('admin/binhluan/index')}}">
                            Bình luận							</a>
                    </li>
                </ul>

            </li>

        </ul>

    </div>
    <div class="clear"></div>
</div>
