<?php

use App\Http\Controllers\APIDemoController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello world!';
});

Route::get('/hello_controller', [HelloController::class, 'index']);

Route::resource('student', StudentController::class)->middleware('auth');

Route::resource('apidemo', APIDemoController::class);

Route::get('/login', [LoginController::class, 'doGet'])->name('login');

Route::post('/login', [LoginController::class, 'doPost'])->name('login.auth');

Route::get('/logout', [LoginController::class, 'doLogout'])->name('logout');

