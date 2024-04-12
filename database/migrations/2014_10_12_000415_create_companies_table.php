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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->string('name');
            $table->string('reference')->nullable();
            $table->boolean('personal_company')->default(true);
            $table->string('domain_name');
            $table->string('website_url')->nullable();
            $table->boolean('is_self_hosted')->default(false); // Si le domaine est hébergé par le kover
            $table->boolean('enabled')->default(1);
            // Company Information
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('phone_2')->unique()->nullable();
            $table->text('address')->nullable();
            $table->string('website')->unique()->nullable();
            $table->text('city')->nullable();
            $table->text('country')->nullable();

            $table->text('domain')->nullable();
            $table->string('size')->nullable();
            $table->string('primary_interest')->nullable();
            $table->string('default_currency')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
