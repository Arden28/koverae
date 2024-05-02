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
        Schema::create('attribute_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('attribute_id')->nullable();
            $table->string('name');
            $table->boolean('is_characteristic')->default(false);
            $table->string('color')->nullable();
            $table->string('image_path')->nullable();
            $table->decimal('additional_price', $precision = 10, $scale = 2)->default(0);
            $table->enum('status', ['active', 'inactive', 'disabled'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_values');
    }
};
