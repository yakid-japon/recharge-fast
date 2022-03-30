<?php

use App\Http\Controllers\Achat;
use App\Http\Controllers\Authentification;
use App\Http\Controllers\contact;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\sex;
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
    return view('index');
});
Route::get('/valide', function () {
    return view('valide');
});
Route::get('/achat', [Achat::class, 'achat'])->name('achat');
Route::get('/authentification', [Authentification::class, 'auth'])->name('auth');
Route::get('/contact', [contact::class, 'contact'])->name('contact');
Route::get('/sex', [sex::class, 'sex'])->name('sex');


Route::get("message", "MessageController@formMessageGoogle");
Route::post("message", [MessageController::class, 'sendMessageGoogle'])->name('send.message.google');
