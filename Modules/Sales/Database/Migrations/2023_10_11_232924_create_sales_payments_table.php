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
        Schema::create('sales_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('sale_id');
            $table->decimal('amount', $precision = 12, $scale = 2);
            $table->decimal('left_to_pay', $precision = 12, $scale = 2);
            $table->date('date');
            $table->string('reference');
            $table->string('payment_method');
            $table->text('note')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('sale_id')->references('id')->on('sales')->cascadeOnDelete();

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
        Schema::table('sales_payments', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
