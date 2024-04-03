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
        Schema::create('pos_orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('unique_token')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('pos_id')->nullable();
            $table->unsignedBigInteger('pos_session_id')->nullable();
            $table->unsignedBigInteger('cashier_id')->nullable();
            $table->date('date');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('fiscal_position_id')->nullable();
            $table->unsignedBigInteger('table_id')->nullable();
            $table->integer('guest')->default(1);
            $table->enum('status', ['new', 'posted', 'invoiced', 'cancelled'])->default('new');
            $table->enum('payment_status', ['unpaid', 'partial', 'paid'])->default('unpaid');
            $table->string('payment_method')->default('cash');
            $table->string('receipt_number')->nullable();
            $table->integer('order_number')->nullable();
            $table->unsignedBigInteger('price_list_id')->nullable();
            $table->mediumText('note')->nullable();
            $table->decimal('total_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('paid_amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('due_amount', $precision = 12, $scale = 2)->default(0);

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('pos_id')->references('id')->on('pos')->cascadeOnDelete();
            $table->foreign('pos_session_id')->references('id')->on('pos_sessions')->cascadeOnDelete();
            $table->foreign('cashier_id')->references('id')->on('employees')->cascadeOnDelete();
            $table->foreign('customer_id')->references('id')->on('contacts')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pos_orders', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
