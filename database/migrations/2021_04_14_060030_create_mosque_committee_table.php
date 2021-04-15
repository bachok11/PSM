<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMosqueCommitteeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mosque_committee', function (Blueprint $table) {
            $table->bigIncrements('userID');
            $table->unsignedBigInteger('mosqueID');
            $table->unsignedBigInteger('mukimID');
            $table->unsignedBigInteger('daerahID');
            $table->unsignedBigInteger('roleID');
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
        Schema::dropIfExists('mosque_committee');
    }
}
