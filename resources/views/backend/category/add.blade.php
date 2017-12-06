@extends('masteradmin')
@section('contentadmin')

    <!-- Right side -->
    <div id="rightSide">

        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Loại sản phẩm</h5>
                    <span>Quản lý danh mục loại sản phẩm</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>
                        <li><a href="{{route('admin/category/add')}}">
                                <img src="source/backend/admin/images/icons/control/16/add.png" />
                                <span>Thêm mới</span>
                            </a></li>

                        <li><a href="{{route('admin/category/index')}}">
                                <img src="source/backend/admin/images/icons/control/16/list.png" />
                                <span>Danh sách</span>
                            </a></li>
                    </ul>
                </div>

                <div class="clear"></div>
            </div>
        </div>
        <div class="line"></div>
<div class="wrapper">

    <form enctype="multipart/form-data" method="post" action="{{route('admin/category/add')}}" id="form" class="form">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        @if(count($errors)> 0)
            <div class="alert alert-danger" style="background:red" >
                @foreach($errors->all() as $err)
                    {{$err}}
                @endforeach
            </div>
        @endif
        @if(Session::has('thongbao'))
            <div class="alert alert-success" style="background:#00ced1">
                {{Session::get('thongbao')}}
            </div>
        @endif
        @if(Session::has('loi'))
            <div class="alert alert-success" style="background:red">
                {{Session::get('loi')}}
            </div>
        @endif
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="source/backend/admin/images/icons/dark/add.png">
                    <h6>Thêm mới loại sản phẩm</h6>
                </div>

                {{--<ul class="tabs">--}}
                    {{--<li class="activeTab"><a href="#tab1">Thông tin chung</a></li>--}}

                {{--</ul>--}}

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1" style="display: block;">
                        <div class="formRow">
                            <label for="param_name" class="formLeft">Tên loại sản phẩm:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text"  id="param_name" name="name" required>
                                </span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label for="param_name" class="formLeft">Mô tả:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="textarea" id="param_name" name="description">
                                </span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow hide"></div>
                    </div>


                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <button type="submit" class="redB" >Thêm mới</button>

                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>
<div class="clear mt30"></div>
    </div>
    @endsection