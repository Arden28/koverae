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
        Schema::create('sales_team_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('sales_team_id');
            $table->unsignedBigInteger('user_id'); // Assuming user_id for team members
            $table->timestamps();
            $table->softDeletes();

            // Define foreign key constraints
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('sales_team_id')->references('id')->on('sales_teams')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_team_members', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
