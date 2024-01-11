<?php

use App\Livewire\Company\EditForm;
use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\SettingsController;
use Modules\Settings\Livewire\General;
use Modules\Settings\Livewire\GeneralSetting;
use Modules\Settings\Livewire\Module\Inventory;
use Modules\Settings\Livewire\User\Lists;

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

// Route::prefix('web')->middleware(['auth'])->group(function() {

// });
// Route::prefix('settings')->group(function() {
// });
Route::get('/settings/users', Lists::class)->name('settings.users');

Route::get('/settings', GeneralSetting::class)->name('settings.general');


Route::get('/settings/{pageVariable}', Inventory::class);

Route::get('settings/company/{company}', EditForm::class)->name('settings.edit-company');
