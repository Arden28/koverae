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
        Schema::create('operation_transfer_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('operation_transfer_id')->nullable();
            $table->unsignedBigInteger('in_direction_to')->nullable();
            $table->string('product_name');
            $table->string('description')->nullable();
            $table->date('schedule_date')->nullable();
            $table->date('deadline_date')->nullable();
            $table->decimal('demand', $precision = 10, $scale = 2)->default(0);
            $table->decimal('quantity', $precision = 10, $scale = 2)->default(0);
            $table->boolean('picked')->default(false);

            $table->foreign('product_id')->references('id')->on('products')->nullOnDelete();
            $table->foreign('operation_transfer_id')->references('id')->on('operation_transfers')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operation_transfer_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
