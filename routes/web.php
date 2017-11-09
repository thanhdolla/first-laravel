<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('aa',function(){
//echo  "<h1>dgdddd</h1>";
//});
//Route::get('aaa/{ten}',function ($ten){
//    echo "ten: ".$ten;
//});
//Route::get('Laravel/{ngay}',function($ngay){
//    echo "ngay lh :".$ngay;
//});
//Route::get('Route1',['as'=>'Myoute',function(){
//    echo 'dinh danh';
//}]);
////Route::get('goicontroller','MyController@Hello');
//Route::get('thamso/{ten}','MyController@Hello');
//
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

Route::get('updatecart',[
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

Route::get('sigin',[
    'as'=>'sigin',
    'uses'=>'HomeController@getSigin'
]);

Route::post('sigin',[
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

Route::get('timkiem',[
    'as'=>'timkiem',
    'uses'=>'HomeController@timKiem'
]);

Route::post('phanhoi',[
    'as'=>'phanhoi',
    'uses'=>'HomeController@phanHoi'
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

    Route::group(['prefix'=>'donhang'],function(){
        Route::get('index',[
            'as'=>'admin/donhang/index',
            'uses'=>'DonHangController@index'
        ]);

        Route::get('xuli/{id}',[
            'as'=>'admin/donhang/xuli/{id}',
            'uses'=>'DonHangController@XuLi'
        ]);

        Route::get('delete/{id}',[
            'as'=>'admin/donhang/delete/{id}',
            'uses'=>'DonHangController@delete'
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

    Route::get('dashboard',[
        'as'=>'admin/dashboard',
        'uses'=>'DashboardController@index'
    ]);

});


