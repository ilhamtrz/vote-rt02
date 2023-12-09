<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\VotingSummaryController;
use App\Http\Controllers\VoterDataController;
use App\Models\VotingSummary;
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
Route::get('/home', 'App\Http\Controllers\AuthController@checkUserVote')->name('home');
Route::get('/', function () {
    // return view('welcome');
    return view('user_election');
});
Route::get('/admin_login', function () {
    // return view('welcome');
    return view('admin_login');
})->middleware('guest')->name('admin.login');

Route::post('/', 'App\Http\Controllers\AuthController@login')->name('login')->middleware('guest');
Route::post('/admin_login', 'App\Http\Controllers\AuthController@adminLogin')->name('adminlogin')->middleware('guest');


Route::get('/voting', 'App\Http\Controllers\CandidateController@getCandidates')->middleware('role:user');

Route::get('success_vote', function(){
    return view('success_vote');
})->middleware('guest');

Route::get('user_voted', function(){
    return view('user_voted');
})->middleware('guest');

Route::post('voting/', 'App\Http\Controllers\VoteController@voteCandidate')->middleware('role:user')->name('voting');
Route::get('list_summary/{id}', [VotingSummaryController::class, 'getSummary']);
Route::middleware('role:admin')->group(function(){
    Route::get('/voterData', 'App\Http\Controllers\VoterDataController@index');
    Route::get('/dashboard', 'App\Http\Controllers\VotingDataController@index');
    Route::get('/summary', 'App\Http\Controllers\VotingSummaryController@index');
    Route::resource('/posts', PostController::class);
    Route::resource('/votes', VoteController::class);
    Route::resource('/candidates', CandidateController::class);
    Route::resource('/users', UserController::class);
    Route::put('endvotes/{id}', 'App\Http\Controllers\VoteController@endvotes')->name('endvotes');
    Route::put('startvotes/{id}', 'App\Http\Controllers\VoteController@startvotes')->name('startvotes');
    Route::post('/logout', 'App\Http\Controllers\AuthController@adminLogout')->name('logout');
});

