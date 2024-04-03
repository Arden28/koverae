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
        Schema::create('pos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('active_session_id')->nullable();
            $table->string('name');
            $table->boolean('has_multiple_employee')->default(false);
            $table->boolean('has_printer_connection')->default(false);
            $table->string('private_key');
            $table->enum('status', ['active', 'inactive', 'closed', 'on_break'])->default('inactive');
            $table->boolean('is_restaurant')->default(false);

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
        Schema::table('pos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
