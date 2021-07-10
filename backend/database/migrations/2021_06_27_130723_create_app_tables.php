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
