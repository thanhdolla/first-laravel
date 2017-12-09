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

                <tfoot class="auto_check_pages">
                <tr>
                    <td colspan="8">
                        <div class="list_action itemActions">
                            <a href="<?php ?>" class="button blueB"
                               onclick="return confirm('Bạn có chắc chắn xóa hết không?')">
                            </a>

                        </div>
                        <div class="pagination">

                        </div>
                    </td>
                </tr>
                </tfoot>

                <tbody class="list_item">
                <?php foreach ($dhct as $row):?>

                <tr class="row_<?php echo $row->id?>">

                    <td class="textC"><?php echo $row->id ?></td>
                    <td>
                        <div> {{Session::get('khach_hang')}}</div>
                    </td>
                    @foreach($sp as $sp1)
                        <td class="textC"><?php echo ($sp1->ten_sp) ?></td>
                    @endforeach
                    <td class="textC"><?php echo $row->so_luong ?></td>
                    <td class="textC"><?php echo $row->tinh_tien*$row->so_luong ?></td>
                    <td class="option" style="color:#000080;">
                        <?php
                        $a = $row->stt_don_hang;
                        if ($a == 0):
                            echo "<span style='color:#00d6b2;'>Chưa xử lí</span>";

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
        </div>
    </div>

@endsection

