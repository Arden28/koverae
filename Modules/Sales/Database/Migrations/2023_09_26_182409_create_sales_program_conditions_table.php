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
        Schema::create('sales_program_conditions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->integer('minimum_qty')->default(0);
            $table->decimal('minimum_purchase', $precision = 12, $scale = 2)->default(0);
            $table->enum('tax', ['included', 'excluded'])->default('included');
            $table->string('products')->nullable();
            $table->string('categories')->nullable();
            $table->unsignedBigInteger('product_tag_id')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('program_id')->references('id')->on('sales_programs')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales_program_conditions', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
