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
        Schema::create('email_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('apply_to')->nullable();
            $table->string('name');
            $table->string('model_class');
            $table->string('subject')->nullable(); // Add this column
            $table->text('content');

            $table->string('sender_email')->nullable(); // Add this column
            $table->string('recipient_emails'); // Recipient email
            $table->string('cc_recipient_emails')->nullable(); // Copy carbon recipents
            $table->string('reply_email')->nullable(); // Add this column

            $table->string('language')->nullable(); // Add this column
            $table->string('automatic_delete')->nullable(); // Add this column
            $table->string('template_description')->nullable(); // Add this column

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('email_templates', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
