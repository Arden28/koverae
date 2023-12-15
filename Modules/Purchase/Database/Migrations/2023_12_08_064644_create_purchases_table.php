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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('supplier_id');
            $table->string('reference')->nullable();
            $table->foreignId('blanket_order_id')->nullable();
            $table->date('date')->nullable();
            $table->date('deadline_date')->nullable();
            $table->date('expected_arrival_date')->nullable();
            $table->boolean('ask_confirmation')->default(false);
            $table->integer('reminder_date_before_receipt')->nullable();
            //Cart
            $table->decimal('tax_percentage', $precision = 12, $scale = 2)->default(0);
            $table->decimal('tax_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('discount_percentage', $precision = 12, $scale = 2)->default(0);
            $table->decimal('discount_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('shipping_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('total_amount', $precision = 12, $scale = 2);
            $table->decimal('paid_amount', $precision = 12, $scale = 2);
            $table->decimal('due_amount', $precision = 12, $scale = 2);
            // Payment
            $table->string('payment_status');
            // Other Informations
            $table->foreignId('buyer_id')->nullable();
            $table->string('source_document')->nullable();
            $table->foreignId('incoterm_id')->nullable();
            $table->string('supplier_reference')->nullable();
            $table->string('payment_term')->nullable();
            $table->foreignId('fiscal_position_id')->nullable();
            $table->string('status')->default('pending');
            $table->text('terms')->nullable();

            // Delivery
            $table->string('incoterm')->nullable();
            $table->string('incoterm_location')->nullable();
            $table->string('delivery_policy')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('delivery_status')->nullable();
            // Reception
            $table->string('reception_status')->nullable();

            // Invoice
            $table->string('invoice_status')->nullable();

            // Email
            $table->unsignedBigInteger('email_template_id')->nullable();

            $table->foreign('supplier_id')->references('id')->on('contacts')->cascadeOnDelete();
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
        Schema::table('purchases', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
