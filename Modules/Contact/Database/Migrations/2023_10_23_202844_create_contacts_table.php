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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
