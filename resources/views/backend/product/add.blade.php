@extends('masteradmin')
@section('contentadmin')
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function () {
            nicEditors.allTextAreas()
        });
    </script>
    <!-- Right side -->
    <div id="rightSide">


        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Sản phẩm</h5>
                    <span>Quản lý sản phẩm</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>
                        <li><a href="{{route('admin/product/add')}}">
                                <img src="source/backend/admin/images/icons/control/16/add.png"/>
                                <span>Thêm mới</span>
                            </a></li>

                        <li><a href="{{route('admin/product/index')}}">
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

            <form enctype="multipart/form-data" method="post" action="{{route('admin/product/add')}}" id="form"
                  class="form">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                @if(count($errors)> 0)
                    <div class="alert alert-danger" style="background:red">
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
                            <h6>Thêm mới sản phẩm</h6>
                        </div>

                        <div class="tab_container">
                            <div class="tab_content pd0" id="tab1" style="display: block;">
                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Tên sản phẩm:<span
                                                class="req">*</span></label>
                                    <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" id="param_name" name="name" required>
                                </span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Loại sản phẩm:<span
                                                class="req">*</span></label>
                                    <div class="formRight">
                                <span class="oneTwo">

                                    <select id="param_name" name="category">
                                        @foreach($cate as $ct)
                                            <option value={{$ct->id}}>{{$ct->ten_loai_sp}}</option>
                                        @endforeach
                                    </select>
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
                                    <textarea name="description" id="param_name"></textarea>

                                </span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Giá bán:<span class="req">*</span></label>
                                    <div class="formRight">
                                <span class="oneTwo">
                                    <input type="number" id="param_name" name="price"
                                           > VNĐ

                                </span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Khuyến mãi:<span
                                                class="req">*</span></label>
                                    <div class="formRight">
                                <span class="oneTwo">
                                    <input type="number" id="param_name" name="discount"
                                           > VNĐ

                                </span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formRow">
                                    <label for="param_name" class="formLeft">Bảo hành:<span
                                                class="req">*</span></label>
                                    <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" id="param_name" name="warranty" required>
                                </span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formRow">
                                    <div class="formRow">
                                        <label for="param_name" class="formLeft">Chi nhánh:<span
                                                    class="req">*</span></label>
                                        <div class="formRight">

                                <span class="oneTwo" style="width: 100%">
                                    <h5>Danh sách các chi nhánh hiện có:</h5>
                                    <?php
                                    foreach ($ds as $row) {
                                        echo 'Mã ' . $row['id'] . ' - ' . $row['ten_chi_nhanh'], '<br>';
                                    }

                                    ?>
                                    <h6>Nhập mã chi nhánh có sản phẩm này:</h6>
                                    <i>(Nhập liền các mã chi nhánh)</i><br>
                                    <i>Ví dụ: 12</i><br>
                                    <input style="width: 50%" type="text" id="param_name" name="chinhanh"
                                           value="">
                                </span>
                                            <span class="autocheck" name="name_autocheck"></span>
                                            <div class="clear error" name="name_error"></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <label for="param_name" class="formLeft">Ngày sản xuất:<span
                                                class="req">*</span></label>
                                    <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" id="param_name" name="mfg" >
                                </span>
                                        <span class="autocheck" name="name_autocheck"></span>
                                        <div class="clear error" name="name_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formRow">
                                    <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                                    <div class="formRight">
                                        <div class="left">
                                            <input type="file" name="image" id="image" size="25" required>
                                        </div>
                                        <div class="clear error" name="image_error"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="formRow hide"></div>
                            </div>


                        </div><!-- End tab_container-->

                        <div class="formSubmit">
                            <button type="submit" class="redB">Thêm mới</button>

                        </div>
                        <div class="clear"></div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="clear mt30"></div>
    </div>
@endsection