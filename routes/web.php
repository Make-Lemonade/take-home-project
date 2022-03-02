<?php

use App\Http\Controllers\OrdersController;
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

Route::group([
    'middleware' => [], // currently, not handling users, assuming test is for orders front/back-ends
    'prefix' => '',
], function () {
    Route::get('/', [OrdersController::class, 'index'])->name('orders.index');
});