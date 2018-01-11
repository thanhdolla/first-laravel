@extends("master")
@section("content")

    <style>
        [view=detail] {
            display: flex;
            flex-flow: column nowrap;
            align-items: center;

            margin-bottom: 100px;
        }

        [view=detail] .main {
            width: 1000px;
            display: flex;
        }

        [view=detail] .main .left {
            flex: 0 0 auto;
            width: 300px;
        }

        [view=detail] img {
            object-fit: cover;
        }

        [view=detail] .main .right {
            margin-left: 40px;
            flex: 1 1 auto;
        }

        [view=detail] h1 {
            font-family: Lato;
            font-size: 30px;
        }

        [view=detail] h2 {
            font-family: Lato;
            font-size: 24px;
        }

        [view=detail] .both {
            width: 1000px;
        }

        [view=detail] .line {
            display: flex;
            margin-top: 30px;
            margin-bottom: 20px;
        }

        [view=detail] .line > :not(:first-child) {
            margin-left: 15px;
        }

        [view=detail] a,
        [view=detail] p,
        [view=detail] b,
        [view=detail] i {
            font-family: Lato !important;
            font-size: 14px !important;
        }
        
        
        [view=detail] input {
            padding: 5px;
            border: none;
            outline: none;
        }

        [view=detail] .input .bottom-line {
            display: flex;
            justify-content: center;

            width: 100%;
            height: 2px;
            background: #eee;
        }

        [view=detail] .label {
            font-size: 12px !important;
            color: black;

            padding: 0;
        }
        
        [view=detail] .input .bottom-line::after {
            content: '';
            height: 100%;
            width: 0px;
            background: black;
        }

        [view=detail] .input.focus .bottom-line::after {
            width: 100%;
        }

        [view=detail] .input .bottom-line::after {
            transition: 0.5s;
        }
        
        [view=detail] .input input,
        [view=detail] .input textarea {
            width: 100%;
            font-family: Arial;
            font-size: 14px !important;
            padding: 0px;
            margin: 0px;

            resize: vertical;
            
            padding: 8px !important;

            background: none;
            outline: none;
            border: none !important;
        }

        [view=detail] .input {
            margin-bottom: 8px;
        }

        [view=detail] button {
            display: flex;

            outline: none;
            border: none;

            margin: 0px;

            color: white;
        }

        [view=detail] button.cart-button .icon,
        [view=detail] button.cart-button .text {
            background: orange;
        }

        [view=detail] button.compare-button .icon,
        [view=detail] button.compare-button .text {
            background: dodgerblue;
        }

        [view=detail] .icon {
            display: flex;
            width: 45px;
            height: 45px;

            justify-content: center;
            align-items: center;

            font-family: Material Icons;
            font-size: 20px;
        }

        [view=detail] .text {
            font-family: Lato;
            font-size: 14px;

            display: flex;
            height: 45px;
            justify-content: center;
            align-items: center;

            padding-left: 20px;
            padding-right: 20px;
        }

        [view=detail] .cart-button .text:hover {
            background: white;
            color: orange;
        }

        [view=detail] .compare-button .text:hover {
            background: white;
            color: dodgerblue;
        }

        [view=detail] .comment {
            background: rgba(0, 0, 0, 0.1);
            padding: 5px 20px;

            margin-bottom: 5px;
        }

        [view=detail] .comment .name {
            font-family: Lato;
            font-size: 16px;
        }

        [view=detail] .comment .date {
            color: gray;
        }

        [view=detail] .comment .text {
            font-family: Arial;
            font-size: 14px;
        }

        [view=detail] .price {
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
            align-items: center;
            height: 48px;

            background: white;
            color: black;

            font-family: Arial;
            font-size: 24px;
            text-align: center;
        }
    </style>

    <div view=detail>
        <div class="main">
            <div class="left">
                <img src="upload/product/add/{{$chitiet->anh_sp}}" alt="{{$chitiet->ten_sp}}" height="400" width="300px">
                
                <?php $price_new = $chitiet->gia_sp - $chitiet->khuyen_mai ?>
                <div class="price">
                    <?php if ($chitiet->khuyen_mai > 0): ?>
                        Giá: <?php echo number_format($price_new) ?>đ
                    <?php else: ?>
                        Giá: <?php echo number_format($chitiet->gia_sp); ?>đ
                    <?php endif; ?>
                </div>
            </div>

            <div class="right">
                <h1>{{$chitiet->ten_sp}}</h1>

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

                    <br>

                    <p>
                        <b>Hãng sản xuất:</b>
                        {{$chitiet->hang_sx}}
                    </p>

                    <p>
                        <b>Ngày sản xuất:</b>
                        {{$chitiet->ngay_sx}}
                    </p>

                    <p>
                        <b>Bảo hành:</b>
                        {{$chitiet->bao_hanh}}
                    </p>

                    <br>

                    <h2>Cấu hình chi tiết</h2>

                    <p>
                        <?php echo $chitiet->mo_ta_sp?>
                    </p>

                    <div class="line">
                        <a href="{{route('addcart',$chitiet->id)}}">
                            <button class="compare-button">
                                <div class="icon">compare</div>
                                <div class="text">Chọn so sánh</div>
                            </button>
                        </a>
                        <a href="addtocompare/{{$chitiet->id}}">
                            <button class="cart-button">
                                <div class="icon">shopping_cart</div>
                                <div class="text">
                                    Cho vào giỏ hàng
                                </div>
                            </button>
                        </a>
                    </div>
            </div>
        </div>

        <div class="both">
            <br><br>

            <h2>Các chi nhánh hiện có sản phẩm</h2>

            <?php foreach($list as $row) { ?>
            <a href="chinhanh/{{$row['id']}}">
                <?php echo $row['ten_chi_nhanh'] ?> - Liên hệ: <?php echo $row['sdt']?></a>
            <br>
            <?php } ?>

            <br>
            
            <h2>Bình luận</h2>

            <?php if(Session::has('khach_hang')){ ?>
                <form action="binhluan/{{$chitiet->id}}" method="post">
                    <input name="_token" type="hidden" value="{{csrf_token()}}"/>

                    <div class="input">
                        <div class="label">Bình luận</div>
                        <input type="text" name="message">
                        <div class="bottom-line"></div>
                    </div>

                    <button type="submit">Gửi bình luận</button>
                </form>

                <br><br>

                <h2>Danh sách bình luận</h2>
                
                <br>

                <div class="comments">
                    @foreach($binhluan as $row)
                        <div class="comment">
                            <div class="name">
                                {{ $row->ten_kh }}
                                <span class="date">
                                    {{ date('d-m-Y', strtotime($row->created_at)) }}
                                </span>
                            </div>
                            <div class="text">{{ $row->noi_dung }}</div>
                        </div>
                    @endforeach
                </div>
            <?php } else { ?>
                <p>
                    <i>Bạn phải đăng nhập mới có thể gửi bình luận!</i>
                </p>

                <br/>

                <h2>Danh sách bình luận</h2>

                <div class="comments">
                    @foreach($binhluan as $row)
                        <div class="comment">
                            <div class="name">
                                {{ $row->ten_kh }}
                                <span class="date">
                                    {{ date('d-m-Y', strtotime($row->created_at)) }}
                                </span>
                            </div>
                            <div class="text">{{ $row->noi_dung }}</div>
                        </div>
                    @endforeach
                </div>
            <?php } ?>
        </div>
    </div>
    
    <script>
        document.querySelectorAll('[view=detail] input, [view=contact] textarea').forEach(function (el) {
            el.addEventListener('focus', function () {
                el.parentElement.classList.add('focus')
            })

            el.addEventListener('blur', function () {
                el.parentElement.classList.remove('focus')
            })
        })
    </script>
@endsection