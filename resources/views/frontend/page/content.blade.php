@extends('master')
@section('content')

    <div class="container"style="border: whitesmoke solid 2px;width: 90%">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
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
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Sản phẩm mới</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($newpr)}} kết quả</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($newpr as $new)
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
                                                    <a class="ga" style="color:red;padding-top: 10px;font-size: 20px;">
                                                        <b><?php echo number_format($price_new) ?>Đ</b>
                                                    </a>
                                                    <?php else: ?>
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
                                                        <li><a href="addtocompare/{{$new->id}}"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if(count($newpr) >0)
                                <div style="text-align:center">  <?php echo $newpr->links()?>  </div>
                            @endif
                            <!-- .beta-products-list -->
                        </div> <!-- .beta-products-list -->
                        <hr>
                        <div class="space50">&nbsp;</div>f
                        <div class="beta-products-list">
                            <h4>Sản phẩm khuyến mại</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy <?php echo count($khuyenmai)?> sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                                @foreach($khuyenmai as $km)
                                <div class="col-sm-3">
                                    <div class="single-item" style="margin-bottom: 40px;">
                                        <div class="single-item-header" style="height:230px">
                                            <a href="product.html"><img src="source/frontend/image/product/{{$km->anh_sp}}" style="height: 230px;width:210px;text-align: center" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$km->ten_sp}}</p>
                                            <p class="single-item-price">
                                                <?php $price_new = $km->gia_sp - $km->khuyen_mai ?>
                                                <?php if ($km->khuyen_mai > 0): ?>
                                                <a style="text-decoration:line-through;padding-top: 5px;font-size:15px;">
                                                    <?php echo number_format($km->gia_sp); ?>Đ
                                                </a>
                                                <a class="ga" style="color:red;padding-top: 10px;font-size: 20px;">
                                                    <b><?php echo number_format($price_new) ?>Đ</b>
                                                </a>
                                                <?php else: ?>
                                                <a style="color:red;font-size: 20px;"><b><?php echo number_format($km->gia_sp); ?>Đ</b></a>
                                                <?php endif; ?>
                                            </p>

                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                               @endforeach
                            </div>
                            <div style="text-align: center">{{$khuyenmai->links()}}</div>
                        </div> <!-- .beta-products-list -->

                    </div>
                </div> <!-- end section with sidebar and main content -->

            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection