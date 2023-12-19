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
        Schema::create('supplier_bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('purchase_id')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('reference');
            $table->unsignedBigInteger('supplier_id')->nullable();

            $table->string('payment_reference')->nullable();
            $table->date('due_date')->nullable();
            $table->string('payment_term')->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->unsignedBigInteger('journal_id')->nullable();

            // Bill Ligne
            $table->decimal('tax_percentage', $precision = 12, $scale = 2)->default(0);
            $table->decimal('tax_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('discount_percentage', $precision = 12, $scale = 2)->default(0);
            $table->decimal('discount_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('shipping_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('total_amount', $precision = 12, $scale = 2);
            $table->decimal('paid_amount', $precision = 12, $scale = 2);
            $table->decimal('due_amount', $precision = 12, $scale = 2);
            $table->string('status');
            $table->string('payment_status')->nullable();

            // Bill
            $table->string('supplier_reference')->nullable();
            $table->unsignedBigInteger('bank_account_id')->nullable();
            $table->unsignedBigInteger('buyer_id')->nullable();

            // Accounting
            $table->unsignedBigInteger('incoterm_id')->nullable();
            $table->string('incoterm_location')->nullable();
            $table->string('fiscal_position')->nullable();
            $table->string('auto_post')->nullable();
            $table->boolean('to_checked')->defalut(false);

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('purchase_id')->references('id')->on('purchases')->nullOnDelete();
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts')->nullOnDelete();
            // $table->foreign('currency_id')->references('id')->on('currencies')->nullOnDelete();
            // $table->foreign('supplier_id')->references('id')->on('suppliers')->nullOnDelete();
            $table->foreign('buyer_id')->references('id')->on('employees')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('supplier_bills', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
