@extends('master')
@section('content')

    <div class="container"style="border: whitesmoke solid 2px;width: 95%">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-9" style="boder:whitesmoke solid thin">
                        <div class="beta-products-list">
                            <h4>Sản phẩm tìm kiếm</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($product)}} kết quả</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($product as $new)
                                    <div class="col-sm-3" style="padding-left: 50px;">
                                        <div class="single-item" style="margin-bottom: 40px;">
                                            <div class="single-item-header" style="height: 230px;">
                                                <a href="{{route('chitietsanpham',$new->id)}}"><img src="source/frontend/image/product/{{$new->anh_sp}}" style="text-align:center;height:230px;width: 210px;" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$new->ten_sp}}</p>
                                                <a class="single-item-price">
                                                    <?php $price_new = $new->gia_sp - $new->khuyen_mai ?>
                                                    <?php if ($new->khuyen_mai > 0): ?>
                                                    <a style="text-decoration:line-through;padding-top: 5px;font-size:15px;">
                                                        <?php echo number_format($new->gia_sp); ?>Đ
                                                    </a>
                                                        <br>
                                                    <a class="ga" style="color:red;padding-top: 10px;font-size: 20px;">
                                                        <b><?php echo number_format($price_new) ?>Đ</b>
                                                    </a>
                                                    <?php else: ?>
                                                        <i style="font-size: 15px;">chưa có khuyến mại</i>
                                                    <a style="color:red;font-size: 20px;"><b><?php echo number_format($new->gia_sp); ?>
                                                            Đ</b></a>
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="{{route('addcart',$new->id)}}"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                <div class="choose">
                                                    <ul class="nav nav-pills nav-justified">
                                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- .beta-products-list -->
                        </div> <!-- .beta-products-list -->
                    <div class="col-sm-3" style="border:whitesmoke solid thin;">
                        <div class="side">


                            <!-- The Support -->
                            <div class="box-right">
                                <div class="title tittle-box-right">
                                    <h5><b>Tìm theo giá sản phẩm</b></h5>
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

                                    @foreach($loai_sp4 as $loai)
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

                        </div>

                    </div>

                </div>
            </div> <!-- end section with sidebar and main content -->

        </div> <!-- .main-content -->
    </div> <!-- #content -->
    </div> <!-- .container -->
@endsection