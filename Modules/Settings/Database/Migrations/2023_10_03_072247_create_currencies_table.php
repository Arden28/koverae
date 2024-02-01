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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->string('currency_name');
            $table->string('code')->nullable();
            $table->string('symbol');
            $table->string('thousand_separator')->default('.');
            $table->enum('symbol_position', ['prefix', 'suffix'])->default('suffix');
            $table->string('decimal_separator')->default(',');
            $table->integer('exchange_rate')->default(1);

            // $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
};
