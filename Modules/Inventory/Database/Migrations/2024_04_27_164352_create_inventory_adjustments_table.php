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
        Schema::create('inventory_adjustments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->dateTime('last_counted_date')->nullable();
            $table->dateTime('scheduled_date')->nullable();
            $table->decimal('quantity', $precision = 10, $scale = 2)->default(0);
            $table->decimal('available_quantity', $precision = 10, $scale = 2)->default(0);
            $table->decimal('counted_quantity', $precision = 10, $scale = 2)->default(0);
            $table->decimal('difference', $precision = 10, $scale = 2)->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_adjustments', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
