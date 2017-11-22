@extends('masteradmin')
@section('contentadmin')

    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    </script>

    <div id="rightSide">
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Tin Tức</h5>
                    <span>Quản lý tin tức</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>
                        <li><a href="{{route('admin/tintuc/add')}}">
                                <img src="source/backend/admin/images/icons/control/16/add.png"/>
                                <span>Thêm mới</span>
                            </a></li>

                        <li><a href="{{route('admin/tintuc/index')}}">
                                <img src="source/backend/admin/images/icons/control/16/list.png"/>
                                <span>Danh sách</span>
                            </a></li>
                    </ul>
                </div>

                <div class="clear"></div>
            </div>
        </div>
        <div class="line"></div>

        <div class="wrapper">

            <!-- Form -->
            <form enctype="multipart/form-data" method="post" action="admin/tintuc/edit/{{$tintuc->id}}" id="form"
                  class="form">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                @if(count($errors) >0 )
                    <div style="background:red;color:white">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
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
                            <h6>Cập nhật tintuc</h6>
                        </div>
                        <div class="tab_container">
                            <div class="tab_content pd0" id="tab1" style="display: block;">
                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Tiêu đề tin<span class="req">*</span></label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input type="text" id="param_name"
                                                                    value="<?php echo $tintuc->tieu_de_tb ?>" name="tieude"></span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Nội dung tin<span class="req">*</span></label>
                                    <div class="formRight">
                                        <span class="oneTwo" >
                                            <textarea name="noidung" name="noidung">{{$tintuc->noi_dung_tb}}</textarea>
                                        </span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow">
                                    <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                                    <div class="formRight">
                                        <div class="left" style="float:left">
                                            <input type="file" name="image" id="image" value="{{$tintuc->anh_tb}}" size="25"/>
                                        </div>
                                        <div style="float:left">
                                            <img src="upload/tintuc/add/{{$tintuc->anh_tb}}"
                                                 style="width:300px;height:70px">
                                        </div>
                                        <div class="clear error" name="image_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow hide"></div>
                            </div>


                        </div><!-- End tab_container-->

                        <div class="formSubmit">
                            <button type="submit" class="redB">Cập nhật</button>
                        </div>
                        <div class="clear"></div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="clear mt30"></div>
    </div>

@endsection