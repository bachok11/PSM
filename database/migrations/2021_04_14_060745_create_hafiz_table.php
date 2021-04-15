<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHafizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hafiz', function (Blueprint $table) {
            $table->bigIncrements('hafizID');
            $table->unsignedBigInteger('mukimID');
            $table->unsignedBigInteger('daerahID');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('no_ic')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile_no')->unique();
            $table->string('gender');
            $table->string('address');
            $table->string('cityID');
            $table->string('password');
            $table->string('account_no')->unique();
            $table->string('no_juzuk');
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
        Schema::dropIfExists('hafiz');
    }
}
