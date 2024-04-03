<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('parent_slug')->nullable();
            $table->string('slug')->default(false);
            $table->string('short_name');
            $table->string('description');
            $table->string('app_group')->nullable();
            $table->string('version')->nullable();
            $table->string('author')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('is_default')->default(false);
            $table->string('link')->default('home');
            $table->boolean('enabled')->default(true);
            $table->string('path')->nullable();
            $table->string('navbar_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
