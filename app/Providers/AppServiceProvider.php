<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//件数制限のためのコード
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    /*
    public function register(): void
    {
        //Paginator::useBootstrap(); //件数制限のためのコード
    }*/

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap(); //件数制限のためのコード

        //Paginator::useBootstrapFive(); 公式ドキュメント
        //または Paginator::useBootstrapFour(); 公式ドキュメント
    }
}

?>