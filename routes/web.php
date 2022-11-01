<?php

use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\BranchController;
use App\Http\Controllers\Web\EmployeeController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\DesignationController;
use App\Http\Controllers\Web\ReportController;
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

Route::get('home', [DashboardController::class, 'index'])->name('home');
Route::get('admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('admin/create', [AdminController::class, 'store'])->name('admin.store');
Route::get('admin/list', [AdminController::class, 'list'])->name('admin.list');

Route::get('employee/list', [EmployeeController::class, 'list'])->name('employee.list');

Route::resource('designation', DesignationController::class);
Route::resource('branch', BranchController::class);

//---------------------- Advance Report  ---------------------------------------------//
Route::get('/report', [ReportController::class, 'index'])->name('report');
Route::post('/report', [ReportController::class, 'data'])->name('get.report');

// Undefined Routes
Route::get('/{url}', function () {
    abort(404);
});
