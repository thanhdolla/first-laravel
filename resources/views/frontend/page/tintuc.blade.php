@extends('master')
@section('content')
    <style>
        .outer-wrapper {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
        }

        .outer-wrapper > .right {
            margin-left: 40px;
        }
    </style>
    
    <div class="outer-wrapper">
        <div class="left">
            <style>
                [view=main-content] {
                    width: 800px;
                }

                [view=main-content] h1 {
                    font-family: Lato;
                    font-size: 28px;

                    margin-bottom: 40px;
                }

                [view=main-content] p {
                    margin-top: 20px;
                    margin-bottom: 80px;
                    font-family: Lato;
                    font-size: 14px;
                }
            </style>

            <div view="main-content">
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

                <h1>
                    <?php echo $tin->tieu_de_tb ?>
                </h1>

                <img src="upload/tintuc/add/{{$tin->anh_tb}}" width="100%">

                <p><?php echo $tin->noi_dung_tb ?></p>
            </div>
        </div>

        <div class="right">
            <style>
                [view=sidebar] {
                    margin-bottom: 20px;
                }

                [view=sidebar] h2 {
                    font-family: Lato;
                    font-size: 24px;
                }

                [view=sidebar] button {
                    padding: 5px 20px;
                    font-size: 14px !important;
                    background: orange;
                    color: white;
                    border: none;
                    outline: none;

                    margin-top: 20px;
                }
                
                [view=sidebar] .news {
                    display: flex;
                    width: 400px;
                    margin-bottom: 20px;
                }

                [view=sidebar] .news .image {
                    flex: 0 0 auto;
                    width: 100px;
                }

                [view=sidebar] .news .image img {
                    object-fit: cover;
                }

                [view=sidebar] .news .info {
                    margin-left: 10px;
                }
            </style>

            <div view="sidebar">
                <h2>Thông báo mới</h2>

                <br/>

                <?php foreach ($tintuc as $row): ?>
                    <div class="news">
                        <div class="image">
                        <img src="upload/tintuc/add/{{$row->anh_tb}}" width="100px" height="80px">
                        </div>

                        <div class="info">
                        <p>
                            <?php echo $row->tieu_de_tb ?>
                        </p>

                        <div>
                            <a href='tintuc/{{$row->id }}'>
                            <button>Xem thêm</button>
                            </a>
                        </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
@endsection
