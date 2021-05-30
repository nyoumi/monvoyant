<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoyantController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;




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

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('voyants', VoyantController::class);
});
Route::get('/pay', [PaymentController::class, 'index'])->middleware(['auth'])->name('pay');
Route::get('/chat/{id}', [ChatController::class, 'index'])->middleware(['auth'])->name('chat');

Route::post('/sendMessage', [ChatController::class, 'sendMessage'])->name('sendMessage');
Route::post('/refresh', [ChatController::class, 'refresh'])->middleware(['auth'])->name('refresh');

Route::post('/transaction', [PaymentController::class, 'makePayment'])->middleware(['auth'])->name('make-payment');

require __DIR__.'/auth.php';
