@extends('master')
@section('content')
    <style>
        [view=cart] {
            display: flex;
            flex-flow: column nowrap;
            align-items: center;
        }

        [view=cart] .main {
            width: 1000px;
        }

        [view=cart] h1 {
            font-family: Lato;
            font-size: 24px;
        }

        [view=cart] p {
            font-family: Arial;
            font-size: 14px;
        }

        [view=cart] table {
            width: 100%;
        }

        [view=cart] th,
        [view=cart] td {
            text-align: center;
            border: 1px solid #eee;

            font-family: Arial;
            font-size: 14px;
        }

        [view=cart] td input {
            width: 100%;
            height: 100%;

            text-align: center;
            border: none;
            outline: none;
        }

        [view=cart] .actions {
            margin-top: 20px;

            display: flex;
            justify-content: flex-end;
        }

        [view=cart] .actions button {
            display: flex;
            align-items: stretch;

            outline: none;
            border: none;

            background: none;

            color: white;
        }

        [view=cart] .actions button .icon {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 45px;
            height: 45px;

            font-family: Material Icons;
            font-size: 24px;

            background: orange;
        }

        [view=cart] .actions button .text {
            display: flex;
            align-items: center;

            font-family: Lato;
            font-size: 14px;

            padding-left: 20px;
            padding-right: 20px;

            background: orange;
        }

        [view=cart] .actions button .text:hover {
            background: white;
            color: orange;
        }
    </style>

    <div view="cart">
        <div class="main">
            <h1>Giỏ hàng</h1>

            <p>Trong giỏ hàng có {{$count}} sản phẩm</p>

            <br>

            <table id="cart">
                <thead>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Xóa</th>
                </thead>

                <tbody>
                        @foreach($cart as $row)
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
                            </td>
                            <td>
                                <input name="<?php echo $row->rowId ?>" class="product-quantity" type="number" value="<?php echo $row->qty; ?>" size="2" onchange="update_cart(event)"/>
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
                            <td colspan="4">
                                Thành tiền: <b><?php echo($total)?>đ</b>
                            </td>
                            <td colspan="1">
                                <a href="{{route('removeallcart')}}">
                                    Xoá tất cả
                                </a>
                            </td>
                        </tr>
                </tbody>
            </table>
            
            <div class="actions">
                <a href="<?php echo route('dathang') ?>">
                    <button>
                        <div class="icon">local_shipping</div>
                        <div class="text">Đặt hàng</div>
                    </button>
                </a>
            </div>
        </div>
    </div>

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
    </div>

    <script>
        function update_cart(e) {
            var url = "{{route('updatecart')}}"
            var csrf_token = "{{csrf_token()}}"

            var table = document.getElementById('cart')
            var inputs = table.querySelectorAll('.product-quantity')


            var formData = new FormData()
            formData.append('_token', csrf_token)

            inputs.forEach(function (input) {
                formData.append(input.name, input.value)
            })

            var request = new XMLHttpRequest();
            request.open("POST", url);
            request.send(formData);
        }
    </script>

@endsection

