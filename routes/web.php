<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MedicalListController;
use App\Http\Controllers\WarningQuantityController;

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

// Route::get('/', function () {
//     return view('backend.dashboard');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){

    Route::get('/',[HomeController::class,'dashboard'])->name('dashboard');

    Route::resource('/customers',CustomerController::class);

    Route::resource('/categories',CategoryController::class);

    Route::resource('/medical-lists',MedicalListController::class);

    Route::get('/refill/{id}',[MedicalListController::class,'refill'])->name('refill');

    Route::resource('/warning-quantities',WarningQuantityController::class);
});
