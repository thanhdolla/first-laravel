@extends('masteradmin')
@section('contentadmin')

    <div id="rightSide">
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Đơn hàng</h5>
                    <span>Quản lý đơn hàng</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>
                        <li><a href="{{route('admin/slide/add')}}">
                                <img src="source/backend/admin/images/icons/control/16/add.png"/>
                                <span>Thêm mới</span>
                            </a></li>

                        <li><a href="{{route('admin/slide/index')}}">
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
            <div class="widget">
                <div class="title">
                    <!--<span class="titleIcon"><div class="checker" id="uniform-titleCheck"><span><input type="checkbox" id="titleCheck" name="titleCheck" style="opacity: 0;"></span></div></span>-->
                    <h6>Danh sách Giao dịch</h6>
                    <div class="num f12">Tổng số: <b><?php echo count($list) ?></b></div>
                </div>
                @if(Session::has('thongbao'))
                    <div class="alert alert-success" style="background:#00ced1">
                        {{Session::get('thongbao')}}
                    </div>
                @endif

                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">

                    <thead class="filter">
                    <tr>
                        <td colspan="7">
                            <form class="list_filter form" action="{{route('admin/donhang/index')}}" method="get">
                                <table cellpadding="0" cellspacing="0" width="100%"><tbody>

                                    <tr>
                                        <td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
                                        <td class="item"><input name="searchid" value="" type="text" style="width:55px;" /></td>

                                        <td class="label" style="width:40px;"><label>Tên khách hàng</label></td>
                                        <td class="item" style="width:155px;" ><input name="searchname" value=""  type="text" style="width:155px;" /></td>

                                        <td style='width:150px'>
                                            <button type="submit" class="btn btn-success" >Search</button>
                                        </td>

                                    </tr>
                                    </tbody></table>
                            </form>
                        </td></tr>
                    </thead>

                    <thead>
                    <tr>
                        <td style="width:5%;">Mã số</td>
                        <td style="width:10%;">Mã khách hàng</td>
                        <td style="width:20%;">Tên khách hàng</td>
                        <td style="width:10%;">Tổng tiền</td>
                        <td style="width:20%;">Trạng thái</td>
                        <td style="width:20%;">Ngày tạo</td>
                        <td style="width:15%;">Hành động</td>
                    </tr>
                    </thead>

                    <tbody class="list_item">
                    <?php foreach ($list as $row):?>
                    <tr class="row_<?php echo $row->id?>">

                        <td class="textC"><?php echo $row->id ?></td>
                        <td>
                            <div style="text-align:center"><?php echo $row->khach_hangID ?></div>
                        </td>
                        <td class="textC"><?php echo $row->ten ?></td>
                        <td class="textC" style="text-align:center"><?php echo number_format($row->thanh_toan) ?></td>
                        <td class="option" style="color:#000080;">
                            <?php
                            $a = $row->stt_don_hang;
                            if ($a == 0):
                            ?>

                            <a href="admin/donhang/xuli/{{$row->id}}">
                                <button class="btn btn-success" type="button">Xử lí ngay</button>
                            </a>
                            <?php
                            elseif ($a == 1) :
                                echo "<span style='color:#00d6b2;'>Đã xử lí</span>";
                            endif;
                            ?>

                        </td>

                        <td class="textC">{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                        <td class="textC">
                            <a href="admin/donhang/chitietdonhang/{{$row->id}}" ><i class="fa fa-eye" aria-hidden="true" style="font-size: 20px;"></i></a> |
                            <a href="admin/donhang/delete/{{$row->id}}"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
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
@endsection