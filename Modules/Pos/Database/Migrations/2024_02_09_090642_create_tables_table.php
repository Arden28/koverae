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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pos_id')->nullable();
            $table->unsignedBigInteger('floor_plan_id')->nullable();
            $table->string('table_name');
            $table->integer('seats')->default(1);
            $table->enum('shape', ['square', 'circle', 'rectangle', 'hexagon', 'octagon'])->default('square');

            $table->foreign('pos_id')->references('id')->on('pos')->cascadeOnDelete();
            $table->foreign('floor_plan_id')->references('id')->on('floor_plans')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('floor_plan_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
