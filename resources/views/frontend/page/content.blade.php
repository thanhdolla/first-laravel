@extends('master')
@section('content')

    <div class="container" style="border: whitesmoke solid 2px;width: 95%">
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
                    <div class="col-sm-9" style="border: whitesmoke solid thin">
                        <div class="beta-products-list">
                            <h4>Sản phẩm mới</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($newpr)}} kết quả</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($newpr as $new)
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
                            @if(count($newpr) >0)
                                <div style="text-align:center">  <?php echo $newpr->links()?>  </div>
                        @endif
                        <!-- .beta-products-list -->
                        </div> <!-- .beta-products-list -->
                        <hr>

                        <div class="beta-products-list">
                            <h4>Sản phẩm khuyến mại</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy <?php echo count($khuyenmai)?> sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                            @foreach($khuyenmai as $km)
                                    <div class="col-sm-3" style="padding-left: 20px;">
                                        <div class="single-item" style="margin-bottom: 40px;">
                                            <div class="single-item-header" style="height: 230px;">
                                                <a href="{{route('chitietsanpham',$new->id)}}"><img
                                                            src="upload/product/add/{{$km->anh_sp}}"
                                                            style="text-align:center;height:230px;width: 210px;" alt=""></a>
                                            </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$km->ten_sp}}</p>
                                            <p class="single-item-price">
                                                <?php $price_new = $km->gia_sp - $km->khuyen_mai ?>
                                                <?php if ($km->khuyen_mai > 0): ?>
                                                <a style="text-decoration:line-through;padding-top: 5px;font-size:15px;">
                                                    <?php echo number_format($km->gia_sp); ?>Đ
                                                </a>
                                                    <br>
                                                <a class="ga" style="color:red;padding-top: 10px;font-size: 20px;">
                                                    <b><?php echo number_format($price_new) ?>Đ</b>
                                                </a>
                                                <?php else: ?>
                                                    <i style="font-size: 15px;">chưa có khuyến mại</i>
                                                    <a style="color:red;font-size: 20px;"><b><?php echo number_format($km->gia_sp); ?>
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