<?php

use App\Events\ServerCreated;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Auth\Events\Registered;
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
Route::get('/', [Admin::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/test', function() {
    ServerCreated::dispatch('hai');
    echo 'Test';
});

Route::get('/register', [RegisteredUserController::class,'create'] )->name('register');

require __DIR__.'/auth.php';
