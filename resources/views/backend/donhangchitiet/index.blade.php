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
                    <h6>Danh sách Giao dịch</h6>
                    <div class="num f12">Tổng số: <b><?php ?></b></div>
                </div>
                @if(Session::has('thongbao'))
                    <div class="alert alert-success" style="background:#00ced1">
                        {{Session::get('thongbao')}}
                    </div>
                @endif

                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                    <thead>
                    <tr>
                        <td style="width:10%;">Mã số</td>
                        <td style="width:15%;">Mã đơn hàng</td>
                        <td style="width:15%;">Mã sản phẩm</td>
                        <td style="width:20%;">Giá</td>
                        <td style="width:10%;">Số lượng</td>
                        <td style="width:20%;">Tình trạng</td>
                        <td style="width:10%;">Hành động</td>
                    </tr>
                    </thead>

                    <tfoot class="auto_check_pages">
                    <tr>
                        <td colspan="8">

                            <div class="pagination">

                            </div>
                        </td>
                    </tr>
                    </tfoot>

                    <tbody class="list_item">
                    @foreach ($list as $row)
                    <tr class="row">

                        <td class="textC">{{$row->id}}</td>
                        <td>
                            <div style="text-align:center">{{$row->don_hangID}}</div>
                        </td>
                        <td class="textC" style="text-align:center">{{$row->san_phamID}}</td>
                        <td class="textC" style="text-align:center">{{number_format($row->tinh_tien)}}</td>
                        <td class="textC" style="text-align:center">{{$row->so_luong}}</td>
                        <td class="textC" style="text-align:center">
                            <?php
                            $a = $row->stt_don_hang_chi_tiet;
                            if ($a == 0):
                                echo "<span style='color:red;'>Chưa xử lí</span>";
                            elseif ($a == 1) :
                                echo "<span style='color:#00d6b2;'>Đã xử lí</span>";
                            endif;
                            ?>
                        </td>
                        <td class = "textC">
                            <a href="admin/donhangchitiet/delete/{{$row->id}}"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                <img src="source/backend/admin/images/icons/color/delete.png">
                            </a>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection