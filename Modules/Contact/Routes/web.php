<?php

use Illuminate\Support\Facades\Route;
use Modules\Contact\Http\Controllers\ContactController;
use Modules\Contact\Livewire\Contact\Contact;
use Modules\Contact\Livewire\Contact\Create as CreateContact;
use Modules\Contact\Livewire\Contact\Show as ShowContact;
use Modules\Contact\Livewire\HonorificTitle\Lists as TitleLists;
use Modules\Contact\Livewire\Industries\Lists as IndustryLists;
use Modules\Contact\Livewire\Tag\Lists as TagLists;
use Modules\Contact\Livewire\Tag\Create as TagCreate;
use Modules\Contact\Livewire\Tag\Show as ShowTag;
use Modules\Contact\Livewire\Country\Lists as CountryLists;
use Modules\Contact\Livewire\Bank\Lists as BankLists;
use Modules\Contact\Livewire\Bank\Create as BankCreate;
use Modules\Contact\Livewire\Bank\Show as BankShow;
use Modules\Contact\Livewire\Bank\Account\Lists as BankAccountLists;
use Modules\Contact\Livewire\Bank\Account\Create as BankAccountCreate;
use Modules\Contact\Livewire\Bank\Account\Show as BankAccountShow;

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

Route::middleware(['module:contact'])->group(function() {
    // Contacts
    Route::get('contacts', Contact::class)->name('contacts.index');
    Route::get('contacts-titles', TitleLists::class)->name('contacts.titles.index');
    Route::get('industries', IndustryLists::class)->name('contacts.industries.index');
    Route::get('/contacts/tags', TagLists::class)->name('contacts.tags.index');
    Route::get('/countries', CountryLists::class)->name('contacts.countries.index');
    // Bank
    Route::get('/banks', BankLists::class)->name('contacts.banks.index');
    Route::get('/banks/create', BankCreate::class)->name('contacts.banks.create');
    Route::get('/banks/{bank}', BankShow::class)->name('contacts.banks.show');
    // Bank Account
    Route::get('/bank-accounts', BankAccountLists::class)->name('contacts.banks.accounts.index');
    Route::get('/bank-accounts/create', BankAccountCreate::class)->name('contacts.banks.accounts.create');
    Route::get('/bank-accounts/{account}', BankAccountShow::class)->name('contacts.banks.accounts.show');


    Route::prefix('contacts')->name('contacts.')->group(function(){
        Route::get('/create', CreateContact::class)->name('create');
        Route::get('/{contact}', ShowContact::class)->name('show');
        // TAGS
        Route::get('/tags/create', TagCreate::class)->name('tags.create');
        Route::get('/tags/{tag}', ShowTag::class)->name('tags.show');
    });

});
