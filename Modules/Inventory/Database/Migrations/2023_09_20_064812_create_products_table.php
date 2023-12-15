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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('product_name');
            $table->string('product_code')->nullable();
            $table->string('product_barcode_symbology')->nullable();
            $table->decimal('product_quantity', $precision = 10, $scale = 2)->default(0);
            $table->integer('product_cost')->default(0);
            $table->integer('product_price')->default(0);
            $table->string('product_unit')->nullable();
            $table->integer('product_stock_alert')->default(0);
            $table->integer('product_order_tax')->nullable();
            $table->tinyInteger('product_tax_type')->nullable();
            $table->text('product_description')->nullable();
            $table->text('product_note')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('categories')->restrictOnDelete();

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
        Schema::dropIfExists('products');
    }
};
