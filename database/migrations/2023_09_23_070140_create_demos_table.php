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
        Schema::create('demos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('country');
            $table->string('phone');
            $table->string('industry');
            $table->string('size');
            $table->string('primary_interest');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demos');
    }
};
