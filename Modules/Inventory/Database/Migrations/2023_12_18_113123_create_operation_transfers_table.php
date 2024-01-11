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
        Schema::create('operation_transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->string('reference');
            $table->unsignedBigInteger('received_from')->nullable();
            $table->unsignedBigInteger('in_direction_to')->nullable();
            $table->unsignedBigInteger('operation_type_id')->nullable();
            $table->dateTime('schedule_date')->nullable();
            $table->dateTime('effective_date')->nullable();
            $table->string('source_document')->nullable();
            $table->enum('shipping_policy', ['as_soon_as_possible', 'after_done'])->default('as_soon_as_possible');
            $table->unsignedBigInteger('responsible_id')->nullable();
            $table->text('note')->nullable();
            $table->enum('status', ['draft', 'ready', 'done', 'cancelled'])->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('contact_id')->references('id')->on('contacts')->nullOnDelete();
            $table->foreign('operation_type_id')->references('id')->on('operation_types')->cascadeOnDelete();
            $table->foreign('responsible_id')->references('id')->on('contacts')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operation_transfers', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
