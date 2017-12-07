@extends("master")
@section("content")
    <div class="inner-header" style="padding-top: 30px;">
        <div class="pull-left" style="padding-left: 100px;font-size:xx-large">Sản phẩm {{$loai_sp->ten_loai_sp}}</div>
        <div class="pull-right" style="font-size:large;">
            <ol class="breadcrumb">
                <a href="{{route('trang_chu')}}">Home\</a><span style="font-size: medium;">{{$loai_sp->ten_loai_sp}}</span>
            </ol>
        </div>
    </div>

    <div class="container" style="border: whitesmoke solid 1px;width: 95%;;margin-top:10px;">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($loai_sp1 as $loai)
                        <li><a href="{{route('loai-san-pham',$loai->id)}}">{{$loai->ten_loai_sp}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9" style="border: whitesmoke solid thin">
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($sp)}} kết quả</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($sp as $new)
                                <div class="col-sm-3" style="padding-left: 20px;">
                                    <div class="single-item" style="margin-bottom: 40px;">
                                        <div class="single-item-header" style="height: 230px;">
                                            <a href="{{route('chitietsanpham',$new->id)}}"><img
                                                        src="upload/product/add/{{$new->anh_sp}}"
                                                        style="text-align:center;height:230px;width: 210px;" alt=""></a>
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
                                        <div class="single-item-caption" style="padding-top: 5px;">
                                            <a class="add-to-cart pull-left" href="{{route('addcart',$new->id)}}" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary compare pull-right" href="addtocompare/{{$new->id}}" title="Add to compare">Add to Compare </a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->
                        @if(count($sp) >0)
                            <div style="text-align:center">
                                <?php echo $sp->links()?>
                            </div>
                    @endif
                    <!-- .beta-products-list -->

                    <hr>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khuyến mại</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy <?php echo count($km)?> sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                        @foreach($km as $item)
                            <div class="col-sm-3">
                                <div class="single-item" style="margin-bottom: 40px;">
                                    <div class="single-item-header" style="height:230px">
                                        <a href="product.html"><img
                                                    src="upload/product/add/{{$item->anh_sp}}"
                                                    style="height: 230px;width:210px;text-align: center" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$item->ten_sp}}</p>
                                        <p class="single-item-price">
                                            <?php $price_new = $item->gia_sp - $item->khuyen_mai ?>
                                            <?php if ($item->khuyen_mai > 0): ?>
                                            <a style="text-decoration:line-through;padding-top: 5px;font-size:15px;">
                                                <?php echo number_format($item->gia_sp); ?>Đ
                                            </a>
                                            <br>
                                            <a class="ga" style="color:red;padding-top: 10px;font-size: 20px;">
                                                <b><?php echo number_format($price_new) ?>Đ</b>
                                            </a>
                                            <?php else: ?>
                                            <i style="font-size: 15px;">chưa có khuyến mại</i>
                                            <a style="color:red;font-size: 20px;"><b><?php echo number_format($item->gia_sp); ?>
                                                    Đ</b></a>
                                            <?php endif; ?>
                                        </p>

                                    </div>
                                    <div class="single-item-caption" style="padding-top: 5px;">
                                        <a class="add-to-cart pull-left" href="{{route('addcart',$new->id)}}" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary compare pull-right" href="addtocompare/{{$new->id}}" title="Add to compare">Add to Compare </a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div style="text-align: center">{{$km->links()}}</div>
                </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection