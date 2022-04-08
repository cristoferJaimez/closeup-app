<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;

Route::get('/', function () {
    return view('index');
});


Route::get('register', function (){
    return view('auth.register');
});


//view index users
Route::get('/', [usersController::class, 'index']);



