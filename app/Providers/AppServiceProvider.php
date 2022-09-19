<?php

namespace App\Providers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Models\User;
use http\Env\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use League\Flysystem\Config;

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
        $lang = App::getLocale();

        //dump(request()->segments());
        $dir = in_array($lang, ['ar', 'fa']) ? 'rtl' : 'ltr';
       # dd($lang);
        #dd($dir);
        View::share('dir', $dir);
        View::share('lang', $lang);
        $title='پارسا سامانه پاسخ گویی به سوالات دینی';
        $ltrtitle='Parsa System for answering religious questions';
        View::share('title', $title);
        View::share('ltrtitle', $ltrtitle);
//        Config::set(['dir'=>$dir]);

    }
}
