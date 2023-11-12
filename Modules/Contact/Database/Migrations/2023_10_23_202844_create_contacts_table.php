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
            $table->boolean('is_company')->default(1);
            $table->string('name')->nullable();
            $table->string('company_name')->nullable();
            // Address
            $table->string('street')->nullable();
            $table->string('street2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->foreignId('country_id')->nullable();
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
            $table->string('title')->nullable();
            // Sales & Purchase
            $table->unsignedBigInteger('seller_id')->nullable(); //seller in charge of this contact
            $table->string('sale_payment_term')->nullable(); //this payment term will be used instead of the defzult payment term
            $table->string('pricelist')->nullable(); //this price list will be used instead of the defzult price list

            $table->string('purchase_payment_term')->nullable();//this payment term will be used instead of the defzult payment term
            // Fiscal
            $table->string('fiscal_position')->nullable();
            // MISC
            $table->string('companyID')->nullable();
            $table->string('reference')->nullable();
            // Accounting Entries
            $table->string('account_receivable')->nullable(); //this payment term will be used instead of the defzult payment term
            $table->string('account_payable')->nullable(); //this payment term will be used instead of the defzult payment term

            $table->string('note')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
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
