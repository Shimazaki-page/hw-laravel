<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->string('classname');
            $table->timestamps();
        });

        Schema::create('subject_areas', function (Blueprint $table) {
            $table->id();
            $table->string('subject', 10);
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreignId('subject_area_id')->references('id')->on('subject_areas')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('user_subject_areas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreignId('subject_area_id')->references('id')->on('subject_areas')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('homework_threads', function (Blueprint $table) {
            $table->id();
            $table->string('comment', 255);
            $table->foreignId('subject_area_id')->references('id')->on('subject_areas')
                ->onDelete('cascade');
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
        Schema::dropIfExists('homework_threads');
        Schema::dropIfExists('user_subject_areas');
        Schema::dropIfExists('users');
        Schema::dropIfExists('subject_areas');
        Schema::dropIfExists('classrooms');
    }
}
