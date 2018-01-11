@extends("master")
@section("content")
    <style>
        .outer-wrapper {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
        }

        .outer-wrapper > .right {
            margin-left: 40px;
        }
    </style>
    
    <style>
        [view=dashboard] {
            display: flex;
            flex-flow: column nowrap;
            align-items: stretch;

            width: 800px;
        }

        [view=dashboard] .line h2 {
            font-family: Lato;
            font-size: 24px;
        }

        [view=dashboard] .line p {
            font-family: Lato;
            font-size: 14px;
        }

        [view=dashboard] .products {
            display: flex;
            flex-flow: row wrap;
            justify-content: space-between;

            margin-top: 20px;
            margin-bottom: 20px;
        }

        [view=dashboard] .products .product {
            display: flex;
            flex-flow: column nowrap;
            align-items: center;
            justify-content: space-between;

            position: relative;
            width: 196px;
            height: 335px;

            margin-bottom: 30px;
        }

        [view=dashboard] .products .product .card {
            position: relative;

            width: 100%;
            height: 300px;
            margin-bottom: 10px;

            border-radius: 3px;
            /* border: 1px solid #eee; */

            overflow: hidden;
        }

        [view=dashboard] .products .product img {
            border-radius: 3px 3px 0 0;
            object-fit: cover;
        }

        [view=dashboard] .products .product .overlay {
            position: absolute;

            top: 200px;
            left: 0px;
            right: 0px;

            height: 89px;

            padding: 5px 10px;
            transition: 1s;
            background: white;
        }

        [view=dashboard] .products .product:hover .overlay {
            position: absolute;
            top: 0px;
            height: 100%;

            padding: 5px 10px;

            cursor: pointer;
        }
            
        [view=dashboard] .products .product .cart-icon {
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

        [view=dashboard] .products .product h3 {
            font-family: Lato;
            font-size: 14px;
        }

        [view=dashboard] .products .product .price {
            font-family: Lato;
            font-size: 18.75px;

            color: orange;
        }

        [view=dashboard] .products .product .price-before {
            font-family: Lato;
            font-size: 12px;

            text-decoration: line-through;
        }
        
        [view=dashboard] .products .product .no-discount {
            font-family: Lato;
            font-size: 12px;
        }

        [view=dashboard] .products .compare {
            border: none;
            outline: none;        

            padding: 5px 20px;

            border-radius: 0px;

            font-family: Lato;
            font-size: 14px;
            background: none;
        }
    </style>

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

    <div class="outer-wrapper">
        <div class="left">
            <div view="dashboard">
                <div class="line">
                    <h2>Sản phẩm {{$loai_sp->ten_loai_sp}}</h2>
                </div>

                <div class="line">
                    <p>Tìm thấy {{count($sp)}} kết quả</p>
                </div>

                <div class="products">
                    @foreach($sp as $new)
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

                @if(count($sp) > 0)
                    <div style="text-align:center">
                        <?php echo $sp->links()?>
                    </div>
                @endif

                <div view="dashboard">
                    <div class="line">
                        <h2>Sản phẩm khuyến mại</h2>
                    </div>

                    <div class="line">
                        <p>Tìm thấy {{count($km)}} kết quả</p>
                    </div>

                    <div class="products">
                        @foreach($km as $item)
                            <div class="product">
                                <div class="card">
                                    <a href="{{route('chitietsanpham',$item->id)}}">
                                        <img src="upload/product/add/{{$item->anh_sp}}" width="100%" height="200px">
                                        
                                        <div class="overlay">
                                            <?php $price_new = $item-> gia_sp - $item->khuyen_mai?>
                                            <h3>{{$item->ten_sp}}</h3>
                                            
                                            <?php if ($item->khuyen_mai > 0): ?>
                                            <p class="price-before">
                                                <?php echo number_format($item->gia_sp); ?>đ
                                            </p>
                                            
                                            <p class="price">
                                                <?php echo number_format($price_new) ?>đ
                                            </p>
                                            <?php else: ?>
                                            <p class="no-discount">
                                                Chưa có khuyến mãi
                                            </p>
                                            
                                            <p class="price">
                                                <?php echo number_format($item->gia_sp); ?>đ
                                            </p>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                    
                                    <a href="{{route('addcart',$item->id)}}">
                                        <button class="cart-icon">
                                            shopping_cart
                                        </button>
                                    </a>
                                </div>

                                <a href="addtocompare/{{$item->id}}">
                                    <button class="compare">
                                        Chọn so sánh
                                    </button>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    @if(count($km) >0)
                        <div style="text-align:center"><?php echo $km->links()?></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="right">
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

            <div view="sidebar">
                <h2>Tìm theo giá</h2>

                <form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
                    <div class="input">
                        <input type="text" name="gianho" placeholder="Từ">
                        <div class="bottom-line"></div>
                    </div>

                    <div class="input">
                        <input type="text" name="gialon" placeholder="Đến">
                        <div class="bottom-line"></div>
                    </div>

                    <button type="submit">Tìm kiếm</button>
                </form>
            </div>

            <script>
                document.querySelectorAll('[view=sidebar] input').forEach(function (el) {
                    el.addEventListener('focus', function () {
                        el.parentElement.classList.add('focus')
                    })

                    el.addEventListener('blur', function () {
                        el.parentElement.classList.remove('focus')
                    })
                })
            </script>
        </div>
    </div>
    
@endsection