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
            $table->string('street')->nullable()->after('default_role');
            $table->string('street2')->nullable()->after('street');
            $table->string('city')->nullable()->after('street2');
            $table->string('state')->nullable()->after('city');
            $table->string('country')->nullable()->after('state');
            $table->string('personal_email')->nullable()->after('country');
            $table->string('personal_phone')->nullable()->after('personal_email');
            $table->foreignId('bank_account_id')->nullable()->after('personal_phone');
            $table->string('language')->default(config('app.locale'))->after('bank_account_id');
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
