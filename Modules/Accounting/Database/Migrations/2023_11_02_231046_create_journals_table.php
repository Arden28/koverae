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
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('name');
            $table->string('type');
            $table->string('short_code');
            // Accounting Informations
                // Sale
                $table->unsignedBigInteger('defaul_income_account_id')->nullable();
                $table->boolean('dedicated_credit_sequence')->default(false);
                // Purchase
                $table->unsignedBigInteger('defaul_expense_account_id')->nullable();
                //Cash
                $table->unsignedBigInteger('cash_account_id')->nullable();
                $table->unsignedBigInteger('profit_account_id')->nullable();
                $table->unsignedBigInteger('loss_account_id')->nullable();
                $table->boolean('dedicated_payment_sequence')->default(false);
                // Bank
                $table->unsignedBigInteger('bank_account_id')->nullable();
                $table->string('account_number')->nullable();
            //Advanced Settings

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
        Schema::table('journals', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
