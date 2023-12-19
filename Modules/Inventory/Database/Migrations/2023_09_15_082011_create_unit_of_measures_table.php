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
        Schema::create('unit_of_measures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('uom_category_id')->nullable();
            $table->string('name');
            $table->enum('type', ['bigger', 'reference', 'smaller']); //bigger: bigger than the reference uom, refenrence: is the reference uom, smaller: smaller than the reference
            $table->decimal('ratio', $precision = 12, $scale = 2)->default(1);
            $table->decimal('rounding_position', $precision = 12, $scale = 2)->default(1);

            $table->foreign('company_id')->references('id')->on('companies')->nullOnDelete();
            $table->foreign('uom_category_id')->references('id')->on('unit_of_measure_categories')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unit_of_measures', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
