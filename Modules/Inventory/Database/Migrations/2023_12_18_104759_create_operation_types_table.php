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
        Schema::create('operation_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('name');
            $table->enum('operation_type', ['receipt', 'delivery', 'internal_transfer']);
            $table->string('prefix');
            $table->unsignedBigInteger('return_type_id')->nullable();
            $table->enum('backorder', ['ask', 'always', 'never']);
            // Hardware

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
        Schema::table('operation_types', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
