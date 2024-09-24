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
        // Payment Terms
        Schema::create('payment_terms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('name')->nullable();
            $table->boolean('has_early_discount')->default(false);
            $table->integer('discount_percentage')->default(2);
            $table->integer('in_advance_day')->default(7);
            $table->tinyText('note')->nullable();
            $table->enum('reduced_tax',['on_early_payment', 'always', 'never'])->default('on_early_payment');

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('payment_due_terms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('payment_term_id');
            $table->integer('due_amount')->default(100);
            $table->enum('due_format', ['percent', 'fixed'])->default('percent');
            $table->integer('after')->nullable(); //Days after which the amount is to be paid
            $table->enum('after_date', ['after_invoice_date', 'after_end_of_the_month', 'after_end_of_the_next_month', 'end_of_the_month_of'])->default('after_invoice_date'); //Days after which the amount is to be paid
            $table->integer('month')->default(0); 

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
        // Taxes
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->enum('type', ['sales', 'purchases', 'misc', 'none'])->default('none');
            $table->enum('scope_tax', ['goods', 'interventions'])->nullable();
            $table->enum('calculation_type', ['fixed', 'percentage'])->default('fixed');
            $table->enum('application_type', ['inclusive', 'exclusive'])->default('exclusive');
            $table->decimal('amount', $precision = 12, $scale = 2)->default(0);
            $table->string('wording_on_invoice')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
        // Incoterms
        Schema::create('incoterms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('code');
            $table->string('name');

            $table->timestamps();
            $table->softDeletes();
        });
        // Customer Invoice
        Schema::create('customer_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('sale_id')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('reference');
            $table->unsignedBigInteger('customer_id')->nullable();

            $table->string('payment_reference')->nullable();
            $table->date('due_date')->nullable();
            $table->string('payment_term')->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->unsignedBigInteger('journal_id')->nullable();

            // Invoice Ligne
            $table->decimal('tax_percentage', $precision = 12, $scale = 2)->default(0);
            $table->decimal('tax_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('discount_percentage', $precision = 12, $scale = 2)->default(0);
            $table->decimal('discount_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('shipping_amount', $precision = 12, $scale = 2)->default(0);
            $table->date('shipping_date')->nullable();
            $table->decimal('total_amount', $precision = 12, $scale = 2);
            $table->decimal('paid_amount', $precision = 12, $scale = 2);
            $table->decimal('due_amount', $precision = 12, $scale = 2);
            $table->string('status');
            $table->string('payment_status')->nullable();

            // Journal Items

            // Invoice
            $table->string('customer_reference')->nullable();
            $table->unsignedBigInteger('bank_account_id')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->foreignId('sales_team_id')->nullable();

            // Accounting
            $table->unsignedBigInteger('incoterm_id')->nullable();
            $table->string('incoterm_location')->nullable();
            $table->string('fiscal_position')->nullable();
            $table->string('auto_post')->nullable();
            $table->boolean('to_checked')->defalut(false);

            $table->string('terms')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            // $table->foreign('sale_id')->references('id')->on('sales')->nullOnDelete();
            // $table->foreign('bank_account_id')->references('id')->on('bank_accounts')->nullOnDelete();
            // $table->foreign('currency_id')->references('id')->on('currencies')->nullOnDelete();
            // $table->foreign('customer_id')->references('id')->on('contacts')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('customer_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_invoice_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('product_name');
            $table->string('label');
            $table->decimal('quantity', $precision = 12, $scale = 2);
            $table->decimal('price', $precision = 12, $scale = 2);
            $table->decimal('unit_price', $precision = 12, $scale = 2);
            $table->decimal('sub_total', $precision = 12, $scale = 2);
            $table->decimal('product_discount_amount', $precision = 12, $scale = 2);
            $table->string('product_discount_type')->default('fixed');
            $table->decimal('product_tax_amount', $precision = 12, $scale = 2);

            // $table->foreign('customer_invoice_id')->references('id')->on('customer_invoices')->cascadeOnDelete();
            // $table->foreign('product_id')->references('id')->on('products')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
        // Customer Invoice Payment
        Schema::create('invoice_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('customer_invoice_id');
            $table->unsignedBigInteger('journal_id')->nullable();
            $table->decimal('amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('due_amount', $precision = 12, $scale = 2)->default(0);
            $table->date('date');
            $table->string('reference')->nullable();
            $table->string('payment_method');
            $table->text('note')->nullable();
            $table->string('status');

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            // $table->foreign('customer_invoice_id')->references('id')->on('customer_invoices')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
        // Vendor Bill
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
            $table->enum('status', ['draft', 'posted']);
            $table->enum('payment_status', ['unpaid', 'partial', 'paid'])->default('unpaid');

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
            // $table->foreign('purchase_id')->references('id')->on('purchases')->nullOnDelete();
            // $table->foreign('bank_account_id')->references('id')->on('bank_accounts')->nullOnDelete();
            // $table->foreign('buyer_id')->references('id')->on('employees')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('supplier_bill_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_bill_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('product_name');
            $table->string('label');
            $table->decimal('quantity', $precision = 12, $scale = 2);
            $table->decimal('price', $precision = 12, $scale = 2);
            $table->decimal('unit_price', $precision = 12, $scale = 2);
            $table->decimal('sub_total', $precision = 12, $scale = 2);
            $table->decimal('product_discount_amount', $precision = 12, $scale = 2);
            $table->string('product_discount_type')->default('fixed');
            $table->decimal('product_tax_amount', $precision = 12, $scale = 2);

            // $table->foreign('supplier_bill_id')->references('id')->on('supplier_bills')->cascadeOnDelete();
            // $table->foreign('product_id')->references('id')->on('products')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
        // Vendor Bill Payment
        Schema::create('bill_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('supplier_bill_id');
            $table->unsignedBigInteger('journal_id')->nullable();
            $table->decimal('amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('due_amount', $precision = 12, $scale = 2)->default(0);
            $table->date('date');
            $table->string('reference')->nullable();
            $table->string('payment_method');
            $table->text('note')->nullable();
            $table->string('status');

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            // $table->foreign('supplier_bill_id')->references('id')->on('supplier_bills')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_terms', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('payment_due_terms', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('taxes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('incoterms', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('customer_invoices', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('customer_invoice_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('invoice_payments', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('supplier_bills', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('supplier_bill_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('bill_payments', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
