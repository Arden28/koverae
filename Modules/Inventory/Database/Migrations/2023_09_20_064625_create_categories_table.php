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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('category_code')->nullable();
            $table->string('category_name');
            $table->unsignedBigInteger('force_removal_strategy_id')->nullable();
            $table->enum('costing_method', ['standard', 'fifo', 'avco']);
            $table->enum('reserve_packagings', ['only_full', 'partial'])->default('only_full'); //Only Full: When a customer order 2 pallets of 100 units each, and you only have 170 in stock, then only 100 will be reserved. Partial: When a customer order 2 pallets of 100 units each, and you only have 170 in stock, 170 will be reserved

            // Accounting
            $table->unsignedBigInteger('income_account_id')->nullable();
            $table->unsignedBigInteger('expense_account_id')->nullable();


            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            // $table->foreign('parent_id')->references('id')->on('categories')->cascadeOnDelete();
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
        Schema::table('categories', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
