<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/',  [LoginController::class, 'loginPage'])->name('loginPage');
Route::post('login', [LoginController::class, 'login']);
Route::middleware('userAuth')->group(function () {
    Route::get('logout', [LoginController::class, 'logout']);
    Route::get('employees', [EmployeeController::class, 'index']);
    Route::post('employees', [EmployeeController::class, 'store']);
    Route::get('employees/create', [EmployeeController::class, 'create']);
    Route::get('employees/edit/{employee}', [EmployeeController::class, 'edit']);
    Route::get('employees/delete/{employee}', [EmployeeController::class, 'destroy']);
    Route::post('employees/update/{employee}', [EmployeeController::class, 'update']);
    Route::get('employees/show/{employee}', [EmployeeController::class, 'show']);
});
