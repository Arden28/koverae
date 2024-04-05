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
        Schema::create('journal_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('journal_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('journal_entry');
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->string('label');
            $table->decimal('debit', $precision = 12, $scale = 2)->default(0);
            $table->decimal('credit', $precision = 12, $scale = 2)->default(0);
            $table->decimal('balance', $precision = 12, $scale = 2)->default(0);
            $table->boolean('is_matching')->default(false);
            $table->enum('status', ['draft', 'posted', 'cancelled'])->default('posted');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('journal_entries', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
