@extends('masteradmin')
@section('contentadmin')
    <!-- Right side -->
    <div id="rightSide">


        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Khách Hàng</h5>
                    <span>Quản lý khách hàng</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>
                        <li><a href="{{route('admin/khachhang/index')}}">
                                <img src="source/backend/admin/images/icons/control/16/list.png"/>
                                <span>Danh sách</span>
                            </a>
                        </li>
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
                            <div class="num f12">Số lượng: <b><?php echo count($khachhang)?></b></div>
                        </div>
                        <table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
                            <thead class="filter">
                            <tr>
                                <td colspan="7">
                                    <form class="list_filter form" action="{{route('admin/khachhang/index')}}" method="get">
                                        <table cellpadding="0" cellspacing="0" width="80%"><tbody>
                                            <tr>
                                                <td class="label" style="width:60px;"><label>Tên khách hàng</label></td>
                                                <td class="item" style="width:155px;" ><input name="searchname" value=""  type="text" style="width:155px;" /></td>
                                                <td style='width:150px'>
                                                    <button type="submit" class="btn btn-success" >Search</button>
                                                </td>
                                            </tr>
                                            </tbody></table>
                                    </form>
                                </td>

                            </thead>
                            <thead>
                            <tr>
                                {{--<td style="width:21px;"><img src="source/backend/admin/images//icons/tableArrows.png"></td>--}}
                                <td style="width:10%;">Mã số</td>
                                <td>Họ tên</td>
                                <td>Mật khẩu</td>
                                <td style="">Email</td>
                                <td style="">Số điện thoại</td>
                                <td style="">Ngày tạo</td>
                                <td style="">Hành động</td>
                            </tr>
                            </thead>

                            <tbody class="list_item">
                            <?php foreach ($khachhang as $row):?>
                            <tr class="row_<?php echo $row->id?>">
                                <td class="textC"><?php echo $row->id?></td>
                                <td class="textC"><?php echo $row->ten_kh?></td>
                                <td class="textC"><?php echo $row->mk_kh?></td>
                                <td class="textC"><?php echo $row->email_kh?></td>
                                <td class="textC"><?php echo '0'.$row->sdt_kh?></td>
                                <td class="textC">{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                <td class="option textC">
                                    <a class="tipS verify_action" title="Xóa"
                                       href="admin/khachhang/delete/{{$row->id}}">
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