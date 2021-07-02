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
            $table->string('email')->unique('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status',1);
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

        Schema::create('homeworks', function (Blueprint $table) {
            $table->id();
            $table->string('name',20);
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
        Schema::dropIfExists('homeworks');
        Schema::dropIfExists('classroom_subject');
        Schema::dropIfExists('user_subject');
        Schema::dropIfExists('users');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('classrooms');
    }
}
