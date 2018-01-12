@extends('master')
@section('content')
    <style>
        table#cart_ccontents td {
            padding: 10px;
            border: 1px solid #ccc;
            margin: auto
        }
    </style>

    <style>
        [view=compare] {
            display: flex;
            flex-flow: column nowrap;
            align-items: center;
        }

        [view=compare] .main {
            display: flex;
            flex-flow: column;
            align-items: center;
            width: 1000px;
        }

        [view=compare] .main h1 {
            font-family: Lato;
            font-size: 24px;
        }

        [view=compare] .products {
            display: flex;
            justify-content: center;
        }
    </style>

    <div view="compare">
        <div class="main">

            <h1>So sánh sản phẩm</h1>
    
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
        
            <div class="products">
                <?php if(Session::get('compare_qty') > 0) : ?>
        
                    <form method="post" action="">
                        <input name="_token" type="hidden" value="{{csrf_token()}}"/>

                        @foreach($cp as $row )

                            <?php  $sanpham = $row['item']; ?>
                            <div class="col-sm-6" style="padding-left: 50px;">
                                <div class="single-item" style="margin-bottom: 40px;">
                                    <table class="table table-striped" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p class="single-item-title">{{$sanpham->ten_sp}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <div class="single-item-header" style="height: 230px;">
                                                <a href="{{route('chitietsanpham',$sanpham->id)}}"><img
                                                            src="upload/product/add/{{$sanpham->anh_sp}}"
                                                            style="text-align:center;height:230px;width: 210px;"
                                                            alt=""></a>

                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <div class="single-item-body">
                                                <a class="single-item-price">
                                                    <?php $price_new = $sanpham->gia_sp - $sanpham->khuyen_mai ?>
                                                    <?php if ($sanpham->khuyen_mai > 0): ?>
                                                    <a style="text-decoration:line-through;padding-top: 5px;font-size:15px;">
                                                        <?php echo number_format($sanpham->gia_sp); ?>Đ
                                                    </a>

                                                    <a class="ga"
                                                        style="color:red;padding-top: 10px;font-size: 20px;">
                                                        <b><?php echo number_format($price_new) ?>Đ</b>
                                                    </a>
                                                    <?php else: ?>
                                                    <a style="color:red;font-size: 20px;"><b><?php echo number_format($sanpham->gia_sp); ?>
                                                            Đ</b></a>
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php echo $sanpham->mo_ta_sp?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"
                                                    href="{{route('addcart',$sanpham->id)}}"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                            </div>
                                            </td>

                                            <td>
                                            <a style="width:30px;color: black;"
                                                href="xoasanphamsosanh/{{$sanpham->id}}">
                                                <input class="btn btn-success" type="button" value="Xóa">
                                            </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        @endforeach

                    </form>

                <?php else: ?>
                <h4>Hiện chưa có sản phẩm nào để so sánh</h4>
                <?php endif; ?>
            </div>
        </div>
    </div>

@endsection

