<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function(){
    return view('dashboard');
});

Route::get('/pemilihan', function(){
    return view('pemilihan');
});

Route::get('/calon', function(){
    return view('calon');
});

Route::get('/kartu_keluarga', function(){
    return view('kk');
});


Route::get('user', function(){
    return view('user_election');
});

Route::get('calon_pilih', function(){
    return view('calon_pilih');
});

Route::get('success_vote', function(){
    return view('success_vote');
});

Route::resource('/posts', PostController::class);
