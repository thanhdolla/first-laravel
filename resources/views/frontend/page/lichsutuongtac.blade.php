@extends('master')
@section('content')

    <div class="box-center" style="width:90%;margin:auto;margin-bottom: 200px;"><!-- The box-center product-->
        <div class="tittle-box-center" style="margin-top:50px;">
            <h2>Lịch sử giỏ hàng </h2>
        </div>
        <hr>

        <div class="box-content-center product"><!-- The box-content-center -->
        </div>
        <?php if (count($dhct) > 0): ?>

        @if(Session::has('thongbao'))
            <div class="alert alert-success" style="background:#00ced1">
                {{Session::get('thongbao')}}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
            <tr>
                <td style="width:10%;">Mã</td>
                <td style="width:20%;">Tên khách hàng</td>
                <td style="width:20%;">Tên sản phẩm</td>
                <td style="width:12%;">Số lượng</td>
                <td style="width:15%;">Giá</td>
                <td style="width:12%;">Tình trạng</td>
                <td style="width:20%;">Ngày đặt hàng</td>
            </tr>
            </thead>

            <tbody class="list_item">
            <?php foreach ($dhct as $row):?>

            <tr class="row_<?php echo $row->id?>">

                <td class="textC"><?php echo $row->id ?></td>
                <td>
                    <div> {{Session::get('khach_hang')}}</div>
                </td>
                @foreach($sp as $sp1)
                    <td class="textC"><?php echo($sp1->ten_sp) ?></td>
                @endforeach
                <td class="textC"><?php echo $row->so_luong ?></td>
                <td class="textC"><?php echo $row->tinh_tien * $row->so_luong ?></td>
                <td class="option" style="color:#000080;">
                    <?php
                    $a = $row->stt_don_hang;
                    if ($a == 0):
                        echo "<span style='color:red;'>Chưa xử lí</span>";

                    elseif ($a == 1) :
                        echo "<span style='color:#00d6b2;'>Đã xử lí</span>";
                    endif;
                    ?>
                </td>
                <td class="textC">{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <?php else: ?>
        <h4>Hiện chưa có đơn hàng nào</h4>
        {{--</form>--}}
        <?php endif; ?>
        <div class="space60">&nbsp;</div>

        <hr><hr>

        <div class="tittle-box-center" style="margin-top:50px;">
            <h2>Lịch sử phản hồi </h2>
        </div>
       <hr>
        <?php if (count($ph) > 0): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <td style="width:20%;">Tên khách hàng</td>
                <td style="width:20%;">Tiêu đề</td>
                <td style="width:20%;">Nội dung phản hồi</td>
                <td style="width:20%;">Tình trạng</td>
                <td style="width:20%;">Ngày gửi</td>
            </tr>
            </thead>

            <tbody class="list_item">
            <?php foreach ($ph as $row):?>
            <tr class="row_<?php echo $row->id?>">
                <td>
                    <div> {{Session::get('khach_hang')}}</div>
                </td>
                <td class="textC"><?php echo $row->tieu_de ?></td>
                <td class="textC"><?php echo $row->noi_dung ?></td>
                <td class="option" style="color:#000080;">
                    <?php
                    $a = $row->stt_phan_hoi;
                    if ($a == 0):
                        echo "<span style='color:red;'>Chưa xử lí</span>";
                    elseif ($a == 1) :
                        echo "<span style='color:#00d6b2;'>Đã xử lí</span>";
                    endif;
                    ?>
                </td>
                <td class="textC">{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
            </tr>
            <?php endforeach;?>
            </tbody>

        </table>

        <?php else: ?>
        <h4>Hiện chưa có phản hồi nào</h4>
        {{--</form>--}}
        <?php endif; ?>
    </div>
@endsection

