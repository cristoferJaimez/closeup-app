<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;
use App\Http\Controllers\LoginController;

//Route Index App
Route::view('/', 'index' );
Route::get('/', [usersController::class, 'index'] );

//Sign In
Route::post('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
//Sign In users Routes
Route::view('home' , 'home.home')->name('home')->middleware('auth');
Route::get('home' , [usersController::class, 'index_home'] )->name('home')->middleware('auth');


//post
Route::view('post', 'home.post')->middleware('auth');
Route::get('post/{id}',  [usersController::class, 'userId'])->middleware('auth');

//end SignIn
Route::post( 'logout' , [LoginController::class , 'Logout'])->name('logout');




//route register disabled
Route::get('register', function (){
    return view('auth.register');
});



