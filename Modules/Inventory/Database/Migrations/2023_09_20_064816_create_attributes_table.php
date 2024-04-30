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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('name');
            $table->enum('display_type', ['radio', 'square_button', 'multiple_checkboxes', 'select', 'color'])->default('radio');
            $table->enum('variant_method', ['instantly', 'dynamic', 'never'])->default('instantly');
            $table->enum('status', ['active', 'disabled'])->default('active');

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attributes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
