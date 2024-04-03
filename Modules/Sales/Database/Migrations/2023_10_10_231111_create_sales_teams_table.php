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
        Schema::create('sales_teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('name');
            $table->foreignId('team_leader_id')->nullable();
            $table->string('email_alias')->nullable();
            $table->integer('invoice_target')->default(0);

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            // $table->foreign('team_leader_id')->references('id')->on('sales_people')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_teams', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
