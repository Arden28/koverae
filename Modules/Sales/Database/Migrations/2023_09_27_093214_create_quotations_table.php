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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->date('date');
            $table->date('expected_date')->nullable();
            $table->string('payment_term');
            $table->string('reference');
            $table->foreignId('customer_id')->nullable();
            $table->decimal('tax_percentage', $precision = 12, $scale = 2)->default(0);
            $table->decimal('tax_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('discount_percentage', $precision = 12, $scale = 2)->default(0);
            $table->decimal('discount_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('shipping_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('total_amount', $precision = 12, $scale = 2)->default(0);
            $table->enum('status', ['quotation', 'sent', 'sale_order']);
            $table->text('note')->nullable();
            // Sales
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
            $table->enum('shipping_policy', ['after_done', 'as_soon_as_possible'])->nullable();
            $table->date('shipping_date')->nullable();
            $table->enum('shipping_status', ['unshipped', 'shipped']);

            // Tracking
            $table->string('source_document')->nullable();
            $table->string('opportunity')->nullable();
            $table->string('campaign')->nullable();
            $table->string('medium')->nullable();
            $table->string('source')->nullable();

            $table->unsignedBigInteger('email_template_id')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
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
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
