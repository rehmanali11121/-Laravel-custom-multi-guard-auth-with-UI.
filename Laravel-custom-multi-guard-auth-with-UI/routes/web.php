<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Seller\SellerController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Routes user;
Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login','dashboard.user.login')->name('login');
        Route::view('/register','dashboard.user.register')->name('register');
        Route::Post('/create',[UserController::class,'create'])->name('create');
        Route::Post('/dologin',[UserController::class,'doLogin'])->name('dologin');

    });
    Route::middleware(['auth:web'])->group(function(){
        Route::view('/home','dashboard.user.home')->name('home');
        Route::Post('/logout',[UserController::class,'logout'])->name('logout');

        
    });
});

//Routes Admin;
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');
       // Route::view('/register','dashboard.user.register')->name('register');
       // Route::Post('/create',[AdminController::class,'create'])->name('create');
        Route::Post('/dologin',[AdminController::class,'doLogin'])->name('dologin');

    });
    Route::middleware(['auth:admin'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        //  <a class="btn btn-link" href="{{ route('admin.password.request') }}">{{ __('Forgot Your Password?') }}</a>
        // route('admin.password.update')
        // route('admin.password.email')
    //   <form method="POST" action="{{ route('admin.password.confirm') }}">
        Route::Post('/logout',[AdminController::class,'logout'])->name('logout'); 
    });
});

//Routes Seller;
Route::prefix('seller')->name('seller.')->group(function(){
    Route::middleware(['guest:seller'])->group(function(){
        Route::view('/login','dashboard.seller.login')->name('login');
        Route::view('/register','dashboard.seller.register')->name('register');
        Route::Post('/create',[SellerController::class,'create'])->name('create');
        Route::Post('/dologin',[SellerController::class,'doLogin'])->name('dologin');

    });
    Route::middleware(['auth:seller'])->group(function(){
        Route::view('/home','dashboard.seller.home')->name('home');
        Route::Post('/logout',[SellerController::class,'logout'])->name('logout');

        
    });
});