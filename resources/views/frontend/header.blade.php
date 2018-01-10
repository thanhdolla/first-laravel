<style>
    [view=header] {
        position: absolute;
        top: 0px;
        left: 0px;
        right: 0px;

        display: flex;
        align-items: center;
        height: 48px;

        box-shadow: 0 5px 8px rgba(0, 0, 0, 0.08);

        background: orange;
    }

    body {
        padding-top: 48px;
    }

    [view=header].fixed {
        position: fixed;
        top: 0px;
        right: 0px;
        left: 0px;

        z-index: 1000;
    }

    [view=header] .app-name {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 105px;
        height: 100%;
        background: white;
    }

    [view=header] .app-name h1 {
        font-family: Lato Medium;
        font-size: 18.75px;

        color: orange;
    }

    [view=header] .main {
        display: flex;
        align-items: center;

        height: 100%;
        flex: 1 1 auto;

        padding-right: 35px;
        padding-left: 35px;
    }

    [view=header] .main .search-bar {
        display: flex;

        height: 30px;
        max-width: 800px;
        flex: 1 1 auto;

        border-radius: 3px;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.08);

        background: white;
    }

    [view=header] .main .search-bar input {
        display: flex;
        align-items: center;
        padding-left: 20px;
        padding-right: 20px;

        height: 100%;
        flex: 1 1 auto;

        font-family: Lato;
        font-size: 14px;

        background: none;
        border: none;
        outline: none;
    }

    [view=header] .main form {
        flex: 1 1 auto;
        max-width: 800px;
    }

    [view=header] .main .search-bar .search-icon {
        display: flex;

        height: 100%;
        flex: 0 0 auto;

        align-items: center;

        padding-left: 20px;
        padding-right: 20px;

        border: none;
        outline: none;
        background: none;
    }

    [view=header] .icon {
        font-family: Material Icons;
        font-size: 18px;
    }

    [view=header] .actions {
        display: flex;
        flex: 0 0 auto;

        height: 100%;
        color: white;
    }

    [view=header] .text {
        display: flex;
        align-items: center;
        padding-left: 20px;
        padding-right: 20px;

        height: 100%;

        color: white !important;
        font-family: Lato;
        font-size: 14px;
    }

    [view=header] .actions .cart-icon {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;

        height: 100%;
        width: 60px;

        border: none;
        outline: none;

        background: white; 
        
        cursor: pointer;
    }

    [view=header] .actions .cart-icon::after {
        content: attr(data-count);

        display: flex;
        justify-content: center;
        align-items: center;

        position: absolute;
        right: 8px;
        top: 5px;

        width: 20px;
        height: 20px;

        background: orange;
        color: white;

        border-radius: 50%;
        font-size: 8px;
        font-family: Lato;
    }
    
    [view=header] .actions .compare-icon {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;

        height: 100%;
        width: 60px;

        border: none;
        outline: none;

        background: dodgerblue; 
        color: white;
        
        cursor: pointer;
    }

    [view=header] .actions .compare-icon::after {
        content: attr(data-count);

        display: flex;
        justify-content: center;
        align-items: center;

        position: absolute;
        right: 8px;
        top: 5px;

        width: 20px;
        height: 20px;

        background: white;
        color: black;

        border-radius: 50%;
        font-size: 8px;
        font-family: Lato;
    }
</style>

<div id="header" view="header">
    <div class="app-name">
        <a href="{{route('trang_chu')}}">
            <h1>BKSmart</h1>
        </a>
    </div>

    <div class="main">
        <form role="search" method="get" id="searchform" action="{{route('timkiem')}}" >
            <div class="search-bar">
                <input type="text" name="key" placeholder="Tìm kiếm">
                <button class="search-icon icon">
                    search
                </button>
            </div>
        </form>
    </div>

    <div class="actions">
        <div class="text">
            @if(!Session::has('khach_hang'))
                <a href="{{route('sigin')}}" class="text">Đăng kí</a>
                /
                <a href="{{route('login')}}" class="text">Đăng nhập</a>
            @else
                <a href="{{route('lichsutuongtac')}}" class="text"><i class="fa fa-user"></i>Lịch sử tương tác</a>
                /
                <a href="{{route('quanlitaikhoan')}}" class="text">{{Session::get('khach_hang')}}</a>
                /
                <a href="{{route('logout')}}" class="text">Đăng xuất</a>
            @endif
        </div>

        <a href="{{route('getcompare')}}">
            <button
                class="compare-icon icon"
                data-count="<?php
                    if(Session::has('compare_qty')) {
                        echo Session::get('compare_qty');
                    } else echo 0;?>"
            >
                compare
            </button>
        </a>

        <a href="{{route('cart')}}" title="Giỏ hàng">
            <?php $count=Cart::count()?>
            <button class="cart-icon icon" data-count="{{$count}}">
                shopping_cart
            </button>
        </a>
    </div>
</div>

<style>
    [view=sub-header] {
        height: 48px;

        display: flex;
        justify-content: center;

        margin-bottom: 30px;
    }

    [view=sub-header] .menu {
        display: flex;

        height: 100%;
        width: 800px;
    }

    [view=sub-header] .menu .tab {
        position: relative;
        display: flex;
        align-items: center;

        padding-left: 20px;
        padding-right: 20px;
        height: 100%;

        font-family: Lato;
        font-size: 16px;

        cursor: pointer;
    }

    [view=sub-header] .menu .tab:hover {
        background: orange;
        color: white;
    }

    [view=sub-header] .tab:hover .sub-menu {
        position: absolute;
        top: 100%;
        display: block;

        width: 100%;
    }

    [view=sub-header] .tab:hover .sub-menu .item {
        display: flex;
        align-items: center;

        height: 48px;
        padding-left: 20px;
        padding-right: 20px;
    }

    [view=sub-header] .tab:hover .sub-menu .item:hover {
        background: orange;
    }
</style>

<div view="sub-header">
    <nav class="menu">
        <a href="{{route('trang_chu')}}">
            <div class="tab">Trang chủ</div>
        </a>
        <div class="tab">
            <div class="tab-content">
                Danh mục sản phẩm
            </div>
            <div class="sub-menu">
                @foreach($loai_sp as $loai)
                    <a href="{{route('loai-san-pham',$loai->id)}}">
                        <div class="item">{{$loai->ten_loai_sp}}</div>
                    </a>
                @endforeach
            </div>
        </div>
        <a href="{{route('gioithieu')}}">
            <div class="tab">Giới thiệu</div>
        </a>
        <a href="{{route('lienhe')}}">
            <div class="tab">Liên hệ</div>
        </a>
    </nav>
</div>
