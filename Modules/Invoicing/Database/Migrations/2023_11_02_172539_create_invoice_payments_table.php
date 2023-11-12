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
            $table->foreign('customer_invoice_id')->references('id')->on('customer_invoices')->cascadeOnDelete();

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
        Schema::table('invoice_payments', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
