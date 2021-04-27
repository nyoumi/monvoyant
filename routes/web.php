<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/init-deposit', [TransactionController::class, 'initDeposit'])->name('initDept');
    Route::get('/init-withdraw', [TransactionController::class, 'initWithdraw'])->name('initWith');
    Route::post('/deposit', [TransactionController::class, 'deposit'])->name('deposit');
    Route::post('/withdraw', [TransactionController::class, 'withdraw'])->name('withdraw');

    Route::get('/voyant', [VoyantController::class, 'index'])->name('voyant');


});


require __DIR__.'/auth.php';
