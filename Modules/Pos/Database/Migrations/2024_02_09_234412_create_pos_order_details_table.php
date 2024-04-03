<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pos_order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pos_order_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('description')->nullable();
            $table->decimal('quantity', $precision = 12, $scale = 2);
            $table->decimal('price', $precision = 12, $scale = 2);
            $table->decimal('unit_price', $precision = 12, $scale = 2);
            $table->decimal('sub_total', $precision = 12, $scale = 2);
            $table->decimal('product_discount_amount', $precision = 12, $scale = 2);
            $table->string('product_discount_type')->default('fixed');
            $table->decimal('product_tax_amount', $precision = 12, $scale = 2);
            $table->mediumText('customer_note')->nullable();
            $table->decimal('refunded_quantity', $precision = 12, $scale = 2)->default(0.00);

            $table->foreign('pos_order_id')->references('id')->on('pos_orders')->cascadeOnDelete();
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
        Schema::table('pos_order_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
