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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable();
            $table->string('name');

            $table->unsignedBigInteger('head_id')->nullable();
            $table->foreign('head_id')->references('id')->on('employees')->onDelete('set null');

            $table->unsignedBigInteger('parent_id')->nullable();
            // $table->foreign('parent_id')->references('id')->on('department')->onDelete('set null');

            $table->timestamps();

            // $table->unique(['company_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
};
