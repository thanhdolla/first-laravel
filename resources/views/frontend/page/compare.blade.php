@extends('master')
@section('content')
    <style>
        table#cart_ccontents td {
            padding: 10px;
            border: 1px solid #ccc;
            margin: auto
        }
    </style>

    <style>
        [view=compare] {
            display: flex;
            flex-flow: column nowrap;
            align-items: center;
        }

        [view=compare] .main {
            display: flex;
            flex-flow: column;
            align-items: center;
            width: 1000px;
        }

        [view=compare] .main h1 {
            font-family: Lato;
            font-size: 24px;
        }

        [view=compare] .products {
            display: flex;
            justify-content: center;

            margin-bottom: 80px;
        }

        [view=compare] .product {
            flex: 1 1 auto;
            width: 50%;
        }

        [view=compare] .product:not(:last-child) {
            margin-right: 10px;
        }

        [view=compare] .product:not(:first-child) {
            margin-left: 10px;
        }

        [view=compare] .price-before {
            font-family: Arial;

            text-decoration: line-through;
        }

        [view=compare] .price {
            font-family: Arial;

            color: orange;
            font-size: 24px;
        }

        [view=compare] h2 {
            font-family: Lato;
            font-size: 18.75px;
        }

        [view=compare] image {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        [view=compare] .line {
            display: flex;
        }

        [view=compare] button {
            display: flex;
            align-items: center;

            border: none;
            outline: none;
        }

        [view=compare] button.delete-button {
            display: flex;
            height: 45px;

            align-items: center;
            padding-left: 20px;
            padding-right: 20px;

            font-family: Lato;
            font-size: 14px;

            margin-left: 10px;
        }

        [view=compare] p {
            font-family: Lato;
            font-size: 14px;
        }

        [view=compare] button.cart-button {
            font-family: Material Icons;
            font-size: 24px;

            display: flex;
            justify-content: center;
            align-items: center;

            width: 45px;
            height: 45px;

            background: orange;
            color: white;
        }

        [view=compare] button.cart-button:hover {
            background: white;
            color: orange;
        }

    </style>

    <div view="compare">
        <div class="main">

            <h1>So sánh sản phẩm</h1>
    
            @if(Session::has('flag'))
                <div class="alert alert-{{Session::get('flag')}}">
                    {{Session::get('message')}}
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
        
            <div class="products">
                <?php if(Session::get('compare_qty') > 0) : ?>
                    @foreach($cp as $row )
                        <?php $sanpham = $row['item']; ?>

                        <div class="product">
                            <h2>{{$sanpham->ten_sp}}</h2>
                            
                            <div class="image">
                                <a href="{{route('chitietsanpham',$sanpham->id)}}">
                                    <img
                                        src="upload/product/add/{{$sanpham->anh_sp}}"
                                        style="text-align:center;height:230px;width: 210px;"
                                        alt="{{$sanpham->ten_sp}}"
                                        width="100%"/>
                                </a>
                            </div>

                            <br>
                        
                            <?php $price_new = $sanpham->gia_sp - $sanpham->khuyen_mai ?>
                            <?php if ($sanpham->khuyen_mai > 0): ?>
                                <div class="price-before">
                                    <?php echo number_format($sanpham->gia_sp); ?>đ
                                </div>

                                <div class="price">
                                    <?php echo number_format($price_new) ?>đ
                                </div>
                            <?php else: ?>
                                <div class="price">
                                    <?php echo number_format($sanpham->gia_sp); ?>đ
                                </div>
                            <?php endif; ?>

                            <br><br>

                            <p>
                                <?php echo $sanpham->mo_ta_sp?>
                            </p>

                            <br>

                            <div class="line">
                                <a href="{{route('addcart',$sanpham->id)}}">
                                    <button class="cart-button">shopping_cart</button>
                                </a>
                                <a href="xoasanphamsosanh/{{$sanpham->id}}">
                                    <button class="delete-button">Xóa</button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                <?php else: ?>
                    <h4>Hiện chưa có sản phẩm nào để so sánh</h4>
                <?php endif; ?>
            </div>
        </div>
    </div>

@endsection

