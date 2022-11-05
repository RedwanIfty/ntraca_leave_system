<?php

use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\BranchController;
use App\Http\Controllers\Web\EmployeeController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\DesignationController;
use App\Http\Controllers\Web\ApplicationController;
use App\Http\Controllers\Web\SignatureController;
use App\Http\Controllers\Web\ReportController;
use App\Http\Controllers\Web\ScanController;
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

Route::redirect('/', 'home');

Route::get('home', [DashboardController::class, 'index'])->name('home');
Route::post('getNotification', [DashboardController::class, 'getNotification'])->name('getNotification');

Route::get('employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('employee/create', [EmployeeController::class, 'store'])->name('employee.store');

Route::get('admin/list', [AdminController::class, 'list'])->name('admin.list');
Route::get('employee/list', [EmployeeController::class, 'list'])->name('employee.list');

Route::resource('designation', DesignationController::class);
Route::resource('branch', BranchController::class);

//---------------------- Application ---------------------------------------------//
Route::get('application/form', [ApplicationController::class, 'ApplicationForm'])->name('application.form');
Route::post('/weekday-count', [ApplicationController::class, 'WeekDayCount'])->name('WeekDayCount');
Route::post('application/store', [ApplicationController::class, 'ApplicationStore'])->name('application.store');
Route::get('application/own-list', [ApplicationController::class, 'OwnApplicationList'])->name('application.own.list');
Route::post('application/own-list/data', [ApplicationController::class, 'data'])->name('application.own.list.data');
Route::post('application/waiting-list/data', [ApplicationController::class, 'waitingData'])->name('application.waiting.list.data');

Route::get('application/waiting-list', [ApplicationController::class, 'WaitingApplicationList'])->name('application.waiting.list');

Route::get('/pending/application', [ApplicationController::class, 'PendingApplication'])->name('pending.application');
Route::get('/pending/approve/{id}', [ApplicationController::class, 'applicationApprove'])->name('application.approve');
Route::get('/pending/applicationModifyApprove/{id}', [ApplicationController::class, 'applicationModifyApprove'])->name('application.modifyApprove');
Route::post('/pending/applicationModifyApprove/{id}', [ApplicationController::class, 'applicationModifyApproveStore'])->name('application.modifyApproveStore');
Route::get('/application/reject/{id}', [ApplicationController::class, 'rejectApplication'])->name('confirm.reject.application');
Route::post('/application/reject/{id}', [ApplicationController::class, 'rejectApplicationStore'])->name('reject.applicationStore');

Route::get('application/print/{id}', [ApplicationController::class, 'applicationPrint'])->name('application.print');

Route::get('profile', [EmployeeController::class, 'profile'])->name('profile');
Route::post('image-upload', [SignatureController::class, 'signatureUploadPost'])->name('image.upload.post');

//---------------------- Advance Report  ---------------------------------------------//
Route::get('/report', [ReportController::class, 'index'])->name('report');
Route::post('/report', [ReportController::class, 'data'])->name('get.report');

//---------------------- Scan  ---------------------------------------------//
Route::get('user/scan/{id}', [ScanController::class, 'scanedUser'])->name('scan');

// Undefined Routes
Route::get('/{url}', function () {
    abort(404);
});
