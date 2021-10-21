<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/email', [App\Http\Controllers\HomeController::class, 'sendEmailApproval'])->name('email');

Route::group(['middleware' =>['adminCheck']], function(){
    Route::get('/system', [App\Http\Controllers\SystemController::class, 'index'])->name('system');
});


