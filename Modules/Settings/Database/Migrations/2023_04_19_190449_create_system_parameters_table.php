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
        Schema::create('system_parameters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->enum('account_online_distribution_mode', ['trial', 'production'])->nullable(); //trial or production
            $table->string('account_payment_enable_portal_payment')->nullable();
            $table->boolean('auth_signup_reset_password')->default(true);
            $table->date('database_create_date');
            $table->date('database_expiration_date');
            $table->string('database_expiration_reason')->nullable();
            $table->string('database_secret')->nullable();
            $table->string('database_uuid')->nullable();
            $table->enum('database_type', ['demo', 'test', 'production', 'partnership '])->default('demo');
            $table->enum('database_status', ['active', 'suspended', 'delete', 'blocked'])->default('active');
            $table->boolean('default_digest_email')->default(true);
            $table->integer('default_digest_id')->default(1);
            $table->boolean('hr_presence_login')->default(false);
            $table->string('iap_extract_endpoint')->nullable();
            $table->string('product_price_list_settings')->nullable();
            $table->boolean('product_volume_in_cubic_feet')->default(false);
            $table->boolean('product_weight_in_Ibs')->default(false);
            $table->integer('sale_default_confirmation_template')->default(0);
            $table->integer('sale_default_email_template')->default(0);
            $table->string('web_base_url')->nullable();

            // $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('system_paramaters', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};