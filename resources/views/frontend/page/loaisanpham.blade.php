@extends("master")
@section("content")
    <div class="inner-header" style="padding-top: 30px;">
        <div class="pull-left" style="padding-left: 100px;font-size:xx-large">Sản phẩm {{$loai_sp->ten_loai_sp}}</div>
        <div class="pull-right" style="font-size:large;">
            <ol class="breadcrumb">
                <a href="{{route('trang_chu')}}">Home\</a><span style="font-size: medium">{{$loai_sp->ten_loai_sp}}</span>
            </ol>
        </div>
    </div>

<div class="container">
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
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($sp)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($sp as $row)
                            <div class="col-sm-4" >
                                <div class="single-item" style="padding-left: 20px;margin-bottom: 30px;">
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="source/frontend/image/product/{{$row->anh_sp}}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$row->ten_sp}}</p>
                                        <p class="single-item-price">
                                            <?php $price_new = $row->gia_sp - $row->khuyen_mai ?>
                                            <?php if ($row->khuyen_mai > 0): ?>
                                            <a style="text-decoration:line-through;padding-top: 5px;font-size:15px;">
                                                <?php echo number_format($row->gia_sp); ?>Đ
                                            </a>
                                            <a class="ga" style="color:red;padding-top: 10px;font-size: 20px;">
                                                <b><?php echo number_format($price_new) ?>Đ</b>
                                            </a>
                                            <?php else: ?>
                                            <a style="color:red;font-size: 20px;"><b><?php echo number_format($row->gia_sp); ?>
                                                    Đ</b></a>
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
                        @if(count($sp) >0)
                            <div style="text-align:center">  <?php echo $sp->links()?>  </div>
                        @endif
                    </div> <!-- .beta-products-list -->
<hr>
                    {{--<div class="space50">&nbsp;</div>--}}

                    <div class="beta-products-list">
                        <h4>Sảm phẩm khuyến mại</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($km)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($km as $item)
                            <div class="col-sm-4">
                                <div class="single-item"  style="padding-left: 20px;margin-bottom: 30px;">
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="source/frontend/image/product/{{$item->anh_sp}}" alt="{{$item->anh_sp}}"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$item->ten_sp}}</p>
                                        <p class="single-item-price">
                                            <?php $price_new = $item->gia_sp - $item->khuyen_mai ?>
                                            <?php if ($item->khuyen_mai > 0): ?>
                                            <a style="text-decoration:line-through;padding-top: 5px;font-size:15px;">
                                                <?php echo number_format($item->gia_sp); ?>Đ
                                            </a>
                                            <a class="ga" style="color:red;padding-top: 10px;font-size: 20px;">
                                                <b><?php echo number_format($price_new) ?>Đ</b>
                                            </a>
                                            <?php else: ?>
                                            <a style="color:red;font-size: 20px;"><b><?php echo number_format($item->gia_sp); ?>
                                                    Đ</b></a>
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
                        @if(count($km) >0)
                            <div style="text-align:center">  <?php echo $km->links()?>  </div>
                        @endif
                        <div class="space40">&nbsp;</div>

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection