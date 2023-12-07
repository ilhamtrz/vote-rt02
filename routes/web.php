<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\VoterDataController;
use Illuminate\Support\Facades\Auth;
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
    // return view('welcome');
    return view('user_election');
})->middleware('guest');

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware('auth');

// Route::get('/pemilihan', function(){
//     return view('pemilihan');
// });

// Route::get('/calon', function(){
//     return view('calon');
// });

// Route::get('/kartu_keluarga', function(){
//     return view('kk');
// });


// Route::get('user', function(){
//     return view('user_election');
// });
Route::post('/', 'App\Http\Controllers\AuthController@login')->name('login');

Route::get('/voting', 'App\Http\Controllers\CandidateController@getCandidates')->middleware('auth');


// Logou dengan Auth::logout() kemudian redirect ke halaman login
// Tabmbah middleware guest yang hanya boleh login
// Tabmbah middleware auth untuk home dan logout
Route::get('success_vote', function(){
    return view('success_vote');
})->middleware('guest');

Route::get('user_voted', function(){
    return view('user_voted');
})->middleware('guest');

// Route::get('cek_login', function(){
//     return dd(Auth::user());
// });

Route::put('endvotes/{id}', 'App\Http\Controllers\VoteController@endvotes')->name('endvotes');
Route::post('voting/', 'App\Http\Controllers\VoteController@voteCandidate')->name('voting');

Route::resource('/posts', PostController::class);
Route::resource('/votes', VoteController::class);
Route::resource('/candidates', CandidateController::class);
Route::resource('/users', UserController::class);
Route::get('/voterData', 'App\Http\Controllers\VoterDataController@index');
