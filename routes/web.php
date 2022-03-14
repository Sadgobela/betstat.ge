<?php

use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
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


//Route::post('login', [App\Http\Controllers\admin\AdminLoginController::class, 'adminLogin']);


Route::get('', [App\Http\Controllers\SportController::class, 'web'])->name('main');
Route::get('/casino', [App\Http\Controllers\CasinoController::class, 'web'])->name('casino');
Route::get('/promotions', [App\Http\Controllers\PromoController::class, 'web'])->name('promotions');
Route::get('/table-games', [App\Http\Controllers\P2pController::class, 'web'])->name('table-games');
Route::get('/news', [App\Http\Controllers\NewsController::class, 'web'])->name('news');
Route::get('/promotions/promotions-inner', [App\Http\Controllers\PromoController::class, 'promoInner'])->name('promoInner');
Route::get('/news/news-inner', [App\Http\Controllers\NewsController::class, 'newsInner'])->name('newsInner');
Route::get('/getPromotionsData', [App\Http\Controllers\PromoController::class, 'getPromotionsData'])->name('getPromotionsData');
Route::get('/getGamesData', [App\Http\Controllers\P2pController::class, 'getGamesData'])->name('getGamesData');
Route::get('/getNewsData', [App\Http\Controllers\NewsController::class, 'getNewsData'])->name('getNewsData');
Route::get('/getCasinoData', [App\Http\Controllers\CasinoController::class, 'getCasinoData'])->name('getCasinoData');

Route::post('/recovery-password', [App\Http\Controllers\UserController::class, 'recoveryPassword'])->name('recoveryPassword');
Route::get('/forgot-password', [App\Http\Controllers\UserController::class, 'forgotPassword'])->name('forgotPassword');
Route::put('/recoveryChangePassword', [App\Http\Controllers\UserController::class, 'recoveryChangePassword'])->name('recoveryChangePassword');
Route::post('/checkUserExist', [App\Http\Controllers\UserController::class, 'checkUserExist'])->name('checkUserExist');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/userPage', [App\Http\Controllers\UserController::class, 'userPage'])->name('userPage');
    Route::put('/userPageChangePassword', [App\Http\Controllers\UserController::class, 'userPageChangePassword'])->name('userPageChangePassword');
    Route::get('/userPageChangePassword', function () {
        return view('userPageChangePassword');
    });
    Route::put('/upload-avatar', [App\Http\Controllers\UserController::class, 'uploadAvatar'])->name('uploadAvatar');
    Route::post('/pollVote', [App\Http\Controllers\UserController::class, 'pollVote'])->name('pollVote');
});


Route::get('/login', function () {
    abort(404);
});

//Route::get('/login', function () {
//    abort(404);
//});


Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'userLogin']);


Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);
// Google login
Route::get('login/google', [SocialController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [SocialController::class, 'handleGoogleCallback']);
// ---
