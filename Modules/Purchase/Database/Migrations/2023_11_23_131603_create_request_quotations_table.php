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
        Schema::create('request_quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('supplier_id');
            $table->string('reference')->nullable();
            $table->foreignId('blanket_order_id')->nullable();
            $table->dateTime('date')->nullable();
            $table->dateTime('deadline_date')->nullable();
            $table->dateTime('expected_arrival_date')->nullable();
            $table->boolean('ask_confirmation')->default(false);
            $table->integer('reminder_date_before_receipt')->nullable();
            //
            $table->decimal('tax_percentage', $precision = 12, $scale = 2)->default(0);
            $table->decimal('tax_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('discount_percentage', $precision = 12, $scale = 2)->default(0);
            $table->decimal('discount_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('shipping_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('total_amount', $precision = 12, $scale = 2)->default(0);
            // Other Informations
            $table->foreignId('buyer_id')->nullable();
            $table->string('source_document')->nullable();
            $table->foreignId('incoterm_id')->nullable();
            $table->string('supplier_reference')->nullable();
            $table->string('payment_term')->nullable();
            $table->foreignId('fiscal_position_id')->nullable();
            $table->enum('status', ['request', 'invoiced', 'cancelled'])->default('request');
            $table->text('terms')->nullable();

            // Email
            $table->unsignedBigInteger('email_template_id')->nullable();

            // $table->foreign('supplier_id')->references('id')->on('contacts')->cascadeOnDelete();
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
        Schema::table('request_quotations', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};