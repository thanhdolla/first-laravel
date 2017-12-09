<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use App\Phan_hoi;
use App\San_pham;
use App\Thong_bao;
use Illuminate\Support\ServiceProvider;
use App\Loai_san_pham;
use App\Slide;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.header', function ($view) {
            $loai_sp = Loai_san_pham::all();
            $view->with('loai_sp', $loai_sp);
        });

        view()->composer('frontend.page.loaisanpham', function ($view1) {
            $loai_sp1 = Loai_san_pham::all();
            $view1->with('loai_sp1', $loai_sp1);
        });

        view()->composer('frontend.page.chitietsanpham', function ($view2) {
            $loai_sp2 = Loai_san_pham::all()->first();
            $view2->with('loai_sp2', $loai_sp2);
        });
        view()->composer('frontend.page.content', function ($view3) {
            $loai_sp3 = Loai_san_pham::all();
            $view3->with('loai_sp3', $loai_sp3);
        });

        view()->composer('frontend.page.timkiem', function ($view3) {
            $loai_sp4 = Loai_san_pham::all();
            $view3->with('loai_sp4', $loai_sp4);
        });

        view()->composer('frontend.slide', function ($view2) {
            $slide = Slide::all();
            $view2->with('slide', $slide);
        });

        view()->composer('frontend.page.content', function ($view3) {
            $tintuc = Thong_bao::orderby('id', 'desc')->get();
            $view3->with('tintuc', $tintuc);
        });

        view()->composer('frontend.page.timkiem', function ($view3) {
            $tintuc = Thong_bao::orderby('id', 'desc')->get();
            $view3->with('tintuc', $tintuc);
        });

        view()->composer('frontend.page.tintuc', function ($view3) {
            $tintuc = Thong_bao::orderby('id', 'desc')->get();
            $view3->with('tintuc', $tintuc);
        });

        view()->composer('frontend.page.lichsutuongtac', function ($v) {
            if (Session::has('khach_hang_id')) {
                $id = Session::get('khach_hang_id');
            }
            $ph = Phan_hoi::where('khach_hangID', $id)->get();
            $v->with('ph', $ph);
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
