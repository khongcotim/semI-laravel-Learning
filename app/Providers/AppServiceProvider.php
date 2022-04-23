<?php

namespace App\Providers;

use App\Models\admin\Banner;
use App\Models\admin\Logo;
use App\Models\admin\TourGuide;
use App\Models\admin\TourGuild;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('pagination::default');
        view()->composer('*',function($view){
            $home_banner = Banner::where('page','=','home')->first();
            $employee_name = '';
            $logos = Logo::where('status',1)->orderBy('created_at','desc')->first();
            if (Auth::guard('customer')->check()) {
                $employee = TourGuide::where('name',Auth::guard('customer')->user()->name)->first();
                if ($employee == Auth::guard('customer')->user()) {
                    $employee_name = $employee->name;
                }else{
                    $employee_name = '';
                }
            }else{
                $employee_name = '';
            }
            $view->with([
                'get_keyword'=>app('request')->input('keyword'),
                'home_banner'=>$home_banner!= null? $home_banner->image:'null',
                'logos'=>$logos,
                'auth'=>Auth::guard('customer')->check()?Auth::guard('customer'):'null',
                'employee'=>$employee_name
            ]);
        });
    }
}
