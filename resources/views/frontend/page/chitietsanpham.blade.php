@extends("master")
@section("content")

    <div class="inner-header" style="padding-top: 30px;width:90%;padding-top: -10px;">
        <div class="pull-left" style="padding-left: 100px;font-size:xx-large">Thông tin chi
            tiết {{$chitiet->ten_sp}}</div>
        <div class="pull-right" style="font-size:large;">
            <ol class="breadcrumb">
                <a href="{{route('trang_chu')}}">Home\</a> <a href="{{route('loai-san-pham',$loai_sp2->id)}}"
                                                              style="font-size: medium;">{{$loai_sp2->ten_loai_sp}}\</a><span
                        style="font-size: medium">{{$chitiet->ten_sp}}</span>
            </ol>
        </div>
    </div>

    <div class="container" style="width:90%;border:whitesmoke solid thin;margin:auto;border-top: transparent">
        <div id="content">
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
                    <div class="row">
                        <div class="col-sm-4">
                            <img style="height: 500px;width: 350px;margin-top:80px;" src="upload/product/add/{{$chitiet->anh_sp}}"
                                 alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-7">
                                <div class="single-item-body">
                                    <p class="single-item-title"><b><h4>{{$chitiet->ten_sp}}</h4></b></p>
                                    <div style="padding-top:10px;"></div>
                                </div>

                                <table class="table table-light">
                                    <tbody>
                                    <tr>
                                        <td>Giá </td>
                                        <td> <a class="single-item-price">
                                                <?php $price_new = $chitiet->gia_sp - $chitiet->khuyen_mai ?>
                                                <?php if ($chitiet->khuyen_mai > 0): ?>
                                                <a style="text-decoration:line-through;padding-top: 5px;font-size:15px;">
                                                    <?php echo number_format($chitiet->gia_sp); ?>Đ
                                                </a>
                                                <br>
                                                <a class="ga" style="color:red;padding-top: 10px;font-size: 20px;">
                                                    <b><?php echo number_format($price_new) ?>Đ</b>
                                                </a>
                                                <?php else: ?>
                                                <a style="color:red;font-size: 20px;"><b><?php echo number_format($chitiet->gia_sp); ?>
                                                        Đ</b></a>
                                                <?php endif; ?>
                                            </a></td>

                                    </tr>
                                    <tr>
                                        <td>Hãng sản xuất</td>
                                        <td>{{$chitiet->hang_sx}}</td>

                                    </tr>
                                    <tr>
                                        <td>Ngày sản xuất</td>
                                        <td>{{$chitiet->ngay_sx}}</td>

                                    </tr>
                                    <tr>
                                        <td>Bảo hành</td>
                                        <td> {{$chitiet->bao_hanh}}</td>

                                    </tr>
                                    </tbody>
                                </table>
                                <b><h4>Cấu hình chi tiết:</h4></b>
                                    <p>
                                        <?php echo $chitiet->mo_ta_sp?>
                                    </p>


                                <div style="background: red;color:black">
                                </div>

                                <div class="single-item-caption" style="padding-top: 5px;">
                                    <a class="add-to-cart pull-left" href="{{route('addcart',$chitiet->id)}}"
                                       title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary compare"
                                       href="addtocompare/{{$chitiet->id}}" title="Add to compare">Add to
                                        Compare </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="chinhanh" style="padding-top: 50px;">
                            <h5>Các chi nhánh hiện có sản phẩm</h5>
                            <div style="padding-left: 10px;">
                                <?php
                                foreach($list as $row){
                                ?>
                                <a href="chinhanh/{{$row['id']}}"><?php echo $row['ten_chi_nhanh'] ?> - Liên
                                    hệ: <?php echo $row['sdt']?></a>
                                <br>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="space40">&nbsp;</div>
                        <div class="woocommerce-tabs">
                            @if(Session::has('thongbao'))
                                <div class="alert alert-success" style="background:#00ced1;width:80%">
                                    {{Session::get('thongbao')}}
                                </div>
                            @endif
                            @if(Session::has('loi'))
                                <div class="alert alert-danger" style="width:80%">
                                    {{Session::get('loi')}}
                                </div>
                            @endif
                            <?php if(Session::has('khach_hang')){ ?>
                            <ul class="tabs">
                                <li><a href="#tab-reviews">Bình Luận</a></li>
                                <div class="panel" id="tab-reviews">
                                    <form action="binhluan/{{$chitiet->id}}" method="post" class="contact-form">
                                        <input name="_token" type="hidden" value="{{csrf_token()}}"/>
                                        <div class="form-block">
                                            <textarea name="message" style="height:100px;"
                                                      placeholder="Your Message"></textarea>
                                        </div>
                                        <div class="form-block">
                                            <button type="submit" class="btn btn-success">Gửi bình luận</button>
                                        </div>
                                    </form>

                                    <table class="table table-striped" style="width: 100%">
                                        <thead>

                                        </thead>
                                        <tbody>
                                        @foreach($binhluan as $row)
                                            <tr>

                                                <td style="width:25%;">{{ $row->ten_kh }}<br><span
                                                            style="color: #9BA2AB">{{ date('d-m-Y', strtotime($row->created_at)) }}</span>
                                                </td>
                                                <td>{{ $row->noi_dung }}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </ul>
                            <?php } else { ?>
                            <h5>Bình luận</h5>
                            <i>(Bạn phải đăng nhập mới có thể giử bình luận)</i>
                            <table class="table table-striped" style="width: 100%;margin-top: 30px;">
                                <thead>

                                </thead>
                                <tbody>
                                @foreach($binhluan as $row)
                                    <tr>

                                        <td style="width:25%;">{{ $row->ten_kh }}<br><span
                                                    style="color: #9BA2AB">{{ date('d-m-Y', strtotime($row->created_at)) }}</span>
                                        </td>
                                        <td>{{ $row->noi_dung }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <?php } ?>
                        </div>

                    </div>

                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection