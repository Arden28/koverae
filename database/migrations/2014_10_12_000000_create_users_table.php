<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->nullable();
            $table->foreignId('company_id')->nullable();
            $table->unsignedBigInteger('current_company_id')->default(0);
            $table->unsignedBigInteger('current_pos_id')->default(0);

            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_active')->default(1);
            $table->timestamp('last_logged_in_at')->nullable();
            $table->string('locale')->default(config('app.locale'));
            $table->rememberToken();
            // 2FA
            $table->string('two_factor_code')->nullable();
            $table->dateTime('two_factor_expires_at')->nullable();
            // Add a nullable string field to store the IP address from which the user last logged in
            $table->string('last_login_ip')->nullable();

            $table->foreign('team_id')->references('id')->on('teams')->cascadeOnDelete();
            // $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        // Schema::create('personal_access_tokens', function (Blueprint $table) {
        //     $table->id();
            // $table->morphs('tokenable');
            // $table->string('name');
            // $table->string('token', 64)->unique();
            // $table->text('abilities')->nullable();
            // $table->timestamp('last_used_at')->nullable();
            // $table->timestamp('expires_at')->nullable();
            // $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('personal_access_tokens');

    }
}