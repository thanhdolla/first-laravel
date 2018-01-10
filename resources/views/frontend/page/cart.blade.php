@extends('master')
@section('content')

    <style>
        table#cart_ccontents td {
            padding: 10px;
            border: 1px solid #ccc;
            margin: auto
        }
    </style>
{{--<script>--}}
    {{--$(document).ready(function(){--}}
        {{--$(".updatecart").click(function(){--}}
            {{--alert("dsfds");--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}

    <div class="box-center" style="width:90%;margin:auto;margin-bottom: 200px;"><!-- The box-center product-->
      @if(Session::has('flag'))
                        <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}

                        </div>
                    @endif
                    @if(Session::has('thongbao'))
                        <div class="alert alert-success" style="background:#00ced1;font-size:16px;color:black">
                            {{Session::get('thongbao')}}
                        </div>
                    @endif
                    @if(Session::has('loi'))
                        <div class="alert alert-danger" style="background:Red; color:black;font-size:16px;">
                            {{Session::get('loi')}}
                        </div>
                    @endif
        <div class="tittle-box-center" style="margin-top:50px;">
            <h2>Thông tin giỏ hàng ({{$count}} sản phẩm)</h2>
        </div>
        <hr>

        <div class="box-content-center product"><!-- The box-content-center -->
            <?php if ($count > 0): ?>

            <table id="cart_ccontents" style="width:80%;margin:auto;">
                <thead style="text-align:center;color: red;padding-left: 5px;">
                <th style="text-align:center;">Sản phẩm</th>
                <th style="text-align:center;">Giá</th>
                <th style="text-align:center;">Số lượng</th>
                <th style="text-align:center;">Tổng tiền</th>
                <th style="text-align:center;">Xóa</th>
                </thead>

                <form method="post" action="{{route('updatecart')}}">
                    <input name="_token" type="hidden" value="{{csrf_token()}}"/>

                @foreach($cart as $row )
                    <tr>
                        <td style="width:25%;">
                            <div style="text-align:center; ">
                                <?php echo $row->name; ?>
                            </div>
                        </td>
                        <td>
                            <div style="text-align:center ">
                                <?php echo number_format($row->price); ?>đ
                            </div>
                   
                        <td>
                            <a><input name="<?php echo $row->rowId ?>" type="number" value="<?php echo $row->qty; ?>" size="2"/></a>
                        </td>
                        </td>
                        <td>
                            <div style="text-align:center ">
                                <?php echo number_format(($row->price) * $row->qty); ?>đ
                            </div>
                        </td>

                        <td>
                            <div style="text-align:center ">
                                <a href="{{route('removecart',['id'=>$row->rowId ])}}">Xóa</a>
                            </div>
                        </td>
                    </tr>

                @endforeach

                <tr>

                    <td colspan="5" style="padding-left:20%;">
                        Thành tiền: <b style="padding-right: 40%;color:red"><?php echo($total)?>đ</b>
                        <a style="width:30px;color: black;" href="{{route('removeallcart')}}">
                            <input class="btn btn-danger" type="button" value="Xóa tất cả">
                        </a>

                    </td>
                </tr>

                <tr>

                    <td class="pull" colspan="5" style="padding-left:2%;">
                        <a class="pull-left" style="" id="{{ $row->rowId }}" class="updatecart">
                            <button class="btn btn-success" type="submit" >Cập nhật</button>
                        </a>

                        <a  style="margin-left:75%;width:30px;color: black;" href="<?php echo route('dathang') ?>">
                            <input class="btn btn-success" type="button" value="Đặt hàng">
                        </a>

                    </td>

                </tr>
                </tbody>
                </form>
            </table>
            {{--</form>--}}
            <?php else: ?>
            <h4>Hiện chưa có sản phẩm nào trong giỏ hàng</h4>
            {{--</form>--}}
            <?php endif; ?>
        </div>
    </div>

@endsection

