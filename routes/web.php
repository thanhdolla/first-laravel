<?php

Route::get('index',[
    'as'=>'trang_chu',
    'uses'=>'HomeController@getIndex'
    ]);

Route::get('loaisanpham/{type}',[
    'as'=>'loai-san-pham',
    'uses'=>'HomeController@getLoaiSanPham'
]);

Route::get('chitietsanpham/{id}',[
    'as'=>'chitietsanpham',
    'uses'=>'HomeController@getChiTietSanPham'
]);

Route::get('lienhe',[
    'as'=>'lienhe',
    'uses'=>'HomeController@getLienHe'
]);

Route::get('tintuc/{id}',[
    'as'=>'tintuc/{id}',
    'uses'=>'HomeController@tinTuc'
]);

Route::get('gioithieu',[
    'as'=>'gioithieu',
    'uses'=>'HomeController@getGioiThieu'
]);

Route::get('addcart/{id}',[
    'as'=>'addcart',
    'uses'=>'HomeController@getAddCart'
]);

Route::get('cart',[
    'as'=>'cart',
    'uses'=>'HomeController@getCart'
]);

Route::get('removecart/{id}',[
    'as'=>'removecart',
    'uses'=>'HomeController@removeCart'
]);

Route::post('updatecart',[
    'as'=>'updatecart',
    'uses'=>'HomeController@updateCart'
]);

Route::get('removeallcart',[
    'as'=>'removeallcart',
    'uses'=>'HomeController@removeAll'
]);

Route::get('dathang',[
    'as'=>'dathang',
    'uses'=>'HomeController@getDatHang'
]);

Route::post('dathang',[
    'as'=>'dathang',
    'uses'=>'HomeController@datHang'
]);

Route::get('login',[
    'as'=>'login',
    'uses'=>'HomeController@getLogin'
]);

Route::post('login',[
    'as'=>'login',
    'uses'=>'HomeController@login'
]);

Route::get('signup',[
    'as'=>'sigin',
    'uses'=>'HomeController@getSigin'
]);

Route::post('signup',[
    'as'=>'sigin',
    'uses'=>'HomeController@sigin'
]);

Route::get('logout',[
    'as'=>'logout',
    'uses'=>'HomeController@logout'
]);

Route::get('quanlitaikhoan',[
    'as'=>'quanlitaikhoan',
    'uses'=>'HomeController@quanLiTaiKhoan'
]);

Route::post('luuthongtinkhachhang',[
    'as'=>'luuthongtinkhachhang',
    'uses'=>'HomeController@luuTaiKhoan'
]);

Route::get('lichsutuongtac',[
    'as'=>'lichsutuongtac',
    'uses'=>'HomeController@lichSuTuongTac'
]);

Route::get('timkiem',[
    'as'=>'timkiem',
    'uses'=>'HomeController@timKiem'
]);

Route::post('phanhoi',[
    'as'=>'phanhoi',
    'uses'=>'HomeController@phanHoi'
]);

Route::get('chinhanh/{id}',[
    'as'=>'chinhanh/{id}',
    'uses'=>'HomeController@chiNhanh'
]);

Route::post('binhluan/{id}',[
    'as'=>'binhluan/{id}',
    'uses'=>'HomeController@binhLuan'
]);

Route::get('addtocompare/{id}',[
    'as'=>'addtocompare/{id}',
    'uses'=>'HomeController@addToCompare'
]);

Route::get('getcompare',[
    'as'=>'getcompare',
    'uses'=>'HomeController@getCompare'
]);

Route::get('xoasanphamsosanh/{id}',[
    'as'=>'xoasanphamsosanh/{id}',
    'uses'=>'HomeController@deleteCompare'
]);

Route::get('admin/login',[
    'as'=>'admin/login',
    'uses'=>'AdminController@getLogin'
]);

Route::post('admin/login',[
    'as'=>'admin/login',
    'uses'=>'AdminController@login'
]);

