<?php

use App\Http\Controllers\AircraftController;
use App\Http\Controllers\LoginController;
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
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('aircraft/create', [AircraftController::class, 'createAircraft'])->name('aircraft-create');;
    Route::get('aircraft/edit/{id}', [AircraftController::class, 'editAircraft']);
});
//Auth routes
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('auth-login', [LoginController::class, 'authenticate'])->name('auth-login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
