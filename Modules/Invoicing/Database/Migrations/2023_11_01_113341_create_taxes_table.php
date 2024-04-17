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
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->enum('type', ['sales', 'purchases', 'misc', 'none'])->default('none');
            $table->enum('scope_tax', ['goods', 'interventions'])->nullable();
            $table->enum('calculation_type', ['fixed', 'percentage'])->default('fixed');
            $table->enum('application_type', ['inclusive', 'exclusive'])->default('exclusive');
            $table->decimal('amount', $precision = 12, $scale = 2)->default(0);
            $table->string('wording_on_invoice')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('taxes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
