<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App', 'prefix' => ''], function () {
    Route::get('/', [\App\Http\Controllers\Front\HomeController::class, 'index'])->name('app.home');
    Route::get('/about', [\App\Http\Controllers\Front\AboutController::class, 'index'])->name('app.about');
    Route::get('/news', [\App\Http\Controllers\Front\NewsController::class, 'index'])->name('app.news');
});

Route::group(['namespace' => 'App', 'prefix' => '/Admin_Panel', 'middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home.index');
    Route::get('/about', [\App\Http\Controllers\Admin\AboutController::class, 'index'])->name('admin.about.index');
    Route::post('/AboutCreate', [\App\Http\Controllers\Admin\AboutController::class, 'create'])->name('about.create');
    Route::get('/AboutStore', [\App\Http\Controllers\Admin\AboutController::class, 'store'])->name('about.store');
    Route::get('/AboutEdit/{id}', [\App\Http\Controllers\Admin\AboutController::class, 'edit'])->name('about.edit');
    Route::put('/AboutUpdate/{id}', [\App\Http\Controllers\Admin\AboutController::class, 'update'])->name('about.update');
    Route::delete('/AboutDelete/{id}', [\App\Http\Controllers\Admin\AboutController::class, 'destroy'])->name('about.destroy');
    Route::get('/news', [\App\Http\Controllers\Admin\NewsController::class, 'index'])->name('admin.news.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
