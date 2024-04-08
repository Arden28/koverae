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
        Schema::create('pos_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('pos_id')->nullable();
            $table->string('unique_token')->unique()->nullable(); //Jeton unique de la session
            $table->unsignedBigInteger('open_by_id')->nullable();
            $table->unsignedBigInteger('journal_id')->nullable();
            $table->date('start_date')->nullable();
            $table->date('closing_date')->nullable();
            $table->decimal('starting_balance', $precision = 12, $scale = 2)->default(0.00);
            $table->decimal('closing_balance', $precision = 12, $scale = 2)->default(0.00);
            $table->enum('status', ['active', 'close_soon', 'closed', 'cancelled'])->default('active');

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('pos_id')->references('id')->on('pos')->cascadeOnDelete();
            // $table->foreign('open_by_id')->references('id')->on('employees')->cascadeOnDelete();
            $table->foreign('journal_id')->references('id')->on('journals')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pos_sessions', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
