<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('email')->unique()->nullable()->after('name');
            $table->string('phone')->unique()->nullable()->after('email');
            $table->string('phone_2')->unique()->nullable()->after('phone');
            $table->text('address')->nullable()->after('phone');
            $table->text('city')->nullable()->after('phone');
            $table->text('country')->nullable()->after('phone');

            $table->text('domain')->nullable()->after('address');
            $table->string('size')->nullable()->after('domain');
            $table->string('primary_interest')->nullable()->after('size');
            $table->string('default_currency')->nullable()->after('primary_interest');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
