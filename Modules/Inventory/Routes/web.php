<?php

use Illuminate\Support\Facades\Route;
use Modules\Inventory\Http\Controllers\InventoryController;
use Modules\Inventory\Livewire\Overview;

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


Route::middleware(['module:inventory'])->group(function() {
    // Inventory
    Route::get('inventory', Overview::class)->name('inventory.index');

    // Route::prefix('inventory')->name('inventory.')->group(function(){
    //     //
    // });
});
