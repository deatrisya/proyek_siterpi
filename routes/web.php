<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FarmController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('home');
});

Auth::routes();

Route::group(['middleware'=>'auth'],function() {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::resource('farm',FarmController::class);
    Route::post('farm-data',[FarmController::class,'data']);

    Route::get('farms-pdf', [FarmController::class, 'pdf'])->name('farm.pdf');
    Route::get('farms-excel', [FarmController::class, 'excel'])->name('farm.excel');

});
