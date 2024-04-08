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
        Schema::create('pos_payment_methods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('journal_id')->nullable();
            $table->string('name');
            $table->string('image_path')->nullable();
            $table->boolean('is_available_online')->default(false);
            $table->boolean('should_be_identified')->default(false);
            $table->enum('integration', ['none', 'terminal'])->default('none');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pos_payment_methods', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
