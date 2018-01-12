@extends('masteradmin')
@section('contentadmin')
    <!-- Right side -->
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
                                <img src="source/backend/admin/images/icons/control/16/add.png" />
                                <span>Thêm mới</span>
                            </a></li>

                        <li><a href="{{route('admin/nhanvien/index')}}">
                                <img src="source/backend/admin/images/icons/control/16/list.png" />
                                <span>Danh sách</span>
                            </a></li>
                    </ul>
                </div>

                <div class="clear"></div>
            </div>
        </div>
        <div class="line"></div>

        <!-- Message -->
        <!-- Main content wrapper -->
        <div class="wrapper">
            <div class="widget">
                @if(Session::has('thongbao'))
                    <div class="alert alert-success" style="background:#00ced1">
                        {{Session::get('thongbao')}}
                    </div>
                @endif @if(Session::has('loi'))
                        <div class="alert alert-danger" style="background:red">
                            {{Session::get('loi')}}
                        </div>
                @endif
                <div class="title">
                    <img src="source/backend/admin/images/icons/dark/dialog.png" class="titleIcon" />
                    <h6>
                        Danh sách nhân viên
                    </h6>
                </div>

                <div class="line"></div>

                <div id="main_slide" class="wrapper">
                    <div class="widget">

                        <div class="title">
                            <h6>
                                Danh sách nhân viên
                            </h6>
                            <div class="num f12">Số lượng: <b><?php echo count($nhanvien)?></b></div>
                        </div>

                        <table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">

                            <thead>
                            <tr>
                                {{--<td style="width:21px;"><img src="source/backend/admin/images//icons/tableArrows.png"></td>--}}
                                <td style="width:60px;">Mã số</td>
                                <td>Họ tên </td>
                                <td style="width:200px;">Email</td>
                                <td style="">Số điện thoại</td>
                                <td style="width:120px;">Hành động</td>

                            </tr>
                            </thead>

                            <tbody class="list_item">
                            <?php foreach ($nhanvien as $row):?>
                            <tr class="row_<?php echo $row->id?>">
                                <td class ="text">
                                    <?php if($row->id==1):?>
                                    <span style="color:red"><?php echo $row->id; ?></span>
                                    <?php  else :{echo $row->id;}endif; ?>
                                </td>
                                <td class ="text">
                                    <?php if($row->id==1):?>
                                    <span style="color:red"><?php echo $row->ten_ad; ?></span>
                                <?php  else :{echo $row->ten_ad;}endif; ?>

                                <td class ="text">
                                    <?php if($row->id==1):?>
                                    <span style="color:red"><?php echo $row->email_ad; ?></span>
                                    <?php  else :{echo $row->email_ad;}endif; ?>
                                </td>
                                <td class ="text">
                                    <?php if($row->id==1):?>
                                    <span style="color:red"> <?php echo '0'.$row->sdt_ad; ?></span>
                                    <?php  else :{echo '0'.$row->sdt_ad;}endif; ?>
                                </td>

                                <td class="option textC">
                                    <a class="tipS" title="Chỉnh sửa" href="admin/nhanvien/edit/{{$row->id}}">
                                        <img src="source/backend/admin/images/icons/color/edit.png">
                                    </a>
                                    <?php if($row->id !=1): ?>
                                    <a class="tipS verify_action" title="Xóa" href="admin/nhanvien/delete/{{$row->id}}" >
                                        <i style="font-size: 20px;color:red" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <?php else:?>
                                <?php echo " "; endif;?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>

                        </table>
                    </div>

                </div>

            </div>
        </div>
        <div class="clear mt30"></div>
    </div>
@endsection