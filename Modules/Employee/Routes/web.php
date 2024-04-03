<?php

use Illuminate\Support\Facades\Route;
use Modules\Employee\Http\Controllers\WorkplaceController;
use Modules\Employee\Livewire\Department\Lists as DepartmentLists;
use Modules\Employee\Livewire\Department\Create as DepartmentCreate;
use Modules\Employee\Livewire\Department\Show as DepartmentShow;

use Modules\Employee\Livewire\Employees\Lists as EmployeeLists;
use Modules\Employee\Livewire\Employees\Create as EmployeeCreate;
use Modules\Employee\Livewire\Employees\Show as EmployeeShow;
use Modules\Employee\Livewire\Workplace\Lists as WorkplaceLists;
use Modules\Employee\Livewire\Workplace\Show as WorkplaceShow;
use Modules\Employee\Livewire\Workplace\Create as WorkplaceCreate;

use Modules\Employee\Livewire\Job\Lists as JobLists;
use Modules\Employee\Livewire\Job\Create as JobCreate;
use Modules\Employee\Livewire\Job\Show as JobShow;
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


Route::prefix('employees')->name('employee.')->group(function() {
    // Route::get('/', EmployeeEmployee::class)->name('employee');

    Route::get('/', EmployeeLists::class)->name('index');
    Route::get('/departments', DepartmentLists::class)->name('department.index');
    Route::get('/jobs', JobLists::class)->name('jobs.index');
    Route::get('/workplaces', WorkplaceLists::class)->name('workplaces.index');
    Route::get('/jobTypes', [WorkplaceController::class, 'index'])->name('jobTypes.index');

    // Employees
    Route::get('/create', EmployeeCreate::class)->name('create');
    Route::get('/{employee}', EmployeeShow::class)->name('show');

    // Department
    Route::get('/departments/create', DepartmentCreate::class)->name('department.create');
    Route::get('/departments/{department}', DepartmentShow::class)->name('department.show');

    // Workplace
    Route::get('/workplaces/create', WorkplaceCreate::class)->name('workplaces.create');
    Route::get('/workplaces/{workplace}', WorkplaceShow::class)->name('workplaces.show');

    // Jobs
    Route::get('/jobs/create', JobCreate::class)->name('jobs.create');
    Route::get('/jobs/{job}', JobShow::class)->name('jobs.show');

    // JobTypes
    Route::get('/jobTypes/create', [WorkplaceController::class, 'create'])->name('jobTypes.create');
    Route::get('/jobTypes/show', [WorkplaceController::class, 'show'])->name('jobTypes.show');
});
