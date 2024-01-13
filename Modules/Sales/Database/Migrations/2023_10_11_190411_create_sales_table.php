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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->dateTime('date')->nullable();
            $table->string('reference');
            $table->unsignedBigInteger('customer_id')->nullable();
            // Cart
            $table->decimal('tax_percentage', $precision = 12, $scale = 2)->default(0);
            $table->decimal('tax_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('discount_percentage', $precision = 12, $scale = 2)->default(0);
            $table->decimal('discount_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('shipping_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('total_amount', $precision = 12, $scale = 2);
            $table->decimal('paid_amount', $precision = 12, $scale = 2);
            $table->decimal('due_amount', $precision = 12, $scale = 2);
            $table->enum('status', ['to_invoice', 'partial', 'invoiced']);
            // Payment
            $table->string('payment_term');
            $table->enum('payment_status', ['unpaid', 'partial', 'paid']);
            $table->string('payment_method');
            $table->text('note')->nullable();
            //Sales
            $table->foreignId('seller_id')->nullable();
            $table->foreignId('sales_team_id')->nullable();
            $table->string('online_confirmation')->nullable();
            $table->string('customer_reference')->nullable();
            $table->foreignId('tag_id')->nullable();

            // Invoicing
            $table->string('fiscal_position')->nullable();

            // Delivery
            $table->string('incoterm')->nullable();
            $table->string('incoterm_location')->nullable();
            $table->string('shipping_policy')->nullable();
            $table->date('shipping_date')->nullable();
            $table->string('shipping_status')->nullable();

            // Tracking
            $table->string('source_document')->nullable();
            $table->string('opportunity')->nullable();
            $table->string('campaign')->nullable();
            $table->string('medium')->nullable();
            $table->string('source')->nullable();

            // Email
            $table->unsignedBigInteger('email_template_id')->nullable();

            // Quotation
            $table->unsignedBigInteger('quotation_id')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            // $table->foreign('pos_id')->references('id')->on('pos')->nullOnDelete();
            $table->foreign('customer_id')->references('id')->on('users')->nullOnDelete(); //A modifier, relier la tables au clients
            // $table->foreign('seller_id')->references('id')->on('sales_people')->nullOnDelete();
            // $table->foreign('sales_team_id')->references('id')->on('sales_teams')->nullOnDelete();
            $table->foreign('quotation_id')->references('id')->on('quotations')->nullOnDelete();
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
        Schema::table('sales', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
