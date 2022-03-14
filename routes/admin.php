<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminHomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('login', [App\Http\Controllers\admin\AdminLoginController::class, 'index'])->name('login');
Route::post('login', [App\Http\Controllers\admin\AdminLoginController::class, 'adminLogin']);
Route::post('logout', [App\Http\Controllers\admin\AdminLoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('', function() {
        return redirect('admin/home');
    });
Route::get('home', [App\Http\Controllers\admin\AdminHomeController::class, 'index'])->name('home');
Route::post('removePicture', [App\Http\Controllers\NewsController::class, 'removePicture'])->name('removePicture');
Route::post('removePokerPicture', [App\Http\Controllers\PokerController::class, 'removePokerPicture'])->name('removePokerPicture');
Route::post('casinoRemovePicture', [App\Http\Controllers\CasinoController::class, 'removePicture'])->name('casinoRemovePicture');
Route::post('bannersRemovePicture', [App\Http\Controllers\BannersController::class, 'removePicture'])->name('bannersRemovePicture');
Route::post('sliderRemovePicture', [App\Http\Controllers\SliderController::class, 'sliderRemovePicture'])->name('sliderRemovePicture');
    Route::resource('news', \App\Http\Controllers\NewsController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('casino',\App\Http\Controllers\CasinoController::class);
    Route::resource('slider',\App\Http\Controllers\SliderController::class);
    Route::post('promoRemoveLogo', [App\Http\Controllers\PromoController::class, 'promoRemoveLogo'])->name('promoRemoveLogo');
    Route::post('promoRemoveImage', [App\Http\Controllers\PromoController::class, 'promoRemoveImage'])->name('promoRemoveImage');
    Route::post('makeSlider', [App\Http\Controllers\NewsController::class, 'makeSlider'])->name('makeSlider');
    Route::post('makeMain', [App\Http\Controllers\NewsController::class, 'makeMain'])->name('makeMain');
    Route::post('importSport', [App\Http\Controllers\SportController::class, 'importSport'])->name('importSport');
    Route::resource('promo',\App\Http\Controllers\PromoController::class);
    Route::resource('poker',\App\Http\Controllers\PokerController::class);
    Route::resource('sport',\App\Http\Controllers\SportController::class);
    Route::resource('p2p',\App\Http\Controllers\P2pController::class);
    Route::resource('banners',\App\Http\Controllers\BannersController::class);
});



