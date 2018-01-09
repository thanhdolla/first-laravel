@extends('masteradmin')
@section('contentadmin')
    <!-- Right side -->
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

        <!-- Message -->

        <!-- Main content wrapper -->
        <div class="wrapper">
            <div class="widget">
                @if(Session::has('thongbao'))
                    <div class="alert alert-success" style="background:#00ced1">
                        {{Session::get('thongbao')}}
                    </div>
                @endif
                <div class="title">
                    <img src="source/backend/admin/images/icons/dark/dialog.png" class="titleIcon"/>
                    <h6>
                        Danh sách tin tức
                    </h6>
                </div>

                <div class="line"></div>

                <div id="main_tintuc" class="wrapper">
                    <div class="widget">

                        <div class="title">
                            <h6>
                                Danh sách tin tức
                            </h6>
                            <div class="num f12">Số lượng: <b><?php echo count($tintuc)?></b></div>
                        </div>

                        <table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">

                            <thead>
                            <tr>
                                <td style="width:5%;">Mã số</td>
                                <td style="width:20%;">Ảnh tintuc</td>
                                <td style="width:15%">Tiêu đề</td>
                                <td>Nội dung</td>
                                <td style="width:10%;">Hành động</td>
                            </tr>
                            </thead>

                            <tbody class="list_item">
                            <?php foreach ($tintuc as $row):?>
                            <tr class="row_<?php echo $row->id?>">

                                <td class="textC"><?php echo $row->id?></td>

                                <td>
                                    <div class="image_thumb">
                                        <img style="width: 250px;height: 150px;"
                                             src="upload/tintuc/add/{{$row->anh_tb}}">
                                        <div class="clear"></div>
                                    </div>
                                </td>
                                <td>
                                    <?php echo $row->tieu_de_tb?>
                                </td>
                                <td>
                                    <?php echo $row->noi_dung_tb?>
                                </td>

                                <td class="option textC">
                                    <a class="tipS" title="Chỉnh sửa" href="admin/tintuc/edit/{{$row->id}}">
                                        <img src="source/backend/admin/images/icons/color/edit.png">
                                    </a>
                                    <a class="tipS verify_action" title="Xóa" href="admin/tintuc/delete/{{$row->id}}">
                                        <i style="font-size: 20px;color:red" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
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