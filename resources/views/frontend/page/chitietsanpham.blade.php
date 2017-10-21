@extends("master")
@section("content")

    <div class="inner-header" style="padding-top: 30px;width:90%;padding-top: -10px;">
        <div class="pull-left" style="padding-left: 100px;font-size:xx-large">Thông tin chi tiết {{$chitiet->ten_sp}}</div>
        <div class="pull-right" style="font-size:large;">
            <ol class="breadcrumb">
                <a href="{{route('trang_chu')}}">Home\</a> <a href="{{route('loai-san-pham',$loai_sp2->id)}}" style="font-size: medium;">{{$loai_sp2->ten_loai_sp}}\</a><span style="font-size: medium">{{$chitiet->ten_sp}}</span>
            </ol>
        </div>
    </div>
    {{--<div class="inner-header">--}}
        {{--<div class="container">--}}
            {{--<div class="pull-left">--}}
                {{--<h6 class="inner-title">Thông tin chi tiết {{$chitiet->ten_sp}}</div>--}}
            {{--</div>--}}
            {{--<div class="pull-right">--}}
                {{--<div class="beta-breadcrumb font-large">--}}
                    {{--<a href="{{route('trang_chu')}}">Home\</a> <a href="{{route('loai-san-pham',$loai_sp2->id)}}" style="font-size: medium;">{{$loai_sp2->ten_loai_sp}}\</a><span style="font-size: medium">{{$chitiet->ten_sp}}</span>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="clearfix"></div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="container" style="width:90%;border:whitesmoke solid thin;margin:auto;border-top: transparent">
        <div id="content">
            <div class="row">

                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="source/frontend/image/product/{{$chitiet->anh_sp}}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title"><b>{{$chitiet->ten_sp}}</b></p>
                                <p class="single-item-price">
                                    <a class="single-item-price">
                                        <?php $price_new = $chitiet->gia_sp - $chitiet->khuyen_mai ?>
                                        <?php if ($chitiet->khuyen_mai > 0): ?>
                                        <a style="text-decoration:line-through;padding-top: 5px;font-size:15px;">
                                            <?php echo number_format($chitiet->gia_sp); ?>Đ
                                        </a>
                                        <a class="ga" style="color:red;padding-top: 10px;font-size: 20px;">
                                            <b><?php echo number_format($price_new) ?>Đ</b>
                                        </a>
                                        <?php else: ?>
                                        <a style="color:red;font-size: 20px;"><b><?php echo number_format($chitiet->gia_sp); ?>
                                                Đ</b></a>
                                        <?php endif; ?>
                                    </a>
                                </p>
                            </div>

                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            <div class="single-item-desc">
                                <p>{{$chitiet->mo_ta_sp}}
                                </p>
                            </div>
                            <div class="space20">&nbsp;</div>

                            <p>Số lượng:</p>
                            <div class="single-item-options">
                                <select class="wc-select" name="size">

                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                    <div class="space40">&nbsp;</div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#tab-description">Discription</a></li>
                            <li><a href="#tab-reviews">Reviews (0)</a></li>
                        </ul>

                        <div class="panel" id="tab-description">
                            <p>{{$chitiet->discription}}</p>
                        </div>
                        <div class="panel" id="tab-reviews">
                            <p>No Reviews</p>
                        </div>
                    </div>
                    {{--<div class="space50">&nbsp;</div>--}}
                    {{--<div class="beta-products-list">--}}
                        {{--<h4>Related Products</h4>--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-sm-4">--}}
                                {{--<div class="single-item">--}}
                                    {{--<div class="single-item-header">--}}
                                        {{--<a href="product.html"><img--}}
                                                    {{--src="source/frontend/assets/dest/images/products/4.jpg" alt=""></a>--}}
                                    {{--</div>--}}
                                    {{--<div class="single-item-body">--}}
                                        {{--<p class="single-item-title">Sample Woman Top</p>--}}
                                        {{--<p class="single-item-price">--}}
                                            {{--<span>$34.55</span>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="single-item-caption">--}}
                                        {{--<a class="add-to-cart pull-left" href="product.html"><i--}}
                                                    {{--class="fa fa-shopping-cart"></i></a>--}}
                                        {{--<a class="beta-btn primary" href="product.html">Details <i--}}
                                                    {{--class="fa fa-chevron-right"></i></a>--}}
                                        {{--<div class="clearfix"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-4">--}}
                                {{--<div class="single-item">--}}
                                    {{--<div class="single-item-header">--}}
                                        {{--<a href="product.html"><img--}}
                                                    {{--src="source/frontend/assets/dest/images/products/5.jpg" alt=""></a>--}}
                                    {{--</div>--}}
                                    {{--<div class="single-item-body">--}}
                                        {{--<p class="single-item-title">Sample Woman Top</p>--}}
                                        {{--<p class="single-item-price">--}}
                                            {{--<span>$34.55</span>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="single-item-caption">--}}
                                        {{--<a class="add-to-cart pull-left" href="product.html"><i--}}
                                                    {{--class="fa fa-shopping-cart"></i></a>--}}
                                        {{--<a class="beta-btn primary" href="product.html">Details <i--}}
                                                    {{--class="fa fa-chevron-right"></i></a>--}}
                                        {{--<div class="clearfix"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-4">--}}
                                {{--<div class="single-item">--}}
                                    {{--<div class="ribbon-wrapper">--}}
                                        {{--<div class="ribbon sale">Sale</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="single-item-header">--}}
                                        {{--<a href="#"><img src="source/frontend/assets/dest/images/products/6.jpg" alt=""></a>--}}
                                    {{--</div>--}}
                                    {{--<div class="single-item-body">--}}
                                        {{--<p class="single-item-title">Sample Woman Top</p>--}}
                                        {{--<p class="single-item-price">--}}
                                            {{--<span class="flash-del">$34.55</span>--}}
                                            {{--<span class="flash-sale">$33.55</span>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="single-item-caption">--}}
                                        {{--<a class="add-to-cart pull-left" href="#"><i--}}
                                                    {{--class="fa fa-shopping-cart"></i></a>--}}
                                        {{--<a class="beta-btn primary" href="#">Details <i class="fa fa-chevron-right"></i></a>--}}
                                        {{--<div class="clearfix"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div> <!-- .beta-products-list -->--}}
                </div>

                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection