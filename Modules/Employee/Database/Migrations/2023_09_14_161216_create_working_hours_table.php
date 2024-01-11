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
        Schema::create('working_hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('work_schedule_id')->nullable();
            $table->string('name');
            $table->enum('day_of_week', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']);
            $table->enum('day_period', ['morning', 'break', 'afternoon']);
            $table->string('work_from')->nullable();
            $table->string('work_to')->nullable();
            $table->decimal('duration', $precision = 10, $scale = 2)->default(1);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->foreign('work_schedule_id')->references('id')->on('work_schedules')->cascadeOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('working_hours', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
