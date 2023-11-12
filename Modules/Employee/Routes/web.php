<?php

use Illuminate\Support\Facades\Route;
use Modules\Employee\Http\Controllers\EmployeeController;
use Modules\Employee\Http\Controllers\DepartmentController;
use Modules\Employee\Http\Controllers\JobController;
use Modules\Employee\Http\Controllers\WorkplaceController;
use Modules\Employee\Livewire\Employees\Employee as EmployeeEmployee;

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


Route::prefix('employee')->middleware(['module:employee'])->name('employee.')->group(function() {
    // Route::get('/', EmployeeEmployee::class)->name('employee');

    // Employees
    Route::get('/create', [EmployeeController::class, 'create'])->name('create');
    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('/show', [EmployeeController::class, 'show'])->name('show');

    // Department
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::get('/departments', [DepartmentController::class, 'index'])->name('department.index');
    Route::get('/departments/show', [DepartmentController::class, 'show'])->name('department.show');

    // Workplace
    Route::get('/workplaces/create', [WorkplaceController::class, 'create'])->name('workplaces.create');
    Route::get('/workplaces', [WorkplaceController::class, 'index'])->name('workplaces.index');
    Route::get('/workplaces/show', [WorkplaceController::class, 'show'])->name('workplaces.show');

    // Jobs
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/show', [JobController::class, 'show'])->name('jobs.show');

    // JobTypes
    Route::get('/jobTypes/create', [WorkplaceController::class, 'create'])->name('jobTypes.create');
    Route::get('/jobTypes', [WorkplaceController::class, 'index'])->name('jobTypes.index');
    Route::get('/jobTypes/show', [WorkplaceController::class, 'show'])->name('jobTypes.show');
});
