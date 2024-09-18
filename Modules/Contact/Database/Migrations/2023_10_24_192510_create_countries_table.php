<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('common_name');
            $table->string('official_name');
            $table->string('country_code');
            $table->string('currency_code')->nullable();
            $table->string('country_calling_code')->nullable();
            $table->string('googleMaps')->nullable();
            $table->string('openStreetMaps')->nullable();
            $table->string('vat_label')->nullable();
            $table->boolean('zip_required')->default(true);
            $table->boolean('state_required')->default(false);
            $table->string('flag');
            $table->enum('start_of_week', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']);

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
