@extends('masteradmin')
@section('contentadmin')
    <!-- Right side -->
    <div id="rightSide">

        <div class="titleArea">
            <div class="wrapper">
                <div class="pageTitle">
                    <h5>Sản phẩm</h5>
                    <span>Quản lý sản phẩm</span>
                </div>

                <div class="horControlB menu_action">
                    <ul>
                        <li><a href="{{route('admin/product/add')}}">
                                <img src="source/backend/admin/images/icons/control/16/add.png" />
                                <span>Thêm mới</span>
                            </a></li>

                        <li><a href="{{route('admin/product/index')}}">
                                <img src="source/backend/admin/images/icons/control/16/list.png" />
                                <span>Danh sách</span>
                            </a></li>
                    </ul>
                </div>

                <div class="clear"></div>
            </div>
        </div>
        <div class="line"></div>

        <!-- Message -->
        <!-- Main content wrapper -->
        <div class="wrapper">
            <div class="widget">
                @if(Session::has('thongbao'))
                    <div class="alert alert-success" style="background:#00ced1">
                        {{Session::get('thongbao')}}
                    </div>
                @endif
                <div class="title">
                    <img src="source/backend/admin/images/icons/dark/dialog.png" class="titleIcon" />
                    <h6>
                        Danh sách
                        sản phẩm
                    </h6>
                </div>
                <div class="line"></div>

                    <div class="wrapper" id="main_product">
                        <div class="widget">

                            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">

                                <thead class="filter"><tr><td colspan="6">
                                        <form class="list_filter form" action="{{route('admin/product/index')}}" method="get">
                                            <table cellpadding="0" cellspacing="0" width="80%"><tbody>

                                                <tr>
                                                    <td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
                                                    <td class="item"><input name="searchid" value="" type="text" style="width:55px;" /></td>

                                                    <td class="label" style="width:40px;"><label>Tên</label></td>
                                                    <td class="item" style="width:155px;" ><input name="searchname" value=""  type="text" style="width:155px;" /></td>
                                                    <td class="item">
                                                        <select name="catalog">
                                                            @foreach($cate as $ct)
                                                                <option value={{$ct->id}}>{{$ct->ten_loai_sp}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>

                                                    <td style='width:150px'>
                                                        <button type="submit" class="btn btn-success" >Search</button>
                                                    </td>

                                                </tr>
                                                </tbody></table>
                                        </form>
                                    </td>
                                </tr>
                                </thead>

                                <thead>
                                <tr>
                                    <td style="width:60px;">Mã số</td>
                                    <td>Tên</td>
                                    <td>Giá</td>
                                    <td style="width:120px;">Hành động</td>
                                </tr>
                                </thead>
                                <tbody class="list_item">
                                @foreach($product as $pd)
                                <tr>

                                    <td class="textC">{{$pd->id}}</td>
                                    <td>
                                        <div class="image_thumb">
                                            <img src="upload/product/add/{{$pd->anh_sp }}" height="50">
                                            <div class="clear"></div>
                                        </div>

                                        <a href="" class="tipS" title="" target="_blank">
                                            <b>{{$pd->ten_sp}}</b>
                                        </a>

                                        <div class="f11" >
                                            lượt view: {{$pd->luot_view}}					</div>

                                    </td>

                                    <td class="textR">
                                        {{$pd->gia_sp}} đ

                                    </td>

                                    <td class="option textC">
                                        <a class="tipS" title="Chỉnh sửa" href="admin/product/edit/{{$pd->id}}">
                                            <img src="source/backend/admin/images/icons/color/edit.png">
                                        </a>

                                        <a class="tipS verify_action" title="Xóa" href="admin/product/delete/{{$pd->id}}" >
                                            <i style="font-size: 20px;color:red" class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{--<div class>{{$product->links()}}</div>--}}
                        </div>

                    </div>
                    <div class="clear mt30"></div>
            </div>
        </div>
    </div>

        <div class="clear mt30"></div>

    </div>

@endsection