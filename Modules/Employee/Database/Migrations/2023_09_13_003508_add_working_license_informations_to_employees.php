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
        Schema::table('employees', function (Blueprint $table) {
            $table->string('visa_no')->nullable()->after('is_resident');
            $table->string('work_permit_no')->nullable()->after('visa_no');
            $table->string('visa_expiration_date')->nullable()->after('work_permit_no');
            $table->string('work_permit_expiration_date')->nullable()->after('visa_expiration_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {

        });
    }
};
