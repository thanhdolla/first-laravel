@extends('masteradmin')
@section('contentadmin')
    <div id="rightSide">
        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Bình Luận</h5>
                    <span>Quản lý bình luận</span>
                </div>


                <div class="clear"></div>
            </div>
        </div>
        <div class="line"></div>

        <div class="wrapper">
            <div class="widget">
                <div class="title">
                    <!--<span class="titleIcon"><div class="checker" id="uniform-titleCheck"><span><input type="checkbox" id="titleCheck" name="titleCheck" style="opacity: 0;"></span></div></span>-->
                    <h6>Danh sách các bình luận</h6>
                    <div class="num f12">Tổng số: <b>{{count($list)}}</b></div>
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
                        <td style="width:10%;">Mã khách hàng</td>
                        <td style="width:20%;">Nội dung bình luận</td>
                        <td style="width:20%;">Ngày</td>
                        <td style="width:10%;">Hành động</td>
                    </tr>
                    </thead>



                    <tbody class="list_item">
                    <?php foreach ($list as $row):?>
                    <tr class="row_<?php echo $row->id?>">

                        <td class="textC"><?php echo $row->id ?></td>
                        <td>
                            <div style="text-align:center"><?php echo $row->khach_hangID ?></div>
                        </td>
                        <td class="textC"><?php echo $row->noi_dung ?></td>



                        <td class="textC">{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                        <td class="textC">
                            <a href="admin/binhluan/delete/{{$row->id}}"
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
