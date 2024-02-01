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
            $table->dateTime('date')->nullable();
            $table->dateTime('deadline_date')->nullable();
            $table->dateTime('expected_arrival_date')->nullable();
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
            $table->enum('payment_status', ['unpaid', 'partial', 'paid'])->default('unpaid');
            // Other Informations
            $table->foreignId('buyer_id')->nullable();
            $table->string('source_document')->nullable();
            $table->foreignId('incoterm_id')->nullable();
            $table->string('supplier_reference')->nullable();
            $table->string('payment_term')->nullable();
            $table->foreignId('fiscal_position_id')->nullable();
            $table->enum('status', ['purchase_order', 'invoiced', 'cancelled'])->default('to_invoice');
            $table->text('terms')->nullable();

            // Delivery
            $table->string('incoterm')->nullable();
            $table->string('incoterm_location')->nullable();
            $table->date('reception_date')->nullable();
            $table->enum('reception_status', ['not_received', 'pending', 'received'])->default('not_received');

            // Invoice
            $table->enum('invoice_status', ['to', 'partial', 'invoiced'])->default('not_invoiced');

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
