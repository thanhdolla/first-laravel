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
                    <img src="source/backend/admin/images/icons/dark/dialog.png" class="titleIcon" />
                    <h6>

                        Danh mục loại sản phẩm
                    </h6>
                </div>

                <div class="line"></div>

                <div id="main_slide" class="wrapper">
                    <div class="widget">

                        <div class="title">
                            <div class="num f12">Số lượng: <b><?php echo count($cate)?></b></div>
                        </div>

                        <table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">

                            <thead>
                            <tr>
                                {{--<td style="width:21px;"><img src="source/backend/admin/images//icons/tableArrows.png"></td>--}}
                                <td style="width:60px;">Mã số</td>
                                <td>Loại sản phẩm</td>
                                <td style="width:200px;">Mô tả</td>
                                <td style="width:120px;">Hành động</td>
                            </tr>
                            </thead>



                            <tbody class="list_item">
                         <?php foreach ($cate as $row):?>
                            <tr class="row_<?php echo $row->id?>">

                                <td class="textC"><?php echo $row->id?></td>
                                <td class="textC"><?php echo $row->ten_loai_sp?></td>
                                <td class="textC"><?php echo $row->mo_ta?></td>
                                <td class="option textC">
                                    <a class="tipS" title="Chỉnh sửa" href="admin/category/edit/{{$row->id}}">
                                        <img src="source/backend/admin/images/icons/color/edit.png">
                                    </a>

                                    <a class="tipS verify_action" title="Xóa" href="admin/category/delete/{{$row->id}}" >
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