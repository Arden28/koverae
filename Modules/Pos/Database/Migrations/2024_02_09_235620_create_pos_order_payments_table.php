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
        Schema::create('pos_order_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pos_session_id')->nullable();
            $table->unsignedBigInteger('pos_order_id');
            $table->date('date');
            $table->string('label')->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->decimal('amount', $precision = 12, $scale = 2)->default(0);
            $table->decimal('due_amount', $precision = 12, $scale = 2)->default(0);

            $table->foreign('pos_session_id')->references('id')->on('pos_sessions')->cascadeOnDelete();
            $table->foreign('pos_order_id')->references('id')->on('pos_orders')->cascadeOnDelete();

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
        Schema::table('pos_order_payments', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
