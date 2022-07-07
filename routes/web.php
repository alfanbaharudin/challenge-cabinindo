<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;

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
    // return view('welcome');
    return view('login');
});

Route::get('/home', function () {
    return redirect('employee');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authenticate'])->name('authenticate');
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'registerStore'])->name('registerStore');
});


Route::middleware('auth')->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
    Route::get('/employee-user', [EmployeeController::class, 'index2'])->name('employee-user');
    Route::post('/created', [EmployeeController::class, 'created'])->name('created');
    Route::post('/updated/{id}', [EmployeeController::class, 'updated'])->name('updated');
    Route::get('/deleted/{id}', [EmployeeController::class, 'deleted'])->name('deleted');
});