<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\postController;
use App\Http\Controllers\UtcMapsController;
use App\Http\Controllers\pharmaController;
use App\Http\Controllers\ExelController;
use App\Http\Controllers\CalculosController;





//Route Index App
Route::view('/', 'index' );
Route::get('/', [usersController::class, 'index'] );

//Sign In
Route::post('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
//Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
//end SignIn
Route::post( 'logout' , [LoginController::class , 'Logout'])->name('logout');
//Route::get( 'logout' , [LoginController::class , 'Logout'])->name('logout');


//Sign In users Routes
Route::view('home' , 'home.home')->name('home')->middleware('auth');
Route::get('home' , [usersController::class, 'index_home' ] )->name('home')->middleware('auth');

//home usuario
Route::post('home' , [postController::class ,'list_home' ] )->name('home')->middleware('auth');


//perfil user
Route::get('perfil/{id}', [usersController::class, 'perfil'])->name('perfil')->middleware('auth');

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
//proveedores
Route::view('proveedores', 'home.proveedores')->middleware('auth');
Route::view('sendEmail', 'home.sendEmail')->middleware('auth');
//update rol users

//post users
Route::get('postList/{id}',  [postController::class, 'listID'])->name('postList')->middleware('auth');
Route::get('oldpost/{id}',  [postController::class, 'oldList'])->name('oldpost')->middleware('auth');

//save users
Route::post('register', [usersController::class, 'saveUser']);



//route register disabled
Route::get('register', function (){
    return view('auth.register');
});

//category
Route::get('category_type', [usersController::class, 'category'])->name('category')->middleware('auth');



//UTC Routes
Route::get('utcmaps', [UtcMapsController::class, 'show'])->name('utcmaps')->middleware('auth');
Route::post('utcmaps', [UtcMapsController::class, 'ajaxReq'])->name('utcmaps')->middleware('auth');

Route::get('listUTC', [UtcMapsController::class, 'listUTC'])->name('listUTC')->middleware('auth');


    //google maps
    Route::view('maps_google', 'maps_google.index')->name('mapas_google')->middleware('auth');


//google maps forma geo localitation
Route::view('form_geo', 'form_geo.index')->name('form_geo')->middleware('auth');

//formulario
Route::get('form_geo',[UtcMapsController::class , 'search']  )->name('form_geo')->middleware('auth');
Route::post('form_geo_forma',[pharmaController::class , 'request_']  )->name('form_geo_forma')->middleware('auth');
Route::post('form_geo',[pharmaController::class , 'select']  )->name('form_geo')->middleware('auth');
Route::post('form_geo_',[pharmaController::class , 'search_pharma']  )->name('form_geo_')->middleware('auth');
Route::post('form_geo_cadena',[pharmaController::class , 'search_pharma_cadena']  )->name('form_geo_cadena')->middleware('auth');

Route::get('listar',[pharmaController::class , 'list_']  )->name('listar')->middleware('auth');



//excel
Route::controller(ExelController::class)->group(function(){
    Route::get('users', 'index');
    Route::get('excel-export', 'export')->name('excel.export');
    //Route::post('users-import', 'import')->name('users.import');
});



/////////////////////calculos de mercado rutas///////////////////////////////
Route::post('maps_google',[CalculosController::class, 'topValor'])->name('maps_google_calculo')->middleware('auth');
//Route::get('maps_google',[CalculosController::class, 'topValor'])->name('maps_google')->middleware('auth');
