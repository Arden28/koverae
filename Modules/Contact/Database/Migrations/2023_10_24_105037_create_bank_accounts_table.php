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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('bank_id');
            $table->unsignedBigInteger('contact_id');
            $table->string('account_number');
            $table->string('account_holder_name');
            $table->boolean('can_send_money')->default(false);

            $table->foreign('contact_id')->references('id')->on('contacts')->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->cascadeOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank_accounts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
