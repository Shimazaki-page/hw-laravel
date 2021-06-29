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
            $table->string('class_name');
            $table->timestamps();
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name', 10);
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('classroom_id')->references('id')->on('classrooms')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('user_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreignId('subject_id')->references('id')->on('subjects')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('classroom_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classroom_id')->references('id')->on('classrooms')
                ->onDelete('cascade');
            $table->foreignId('subject_id')->references('id')->on('subjects')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('homework_threads', function (Blueprint $table) {
            $table->id();
            $table->string('comment', 255);
            $table->foreignId('classroom_subject_id')->references('id')->on('classroom_subject')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('comment', 255);
            $table->foreignId('user_subject_id')->references('id')->on('user_subject')
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
        Schema::dropIfExists('comments');
        Schema::dropIfExists('homework_threads');
        Schema::dropIfExists('classroom_subject_area');
        Schema::dropIfExists('user_subject_area');
        Schema::dropIfExists('users');
        Schema::dropIfExists('subject_areas');
        Schema::dropIfExists('classrooms');
    }
}
