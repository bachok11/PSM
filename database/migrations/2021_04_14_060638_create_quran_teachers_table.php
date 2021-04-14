<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuranTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quran_teachers', function (Blueprint $table) {
            $table->bigIncrements('teacherID');
            $table->unsignedBigInteger('mukimID');
            $table->unsignedBigInteger('daerahID');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('schoolname');
            $table->string('no_ic')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile_no')->unique();
            $table->string('gender');
            $table->string('address');
            $table->string('city');
            $table->string('password');
            $table->string('account_no')->unique();
            $table->string('appointment_letter')->unique();
            $table->rememberToken();
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
        Schema::dropIfExists('quran_teachers');
    }
}
