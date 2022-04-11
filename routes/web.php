<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\postController;


//Route Index App
Route::view('/', 'index' );
Route::get('/', [usersController::class, 'index'] );

//Sign In
Route::post('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
//end SignIn
Route::post( 'logout' , [LoginController::class , 'Logout'])->name('logout');


//Sign In users Routes
Route::view('home' , 'home.home')->name('home')->middleware('auth');
Route::get('home' , [usersController::class, 'index_home' ] )->name('home')->middleware('auth');

//list Users
Route::view('listUsers', 'home.listUsers')->middleware('auth');
Route::get('listUsers' , [usersController::class, 'index_listUsers'] )->name('listUsers')->middleware('auth');

//list Post
Route::view('listPost', 'layout.listPost')->name('listPost')->middleware('auth');
Route::get('listPost' , [postController::class, 'list'] )->name('listPost')->middleware('auth');

//post
Route::view('post', 'home.post')->middleware('auth');
Route::get('post/{id}',  [usersController::class, 'userId'])->middleware('auth');

//public Post
Route::post('post/public', [postController::class , 'public'])->middleware('auth');



//save users
Route::post('register', [usersController::class, 'saveUser']);



//route register disabled
Route::get('register', function (){
    return view('auth.register');
});





