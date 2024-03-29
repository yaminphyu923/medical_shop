<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RefillController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MedicalListController;
use App\Http\Controllers\PermissionsController;
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

    Route::get('/',[OrderController::class,'index'])->name('order.index');

    Route::get('/menu',[HomeController::class,'dashboard'])->name('dashboard');

    Route::resource('/customers',CustomerController::class);

    Route::get('/customers/delete/{id}',[CustomerController::class,'customerDelete']);

    Route::resource('/categories',CategoryController::class);

    Route::resource('/medical-lists',MedicalListController::class);

    Route::get('/medical_list_export',[MedicalListController::class,'export'])->name('medical_list_export');

    Route::post('/medical_list_import',[MedicalListController::class,'import'])->name('medical_list_import');

    Route::get('/sortByNameAsc',[MedicalListController::class,'sortByNameAsc'])->name('sortByNameAsc');

    Route::get('/sortByNameDesc',[MedicalListController::class,'sortByNameDesc'])->name('sortByNameDesc');

    Route::get('/sortByQtyAsc',[MedicalListController::class,'sortByQtyAsc'])->name('sortByQtyAsc');

    Route::get('/sortByQtyDesc',[MedicalListController::class,'sortByQtyDesc'])->name('sortByQtyDesc');

    Route::get('/sortByPriceAsc',[MedicalListController::class,'sortByPriceAsc'])->name('sortByPriceAsc');

    Route::get('/sortByPriceDesc',[MedicalListController::class,'sortByPriceDesc'])->name('sortByPriceDesc');

    Route::get('/sortByExpAsc',[MedicalListController::class,'sortByExpAsc'])->name('sortByExpAsc');

    Route::get('/sortByExpDesc',[MedicalListController::class,'sortByExpDesc'])->name('sortByExpDesc');

    Route::get('/sortByExpListAsc',[MedicalListController::class,'sortByExpListAsc'])->name('sortByExpListAsc');

    Route::get('/sortByExpListDesc',[MedicalListController::class,'sortByExpListDesc'])->name('sortByExpListDesc');

    Route::get('/sortByQtyListAsc',[MedicalListController::class,'sortByQtyListAsc'])->name('sortByQtyListAsc');

    Route::get('/sortByQtyListDesc',[MedicalListController::class,'sortByQtyListDesc'])->name('sortByQtyListDesc');

    Route::get('/expired-list',[MedicalListController::class,'expiredList'])->name('expiredList');

    Route::get('/qty-list',[MedicalListController::class,'qtyList'])->name('qtyList');

    Route::get('/unit-plus',[MedicalListController::class,'unitPlus'])->name('unit-plus');

    Route::resource('/units',UnitController::class);

    Route::resource('/groups',GroupController::class);

    // Route::get('/searchRefillDate/{id}',[MedicalListController::class,'searchRefillDate'])->name('searchRefillDate');

    Route::resource('/refills',RefillController::class);

    Route::get('/refill/{id}',[MedicalListController::class,'refill'])->name('refill');

    Route::resource('/warning-quantities',WarningQuantityController::class);

    Route::resource('/orders',OrderController::class);

    Route::get('/add-session-cart/{id}',[OrderController::class,'addSessionCart'])->name('add-session-cart');

    Route::get('/remove-session-cart/{id}',[OrderController::class,'removeSessionCart'])->name('remove-session-cart');

    Route::get('/add-qty/{id}',[OrderController::class,'addQty'])->name('add-qty');

    Route::get('/order-lists',[OrderController::class,'orderList'])->name('order-lists');

    Route::get('/order-calculation',[OrderController::class,'orderCalculation'])->name('order-calculation');

    Route::put('/order-update/{id}',[OrderController::class,'orderUpdate'])->name('order-update');

    Route::put('/save-per-update/{id}',[OrderController::class,'savePermanentUpdate'])->name('save-per-update');

    Route::get('/search',[OrderController::class,'search'])->name('search');

    Route::get('/alpha-search/{alpha}',[OrderController::class,'alphaSearch'])->name('alpha-search');

    Route::get('/cal-index',[OrderController::class,'calIndex'])->name('cal-index');

    Route::get('/cal-search',[OrderController::class,'calSearch'])->name('cal-search');

    Route::get('/cal-alpha-search/{alpha}',[OrderController::class,'calAlphaSearch'])->name('cal-alpha-search');

    Route::post('/orders-table',[OrderController::class,'orderTable'])->name('orderTable');

    Route::post('/payout',[OrderController::class,'payOut'])->name('payout');

    Route::post('/print',[OrderController::class,'print'])->name('print');

    Route::get('/print-page',[OrderController::class,'printPage'])->name('print-page');

    Route::get('/a4print-page',[OrderController::class,'a4PrintPage'])->name('a4print-page');

    Route::get('/voucher-list',[OrderController::class,'voucherList'])->name('voucher-list');

    Route::get('/note-list',[OrderController::class,'noteList'])->name('note-list');

    Route::get('/debt-list',[OrderController::class,'debtList'])->name('debt-list');

    Route::delete('/orders-delete',[OrderController::class,'delete'])->name('orders.delete');

    Route::get('/checked-delete',[OrderController::class,'checkedDelete'])->name('checked-delete');

    Route::put('/order-updating/{id}',[OrderController::class,'orderUpdating'])->name('order-updating');

    Route::resource('users', UserController::class);

    Route::resource('roles', RolesController::class);

    Route::resource('permissions', PermissionsController::class);

    Route::post('check-out',[OrderController::class,'checkout'])->name('check-out');

    Route::get('/search-date',[OrderController::class,'searchDate'])->name('search-date');

    Route::get('/medical-search-date',[MedicalListController::class,'searchDate'])->name('medical-search-date');

    Route::get('/today-search',[MedicalListController::class,'todaySearch'])->name('today-search');

    Route::get('/date-search',[MedicalListController::class,'dateSearch'])->name('date-search');

});
