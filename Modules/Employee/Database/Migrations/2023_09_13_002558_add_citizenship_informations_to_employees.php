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
            $table->string('nationality')->nullable()->after('contact_email');
            $table->string('national_id')->nullable()->after('nationality');
            $table->string('passport_no')->nullable()->after('national_id');
            $table->string('gender')->nullable()->after('passport_no');
            $table->string('birthday')->nullable()->after('gender');
            $table->string('birth_place')->nullable()->after('birthday');
            $table->string('birth_country')->nullable()->after('birth_place');
            $table->string('is_resident')->nullable()->after('birth_country');
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
