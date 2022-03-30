<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

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
Route::get('/register',function(){
   return view('register'); 
});
Route::get('/login',function(){
   return view('login'); 
});

Route::prefix('user')->group(function(){
   Route::view('/dashboard','user'); 
   Route::view('/status','user'); 
   Route::view('/home','user'); 
});

Route::any('{any?}', function () {
    return view('index');
})->where('any','.*');
