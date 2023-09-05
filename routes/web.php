<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front;
use App\Http\Controllers\Back;

use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\ConfigController;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
*/
/*Route::get('site-bakimda',function (){
   return view('front.offline');
});*/
Route::group(['prefix' => 'admin'], function () {
    Route::get('/panel', [Back\Dashboard::class, 'index'])->name('admin.dashboard');
    // Makale Route
    Route::get('/makaleler/silinenler', [Back\ArticleController::class, 'trashed'])->name('trashed.article');
    Route::resource('/makaleler', ArticleController::class);
    Route::get('/switch', [Back\ArticleController::class, 'switch'])->name('switch');
    Route::get('/deletearticle/{id}', [Back\ArticleController::class, 'delete'])->name('delete.article');
    Route::get('/harddeletearticle/{id}', [Back\ArticleController::class, 'hardDelete'])->name('hard.delete.article');
    Route::get('/recoverarticle/{id}', [Back\ArticleController::class, 'recover'])->name('recover.article');
    Route::get('/giris', [Back\AuthController::class, 'login'])->name('admin.login');
    Route::post('/giris', [Back\AuthController::class, 'loginPost'])->name('admin.login.post');
    // Category Route
    Route::get('/kategoriler', [Back\CategoryController::class, 'index'])->name('category.index');
    Route::post('/kategoriler/create', [Back\CategoryController::class, 'create'])->name('category.create');
    Route::post('/kategoriler/update', [Back\CategoryController::class, 'update'])->name('category.update');
    Route::post('/kategoriler/delete', [Back\CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/kategori/status', [Back\CategoryController::class, 'switch'])->name('category.switch');
    Route::get('/kategori/getData', [Back\CategoryController::class, 'getData'])->name('category.getdata');
    Route::get('/kategori/getDelete', [Back\CategoryController::class, 'getDelete'])->name('category.getdelete');
    // Page Rota
    Route::get('/sayfalar', [Back\PageController::class, 'index'])->name('page.index');
    Route::get('/sayfalar/olustur', [Back\PageController::class, 'create'])->name('page.create');
    Route::get('/sayfalar/guncelle/{id}', [Back\PageController::class, 'update'])->name('page.edit');
    Route::post('/sayfalar/guncelle/{id}', [Back\PageController::class, 'updatePost'])->name('page.edit.post');
    Route::post('/sayfalar/olustur', [Back\PageController::class, 'post'])->name('page.create.post');
    Route::get('/sayfa/switch', [Back\PageController::class, 'switch'])->name('page.switch');
    Route::get('/sayfa/sil/{id}', [Back\PageController::class, 'delete'])->name('page.delete');
    Route::get('/sayfa/siralama', [Back\PageController::class, 'orders'])->name('page.orders');
    //Config Rota
    Route::get('/ayarlar', [Back\ConfigController::class, 'index'])->name('config.index');
    Route::post('/ayarlar/guncelle', [Back\ConfigController::class, 'update'])->name('config.update');
    //
    Route::get('/cikis', [Back\AuthController::class, 'logout'])->name('admin.logout');
});


/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::get('/', [Front\Homepage::class, 'index'])->name('homepage');
Route::get('yazılar/sayfa', [Front\Homepage::class, 'index']);
Route::get('/iletisim', [Front\Homepage::class, 'contact'])->name('contact');
Route::post('/iletisim', [Front\Homepage::class, 'contactpost'])->name('contact.post');
Route::get('/kategori/{category}', [Front\Homepage::class, 'category'])->name('category');
Route::get('/{category}/{slug}', [Front\Homepage::class, 'single'])->name('single');
Route::get('/{sayfa}', [Front\Homepage::class, 'page'])->name('page');



