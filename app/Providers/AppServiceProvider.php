<?php

namespace App\Providers;

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
        view()->composer('frontend.header',function($view){
            $loai_sp = Loai_san_pham::all();
            $view->with('loai_sp',$loai_sp);
        });

        view()->composer('frontend.page.loaisanpham',function($view1){
            $loai_sp1 = Loai_san_pham::all();
            $view1->with('loai_sp1',$loai_sp1);
        });

        view()->composer('frontend.page.chitietsanpham',function($view2){
            $loai_sp2 = Loai_san_pham::all()->first();
            $view2->with('loai_sp2',$loai_sp2);
        });

        view()->composer('frontend.slide',function($view2){
           $slide =  Slide::all();
           $view2->with('slide',$slide);
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
