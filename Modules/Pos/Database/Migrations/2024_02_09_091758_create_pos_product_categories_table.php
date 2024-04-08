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
        Schema::create('pos_product_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('pos_id')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('parent_category_id')->nullable();
            $table->integer('available_start')->default(0);
            $table->integer('available_end')->default(24);
            $table->string('image_path')->nullable();

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
        Schema::table('pos_product_categories', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
