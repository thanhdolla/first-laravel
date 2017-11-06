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

                <form method="post" action="">
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
                        {{--</td>--}}
                        {{--<td class="cart_quantity" style="width:100px">--}}
                            {{--<div style="text-align:center ">--}}
                                {{--<a class="cart_quantity_up" href="{{url("cart?id=$row->id&increment=1")}}"> + </a>--}}
                            {{--</div>--}}
                            {{--<div style="text-align:center ">--}}
                                {{--<input class="cart_quantity_input" style="width:40px;" type="text" name="quantity"--}}
                                       {{--value="{{$row->qty}}" autocomplete="off" size="2">--}}
                            {{--</div>--}}
                            {{--<div style="text-align:center ">--}}
                                {{--<a class="cart_quantity_down" href="{{url("cart?id=$row->id&decrease=1")}}"> - </a>--}}
                            {{--</div>--}}

                        {{--</td>--}}
                        {{--<td>--}}
                        <td>
                            <input name="qty_cart" value="<?php echo $row->qty; ?>" size="2"/>
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



                    <td colspan="5" style="padding-left:2%;">
                        <a style="" id="{{ $row->rowId }}" href="<?php echo route('updatecart') ?>" class="updatecart">
                            <input class="btn btn-success" type="button" value="Update">
                        </a>

                        <a style=" margin-left:80%;width:30px;color: black;" href="<?php echo route('dathang') ?>">
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

