@extends('master')
@section('content')

    <style>
        .outer-wrapper {
            width: 100%;

            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
        }

        .outer-wrapper > .right {
            margin-left: 40px;
            width: 400px;
        }
        
        [view=search] {
            display: flex;
            flex-flow: column nowrap;
            align-items: stretch;

            width: 800px;
        }

        [view=search] h2 {
            font-family: Lato;
            font-size: 24px;
        }

        [view=search] p {
            font-family: Lato;
            font-size: 14px;
        }

        [view=search] .products {
            display: flex;
            flex-flow: row wrap;
            justify-content: space-between;

            margin-top: 20px;
            margin-bottom: 20px;
        }

        [view=search] .products .product {
            display: flex;
            flex-flow: column nowrap;
            align-items: center;
            justify-content: space-between;

            position: relative;
            width: 196px;
            height: 335px;

            margin-bottom: 30px;
        }

        [view=search] .products .product .card {
            position: relative;

            width: 100%;
            height: 300px;
            margin-bottom: 10px;

            border-radius: 3px;
            /* border: 1px solid #eee; */

            overflow: hidden;
        }

        [view=search] .products .product img {
            border-radius: 3px 3px 0 0;
            object-fit: cover;
        }

        [view=search] .products .product .overlay {
            position: absolute;

            top: 200px;
            left: 0px;
            right: 0px;

            height: 89px;

            padding: 5px 10px;
            transition: 1s;
            background: white;
        }

        [view=search] .products .product:hover .overlay {
            position: absolute;
            top: 0px;
            height: 100%;

            padding: 5px 10px;

            cursor: pointer;
        }
            
        [view=search] .products .product .cart-icon {
            display: flex;
            position: absolute;
            top: 180px;
            right: 15px;

            justify-content: center;
            align-items: center;

            height: 40px;
            width: 40px;

            font-family: Material Icons;
            font-size: 18px;

            background: dodgerblue;
            color: white;
            border: none;
            outline: none;

            box-shadow: 0 5px 8px rgba(0, 0, 0, 0.1);
            border-radius: 50%;
        }

        [view=search] .products .product h3 {
            font-family: Lato;
            font-size: 14px;
        }

        [view=search] .products .product .price {
            font-family: Lato;
            font-size: 18.75px;

            color: orange;
        }

        [view=search] .products .product .price-before {
            font-family: Lato;
            font-size: 12px;

            text-decoration: line-through;
        }
        
        [view=search] .products .product .no-discount {
            font-family: Lato;
            font-size: 12px;
        }

        [view=search] .products .compare {
            border: none;
            outline: none;        

            padding: 5px 20px;

            border-radius: 0px;

            font-family: Lato;
            font-size: 14px;
            background: none;
        }
    </style>
    
    <style>
    [view=sidebar] {
        margin-bottom: 20px;
    }

    [view=sidebar] h2 {
        font-family: Lato;
        font-size: 24px;
    }

    [view=sidebar] input {
        padding: 5px;
        border: none;
        outline: none;
    }

    [view=sidebar] .input .bottom-line {
        display: flex;
        justify-content: center;

        width: 100%;
        height: 2px;
        background: #eee;
    }

    
    [view=sidebar] .input .bottom-line::after {
        content: '';
        height: 100%;
        width: 0px;
        background: black;
    }

    [view=sidebar] .input.focus .bottom-line::after {
        width: 100%;
    }

    [view=sidebar] .input .bottom-line::after {
        transition: 0.5s;
    }

    [view=sidebar] .input input {
        width: 100%;
        font-size: 14px !important;
        padding: 0px;
        margin: 0px;
    }

    [view=sidebar] input {
        padding: 8px !important;
    }

    [view=sidebar] .input {
        margin-bottom: 8px;
    }

    [view=sidebar] button {
        padding: 5px 20px;
        font-size: 14px !important;
        background: orange;
        color: white;
        border: none;
        outline: none;

        margin-top: 20px;
    }

    [view=sidebar] ul li {
        font-family: Lato;
        font-size: 14px;
    }

    [view=sidebar] .news .info p {
        font-family: Lato;
        font-size: 14px;
    }
    </style>

    <div class="outer-wrapper">
        <div class="left">
            <div view="search">
                <h2>Sản phẩm tìm kiếm</h2>

                <div class="line">
                    <p>Tìm thấy {{count($product)}} kết quả</p>
                </div>

                <div class="products">
                    @foreach($product as $new)
                        <div class="product">
                            <div class="card">
                                <a href="{{route('chitietsanpham',$new->id)}}">
                                    <img src="upload/product/add/{{$new->anh_sp}}" width="100%" height="200px">
                                    
                                    <div class="overlay">
                                        <?php $price_new = $new-> gia_sp - $new->khuyen_mai?>
                                        <h3>{{$new->ten_sp}}</h3>
                                        
                                        <?php if ($new->khuyen_mai > 0): ?>
                                        <p class="price-before">
                                            <?php echo number_format($new->gia_sp); ?>đ
                                        </p>
                                        
                                        <p class="price">
                                            <?php echo number_format($price_new) ?>đ
                                        </p>
                                        <?php else: ?>
                                        <p class="no-discount">
                                            Chưa có khuyến mãi
                                        </p>
                                        
                                        <p class="price">
                                            <?php echo number_format($new->gia_sp); ?>đ
                                        </p>
                                        <?php endif; ?>
                                    </div>
                                </a>
                                    
                                <a href="{{route('addcart',$new->id)}}">
                                    <button class="cart-icon">
                                        shopping_cart
                                    </button>
                                </a>
                            </div>

                            <a href="addtocompare/{{$new->id}}">
                                <button class="compare">
                                    Chọn so sánh
                                </button>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="right">
            <div view="sidebar">
            <h2>Loại sản phẩm</h2>

            <br/>

            <ul>
                @foreach($loai_sp4 as $loai)
                    <a href="{{route('loai-san-pham',$loai->id)}}">
                    <li><?php echo $loai->ten_loai_sp ?></li>
                    </a>
                @endforeach
            </ul>
            </div>
        </div>
    </div>
@endsection