<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblMosqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mosque', function (Blueprint $table) {
            $table->bigIncrements('mosqueID');
            $table->unsignedBigInteger('mukimID');
            $table->unsignedBigInteger('daerahID');
            $table->string('mosque_name');
            $table->string('income');
            $table->string('expense');
            $table->string('account_no')->unique();
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
        Schema::dropIfExists('tbl_mosque');
    }
}
