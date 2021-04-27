<?php

<<<<<<< HEAD
=======
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
>>>>>>> 61752209ea97f4cfa820ffaf3d821e5a6e3e8714
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

<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
=======
Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/init-deposit', [TransactionController::class, 'initDeposit'])->name('initDept');
    Route::get('/init-withdraw', [TransactionController::class, 'initWithdraw'])->name('initWith');
    Route::post('/deposit', [TransactionController::class, 'deposit'])->name('deposit');
    Route::post('/withdraw', [TransactionController::class, 'withdraw'])->name('withdraw');

});

>>>>>>> 61752209ea97f4cfa820ffaf3d821e5a6e3e8714

require __DIR__.'/auth.php';
