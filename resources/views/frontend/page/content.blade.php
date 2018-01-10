@extends('master')
@section('content')

    <style>
        [view=dashboard] {
            display: flex;
            flex-flow: column nowrap;
            align-items: center;

            padding-left: 80px;
            padding-right: 80px;
            padding-top: 20px;
            
            background: #eeeeee;
        }

        [view=dashboard] .line {
            width: 1000px;
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

            width: 1000px;

            margin-top: 20px;
            margin-bottom: 20px;
        }

        [view=dashboard] .products .product {
            width: 196px;
            height: 300px;

            margin-bottom: 10px;

            border-radius: 3px;
            overflow: hidden;

            background: white;
        }

        [view=dashboard] .products .product:not(:nth-child(4n+1)) {
            margin-left: 20px;
        }

        [view=dashboard] .products .product img {
            object-fit: cover;
        }

        [view=dashboard] .products .product .overlay {
            position: relative;

            padding: 5px 10px;
        }
            
        [view=dashboard] .products .product .cart-icon {
            display: flex;
            position: absolute;
            top: -20px;
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
    </style>

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

    <div view="dashboard">
        <div class="line">
            <h2>Sản phẩm mới</h2>
        </div>

        <div class="line">
            <p>Tìm thấy {{count($newpr)}} kết quả</p>
        </div>

        <div class="products">
            @foreach($newpr as $new)
                <div class="product">
                    <a href="{{route('chitietsanpham',$new->id)}}">
                        <img src="upload/product/add/{{$new->anh_sp}}" width="100%" height="200px">
                    </a>

                    <div class="overlay">
                        <a href="{{route('addcart',$new->id)}}">
                            <button class="cart-icon">
                                shopping_cart
                            </button>
                        </a>

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
                        <!-- addtocompare/{{$new->id}} -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div view="dashboard">
        <div class="line">
            <h2>Sản phẩm khuyến mại</h2>
        </div>

        <div class="line">
            <p>Tìm thấy {{count($newpr)}} kết quả</p>
        </div>

        <div class="products">
                @foreach($khuyenmai as $km)
                <div class="product">
                    <a href="{{route('chitietsanpham',$km->id)}}">
                        <img src="upload/product/add/{{$km->anh_sp}}" width="100%" height="200px">
                    </a>

                    <div class="overlay">
                        <a href="{{route('addcart',$km->id)}}">
                            <button class="cart-icon">
                                shopping_cart
                            </button>
                        </a>

                        <?php $price_new = $km-> gia_sp - $km->khuyen_mai?>
                            <h3>{{$km->ten_sp}}</h3>

                        <?php if ($km->khuyen_mai > 0): ?>
                            <p class="price-before">
                                <?php echo number_format($km->gia_sp); ?>đ
                            </p>
                            
                            <p class="price">
                                <?php echo number_format($price_new) ?>đ
                            </p>
                        <?php else: ?>
                            <p class="no-discount">
                                Chưa có khuyến mãi
                            </p>

                            <p class="price">
                                <?php echo number_format($km->gia_sp); ?>đ
                            </p>
                        <?php endif; ?>
                        <!-- addtocompare/{{$km->id}} -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container" style="border: whitesmoke solid 2px;width: 95%">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-9" style="border: whitesmoke solid thin">
                        <div class="beta-products-list">
                            @if(count($newpr) >0)
                                <div style="text-align:center">  <?php echo $newpr->links()?>  </div>
                            @endif
                        <!-- .beta-products-list -->
                        </div> <!-- .beta-products-list -->
                        <hr>
                        <div style="text-align: center">{{$khuyenmai->links()}}</div>
                    </div> <!-- .beta-products-list -->
                    <div class="col-sm-3" style="border:whitesmoke solid thin;padding-top: 20px;">
                        <div class="side">
                            <!-- The Support -->
                            <div class="box-right">
                                <div class="title tittle-box-right">
                                    <h5 style="text-align: center"><b>Tìm theo giá</b></h5>
                                </div>
                                <div class="content-box" style="padding-top: 15px;">
                                    <!-- goi ra phuong thuc hien thi danh sach ho tro -->
                                    <div class="content-box">
                                        <!-- goi ra phuong thuc hien thi danh sach ho tro -->
                                        <div class="price">
                                            <form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            Từ
                                                        </td>
                                                        <td style="padding-left: 10px">
                                                            <input style="width:200px;height:30px" type="text" value=""
                                                                   name="gianho">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Đến
                                                        </td>
                                                        <td style="padding-left: 10px">
                                                            <input style="width:200px;height:30px;" type="text" value=""
                                                                   name="gialon">
                                                        </td>
                                                    </tr>
                                                    <tr style="margin-top: 10px;">
                                                        <td></td>
                                                        <td style="padding-left: 10px;padding-top: 10px">
                                                            <button class="btn btn-success" type="submit" id="">Tìm kiếm</button>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Support -->
                        </div>
                        <hr>
                        <div class="panel panel-success" style="margin-top: 20px;">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="text-align:center;">Loại Sản Phẩm </h3>
                            </div>
                            <div style="padding-top: 20px">

                                @foreach($loai_sp3 as $loai)
                                    <ul>
                                        <li style="list-style-type: none;padding-top: 3px;background: window;">
                                            <a href="{{route('loai-san-pham',$loai->id)}}"
                                               style="padding-left: 20px;font-size: 15px;">
                                                <?php echo $loai->ten_loai_sp ?>

                                            </a>
                                            <hr>
                                        </li>
                                        @endforeach
                                    </ul>
                            </div>

                        </div>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="text-align:center;">Thông báo mới </h3>
                            </div>
                            <div>
                                <ul>
                                    <!--bien list1 này lấy từ core- MY_controller-->
                                    <?php foreach ($tintuc as $row): ?>
                                    <li style="list-style-type: none;padding-top: 10px;background: window;">
                                        <a href='tintuc/{{$row->id }}'>
                                            <table>
                                                <tr>
                                                    <td style="height:70px;width:120px;">
                                                        <img style="padding-right: 15px;height:70px;width:120px;"
                                                             src="upload/tintuc/add/{{$row->anh_tb}}">
                                                    </td>
                                                    <td>
                                                            <span style="font-size:14px;color:#003399;">
                                                                <?php echo $row->tieu_de_tb ?>
                                                            </span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div> <!-- end section with sidebar and main content -->

    </div> <!-- .main-content -->
    </div> <!-- #content -->
    </div> <!-- .container -->
@endsection