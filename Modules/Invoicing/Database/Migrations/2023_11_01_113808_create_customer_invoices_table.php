<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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

            // Accounting
            $table->unsignedBigInteger('incoterm_id')->nullable();
            $table->string('incoterm_location')->nullable();
            $table->string('fiscal_position')->nullable();
            $table->string('auto_post')->nullable();
            $table->boolean('to_checked')->defalut(false);

            $table->string('terms')->nullable();;

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('sale_id')->references('id')->on('sales')->nullOnDelete();
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts')->nullOnDelete();
            // $table->foreign('currency_id')->references('id')->on('currencies')->nullOnDelete();
            $table->foreign('customer_id')->references('id')->on('contacts')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_invoices', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
