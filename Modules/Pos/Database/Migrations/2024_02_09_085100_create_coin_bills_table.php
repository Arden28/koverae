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
        Schema::create('coin_bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('pos_id')->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->string('name');
            $table->decimal('value', $precision = 12, $scale = 2)->default(0.00);
            $table->enum('type', ['bill', 'coin'])->default('bill');

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('pos_id')->references('id')->on('pos')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coin_bills', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
