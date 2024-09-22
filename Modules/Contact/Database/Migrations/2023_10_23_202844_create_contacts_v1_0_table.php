<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Countries
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('common_name');
            $table->string('official_name');
            $table->string('country_code');
            $table->string('currency_code')->nullable();
            $table->string('country_calling_code')->nullable();
            $table->string('googleMaps')->nullable();
            $table->string('openStreetMaps')->nullable();
            $table->string('vat_label')->nullable();
            $table->boolean('zip_required')->default(true);
            $table->boolean('state_required')->default(false);
            $table->string('flag');
            $table->enum('start_of_week', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']);

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
            $table->softdeletes();
        });
        // States
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('country_id');
            $table->string('name');
            $table->string('state_code');

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnDelete();
            $table->timestamps();
            $table->softdeletes();
        });
        // Country Groups
        Schema::create('country_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->foreignId('country_id');
            $table->foreignId('pricelist_id');
            $table->string('name');
            $table->string('state_code');

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
            $table->softdeletes();
        });
        // Bank
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('avatar')->nullable();
            $table->string('name');
            $table->string('bic')->nullable(); // Also called Swift
            // Contact
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            // Address
            $table->string('street')->nullable();
            $table->string('street2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country_id')->nullable();
            $table->string('zip')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
            $table->softdeletes();
        });
        // Bank Account
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('bank_id');
            $table->unsignedBigInteger('contact_id');
            $table->string('account_number');
            $table->string('account_holder_name')->nullable();
            $table->boolean('can_send_money')->default(false);

            // $table->foreign('contact_id')->references('id')->on('contacts')->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->cascadeOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
            $table->softdeletes();
        });
        // Honorific Ttitles
        Schema::create('honorific_titles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('title');
            $table->string('abbreviation');

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
            $table->softdeletes();
        });
        // Industries
        Schema::create('industries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('name');
            $table->string('full_name');

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
            $table->softdeletes();
        });
        // Contacts
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id')->nullable();
            // $table->boolean('is_company')->default(1);
            $table->string('avatar')->nullable();
            $table->string('first_name')->nullable();
            $table->string('name')->nullable();
            $table->string('company_name')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            // Address
            $table->string('street')->nullable();
            $table->string('street2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('zip')->nullable();
            // Accounting
            $table->string('tax_id')->nullable();
            // Contact Info
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('tags')->nullable();
            // Individual
            $table->string('job')->nullable();
            $table->unsignedBigInteger('title_id')->nullable();
            // Sales & Purchase
            $table->unsignedBigInteger('seller_id')->nullable(); //seller in charge of this contact
            $table->unsignedBigInteger('sale_payment_term_id')->nullable(); //this payment term will be used instead of the defzult payment term
            $table->unsignedBigInteger('pricelist_id')->nullable(); //this price list will be used instead of the defzult price list
            $table->unsignedBigInteger('buyer_id')->nullable(); //buyer in charge of this contact
            $table->unsignedBigInteger('purchase_payment_term_id')->nullable();//this payment term will be used instead of the defzult payment term
            $table->boolean('has_receipt_reminder')->default(false);
            $table->integer('days_before')->default(0);
            // Fiscal
            $table->string('fiscal_position')->nullable();
            // MISC
            $table->string('companyID')->nullable();
            $table->string('reference')->nullable();
            // Accounting Entries
            $table->unsignedBigInteger('account_receivable')->nullable(); //this payment term will be used instead of the defzult payment term
            $table->unsignedBigInteger('account_payable')->nullable(); //this payment term will be used instead of the defzult payment term

            $table->mediumText('note')->nullable();
            // Type Bool
            $table->boolean('is_supplier')->default(false);
            $table->boolean('is_customer')->default(false);
            $table->enum('type', ['individual', 'company'])->default('company');

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            // $table->foreign('title_id')->references('id')->on('honorific_titles')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
        // Contact Addresses
        Schema::create('contact_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('contact_id');
            $table->enum('contact_type', ['contact', 'invoice-address', 'delivery-address', 'other-address'])->default('invoice-address');
            // Contact Info
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            //Individual Information
            $table->string('job')->nullable();
            $table->string('title')->nullable();
            // Address
            $table->string('street')->nullable();
            $table->string('street2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('zip')->nullable();

            $table->text('note')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
        // Contacts Tags
        Schema::create('contact_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->foreignId('parent_id')->nullable();
            $table->string('name');
            $table->string('color')->nullable();
            $table->boolean('is_active')->default(true);

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
            $table->softdeletes();
        });
        // Suppliers
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('contact_id');

            // $table->foreign('contact_id')->references('id')->on('contacts')->cascadeOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
            $table->softdeletes();
        });
        // Customers
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('contact_id');

            // $table->foreign('contact_id')->references('id')->on('contacts')->cascadeOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('states', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('country_groups', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('banks', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('bank_accounts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('honorific_titles', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('industries', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('contact_adresses', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('contact_tags', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('customers', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
