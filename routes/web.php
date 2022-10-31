<?php

use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\DashboardController;
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

Route::get('home', [DashboardController::class, 'index']);
Route::get('admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('admin/create', [AdminController::class, 'store'])->name('admin.store');
Route::get('admin/list', [AdminController::class, 'list'])->name('admin.list');
