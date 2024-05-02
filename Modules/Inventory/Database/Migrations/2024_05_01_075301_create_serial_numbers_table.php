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
        Schema::create('serial_numbers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('reference');
            $table->string('internal_reference')->nullable();
            $table->unsignedBigInteger('in_direction_to')->nullable();
            $table->unsignedBigInteger('from')->nullable();
            $table->decimal('quantity', $precision = 10, $scale = 2)->default(0);
            $table->text('description')->nullable();
            $table->dateTime('alert_date')->nullable();
            $table->dateTime('best_use_date')->nullable();
            $table->dateTime('collection_date')->nullable();
            $table->dateTime('expiration_date')->nullable();

            $table->foreign('product_id')->references('id')->on('products')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('serial_numbers', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
