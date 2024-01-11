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
        Schema::table('employees', function (Blueprint $table) {
            $table->enum('type', ['employee', 'interim', 'student', 'intern', 'contractor', 'freelance'])->nullable()->after('visa_expiration_date');
            $table->string('pin_code')->nullable()->after('type');
            $table->string('cypher_id')->nullable()->unique()->after('pin_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {

        });
    }
};
