@extends('masteradmin')
@section('contentadmin')

    <div id="rightSide">
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Nhân Viên</h5>
                    <span>Quản lý nhân viên</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>
                        <li><a href="{{route('admin/nhanvien/add')}}">
                                <img src="source/backend/admin/images/icons/control/16/add.png"/>
                                <span>Thêm mới</span>
                            </a></li>

                        <li><a href="{{route('admin/nhanvien/index')}}">
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
            <form enctype="multipart/form-data" method="post" action="admin/nhanvien/edit/{{$nhanvien->id}}" id="form"
                  class="form">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                @if(count($errors) >0 )
                    <div class="alert alert-danger" style="background:red;color:white">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                <fieldset>
                    <div class="widget">
                        <div class="title">
                            <img class="titleIcon" src="source/backend/admin/images/icons/dark/add.png">
                            <h6>Cập nhật thông tin nhân viên</h6>
                        </div>
                        <div class="tab_container">
                            <div class="tab_content pd0" id="tab1" style="display: block;">
                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Họ Tên</label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input type="text"
                                                                    value="{{$nhanvien->ten_ad }}" name="name"></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Mật khẩu</label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input type="text"
                                                                    value="{{$nhanvien->mk_ad }}" name="mk"></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Email<span class="req">*</span></label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input type="text"
                                                                    value="{{ $nhanvien->email_ad }}" name="email"></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Số điện thoại<span class="req">*</span></label>
                                    <div class="formRight">
                                        <span class="oneTwo"><input type="number"
                                                                    value="0{{ $nhanvien->sdt_ad }}" name="sdt"></span>
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