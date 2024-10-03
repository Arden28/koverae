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
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('default_currency_id')->nullable();
            $table->string('fiscal_country')->default('KE'); // Default is Kenya
            $table->string('default_currency')->nullable();
            $table->string('name');
            $table->string('reference')->nullable();
            $table->boolean('personal_company')->default(true);
            $table->string('domain_name')->nullable();
            $table->string('website_url')->nullable();
            $table->boolean('is_self_hosted')->default(false); // Si le domaine est hébergé par le kover
            $table->boolean('enabled')->default(true);
            $table->enum('status', ['active', 'suspended', 'banished'])->default('active');
            // Company Information
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('phone_2')->unique()->nullable();
            $table->text('address')->nullable();
            $table->string('website')->unique()->nullable();
            $table->text('city')->nullable();
            $table->string('country')->nullable();
            $table->text('industry')->nullable();
            $table->string('size')->nullable();
            $table->string('primary_interest')->nullable();

            $table->foreign('team_id')->references('id')->on('teams')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });

        // Schema::create('company_users', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('company_id');
        //     $table->foreignId('user_id');
        //     $table->foreignId('team_id')->nullable();
        //     $table->string('role')->nullable();
        //     $table->timestamps();

        //     $table->unique(['company_id', 'user_id']);
        // });

        Schema::create('company_invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('email');
            $table->string('role')->nullable();
            $table->string('token')->unique();
            $table->timestamp('expire_at')->nullable();
            $table->timestamps();

            $table->unique(['email']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
        Schema::dropIfExists('company_invitations');
    }
};