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
        Schema::create('customer_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_invoice_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('product_name');
            $table->string('label');
            $table->decimal('quantity', $precision = 12, $scale = 2);
            $table->decimal('price', $precision = 12, $scale = 2);
            $table->decimal('unit_price', $precision = 12, $scale = 2);
            $table->decimal('sub_total', $precision = 12, $scale = 2);
            $table->decimal('product_discount_amount', $precision = 12, $scale = 2);
            $table->string('product_discount_type')->default('fixed');
            $table->decimal('product_tax_amount', $precision = 12, $scale = 2);

            $table->foreign('customer_invoice_id')->references('id')->on('customer_invoices')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->nullOnDelete();

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
        Schema::table('customer_invoice_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
