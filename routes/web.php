<?php

use App\Http\Controllers\MainHomeController;
use App\Http\Controllers\AboutUsController;
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
    return view('dashboard');
})->name('dashboard');

Route::resource('aboutUs', AboutUsController::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('mainHome', MainHomeController::class);

});
