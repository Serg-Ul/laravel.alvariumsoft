<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes(['register' => false, 'verify' => false, 'reset' => false, 'login' => true]);

Route::middleware(['role:admin', 'auth'])->prefix('admin')->group(function () {
    Route::get( '/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('homeAdmin'); // admin
    Route::get( '/employees/{department}', [\App\Http\Controllers\Admin\EmployeesController::class, 'show'])->name('departmentEmployees');
    Route::post( '/import-employees', [\App\Http\Controllers\Admin\EmployeesController::class, 'import'])->name('employees.import');
    Route::get( '/truncate-employees', [\App\Http\Controllers\Admin\EmployeesController::class, 'truncate'])->name('employees.truncate');
    Route::resources([
        'departments' => \App\Http\Controllers\Admin\DepartmentsController::class,
        'employees' => \App\Http\Controllers\Admin\EmployeesController::class
    ]);
});

Route::redirect('/', 'login');
