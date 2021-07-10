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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('role')->default(10);
            $table->timestamps();
        });

        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name');
        });

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('classroom_id')->references('id')->on('classroom')
                ->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')
                ->onDelete('cascade');
        });

        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->references('id')->on('users')
                ->onDelete('cascade');
        });

        Schema::create('student_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')
                ->onDelete('cascade');
            $table->foreignId('subject_id')->references('id')->on('subjects')
                ->onDelete('cascade');
        });

        Schema::create('homeworks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('homework');
            $table->date('date');
            $table->foreignId('classroom_id')->references('id')->on('classrooms')
                ->onDelete('cascade');
            $table->foreignId('subject_id')->references('id')->on('subjects')
                ->onDelete('cascade');
        });

        Schema::create('threads', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('-');
            $table->foreignId('homework_id')->references('id')->on('homeworks')
                ->onDelete('cascade');
            $table->foreignId('student_id')->references('id')->on('students')
                ->onDelete('cascade');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('comment');
            $table->string('image');
            $table->foreignId('thread_id')->references('id')->on('threads')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('users');

    }
}
