<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Employee\Entities\Employee;

return new class extends Migration
{
    protected $model = Employee::class;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->date('date_of_hire')->nullable();
            $table->foreignId('job_id')->nullable();
            $table->foreignId('manager_id')->nullable();
            $table->timestamps();

            $table->unique(['company_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