Route::get('admin/logout',[
    'as'=>'admin/logout',
    'uses'=>'AdminController@logout'
]);

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::group(['prefix'=>'slide'],function (){
        Route::get('index',[
            'as'=>'admin/slide/index',
            'uses'=>'SlideController@index'
        ]);

        Route::get('add',[
            'as'=>'admin/slide/add',
            'uses'=>'SlideController@getAdd'
        ]);

        Route::post('add',[
            'as'=>'admin/slide/add',
            'uses'=>'SlideController@add'
        ]);

        Route::get('edit/{id}',[
            'as'=>'admin/slide/edit{id}',
            'uses'=>'SlideController@getEdit'
        ]);

        Route::post('edit/{id}',[
            'as'=>'admin/slide/edit/{id}',
            'uses'=>'SlideController@edit'
        ]);

        Route::get('delete/{id}',[
            'as'=>'admin/slide/delete/{id}',
            'uses'=>'SlideController@delete'
        ]);
    });

    Route::group(['prefix'=>'tintuc'],function (){
        Route::get('index',[
            'as'=>'admin/tintuc/index',
            'uses'=>'TinTucController@index'
        ]);

        Route::get('add',[
            'as'=>'admin/tintuc/add',
            'uses'=>'TinTucController@getAdd'
        ]);

        Route::post('add',[
            'as'=>'admin/tintuc/add',
            'uses'=>'TinTucController@add'
        ]);

        Route::get('edit/{id}',[
            'as'=>'admin/tintuc/edit{id}',
            'uses'=>'TinTucController@getEdit'
        ]);

        Route::post('edit/{id}',[
            'as'=>'admin/tintuc/edit/{id}',
            'uses'=>'TinTucController@edit'
        ]);

        Route::get('delete/{id}',[
            'as'=>'admin/tintuc/delete/{id}',
            'uses'=>'TinTucController@delete'
        ]);
    });

    Route::group(['prefix'=>'donhang'],function(){
        Route::get('index',[
            'as'=>'admin/donhang/index',
            'uses'=>'DonHangController@index'
        ]);

        Route::get('xuli/{id}',[
            'as'=>'admin/donhang/xuli/{id}',
            'uses'=>'DonHangController@XuLi'
        ]);

        Route::get('chitietdonhang/{id}',[
            'as'=>'admin/donhang/chitietdonhang/{id}',
            'uses'=>'DonHangController@getDonHangChiTiet'
        ]);

        Route::get('delete/{id}',[
            'as'=>'admin/donhang/delete/{id}',
            'uses'=>'DonHangController@delete'
        ]);
    });
    Route::group(['prefix' => 'feedback'], function () {
        Route::get('index', [
            'as' => 'admin/feedback/index',
            'uses' => 'PhanHoiController@index'
        ]);

        Route::get('delete/{id}', [
            'as' => 'admin/feedback/delete/{id}',
            'uses' => 'PhanHoiController@delete'
        ]);
        Route::get('xuli/{id}', [
            'as' => 'admin/feedback/xuli/{id}',
            'uses' => 'PhanHoiController@xuLi'
        ]);


    });

    Route::group(['prefix' => 'binhluan'], function () {
        Route::get('index', [
            'as' => 'admin/binhluan/index',
            'uses' => 'BinhLuanController@index'
        ]);

        Route::get('delete/{id}', [
            'as' => 'admin/feedback/delete/{id}',
            'uses' => 'PhanHoiController@delete'
        ]);



    });

    Route::group(['prefix'=>'donhangchitiet'],function(){
        Route::get('index',[
            'as'=>'admin/donhangchitiet/index',
            'uses'=>'DonHangChiTietController@index'
        ]);

        Route::get('delete/{id}',[
            'as'=>'admin/donhangchitiet/delete/{id}',
            'uses'=>'DonHangChiTietController@delete'
        ]);

    });

    Route::group(['prefix'=>'nhanvien'],function(){
        Route::get('index',[
            'as'=>'admin/nhanvien/index',
            'uses'=>'NhanVienController@index'
        ]);

        Route::get('add',[
            'as'=>'admin/nhanvien/add',
            'uses'=>'NhanVienController@getAdd'
        ]);

        Route::post('add',[
            'as'=>'admin/nhanvien/add',
            'uses'=>'NhanVienController@add'
        ]);

        Route::get('edit/{id}',[
            'as'=>'admin/nhanvien/edit{id}',
            'uses'=>'NhanVienController@getEdit'
        ]);

        Route::post('edit/{id}',[
            'as'=>'admin/nhanvien/edit/{id}',
            'uses'=>'NhanVienController@edit'
        ]);

        Route::get('delete/{id}',[
            'as'=>'admin/nhanvien/delete/{id}',
            'uses'=>'NhanVienController@delete'
        ]);

    });

    Route::group(['prefix'=>'khachhang'],function(){
        Route::get('index',[
            'as'=>'admin/khachhang/index',
            'uses'=>'KhachHangController@index'
        ]);

        Route::get('delete/{id}',[
            'as'=>'admin/khachhang/delete/{id}',
            'uses'=>'KhachHangController@delete'
        ]);

    });

    Route::group(['prefix'=>'product'],function (){
        Route::get('index',[
            'as'=>'admin/product/index',
            'uses'=>'SanPhamController@index'
        ]);

        Route::get('add',[
            'as'=>'admin/product/add',
            'uses'=>'SanPhamController@getAdd'
        ]);

        Route::post('add',[
            'as'=>'admin/product/add',
            'uses'=>'SanPhamController@add'
        ]);

        Route::get('edit/{id}',[
            'as'=>'admin/product/edit{id}',
            'uses'=>'SanPhamController@getEdit'
        ]);

        Route::post('edit/{id}',[
            'as'=>'admin/product/edit/{id}',
            'uses'=>'SanPhamController@edit'
        ]);

        Route::get('delete/{id}',[
            'as'=>'admin/product/delete/{id}',
            'uses'=>'SanPhamController@delete'
        ]);

    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('index', [
            'as' => 'admin/category/index',
            'uses' => 'SanPhamController@cateIndex'
        ]);

        Route::get('add', [
            'as' => 'admin/category/add',
            'uses' => 'SanPhamController@getCateAdd'
        ]);

        Route::post('add', [
            'as' => 'admin/category/add',
            'uses' => 'SanPhamController@addCate'
        ]);

        Route::get('edit/{id}', [
            'as' => 'admin/category/edit{id}',
            'uses' => 'SanPhamController@getCateEdit'
        ]);

        Route::post('edit/{id}', [
            'as' => 'admin/category/edit/{id}',
            'uses' => 'SanPhamController@editCate'
        ]);

        Route::get('delete/{id}', [
            'as' => 'admin/category/delete/{id}',
            'uses' => 'SanPhamController@deleteCate'
        ]);

    });

    Route::get('dashboard',[
        'as'=>'admin/dashboard',
        'uses'=>'DashboardController@index'
    ]);

});


