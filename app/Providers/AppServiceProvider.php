<?php

namespace App\Providers;

use App\Http\Controllers\Back\ArticleController;
use App\Models\Config;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Paginator::useBootstrap();
        view()->share('config', Config::find(1));
        Route::resource('articles', ArticleController::class)->names([
            'create' => 'makaleler.olustur',
            'edit' => 'makaleler.guncelle',
        ]);
    }
}
