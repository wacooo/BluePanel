<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKioskUserTable extends Migration
{
    public function up()
    {
        Schema::create('kiosk_user', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('kiosk_id')->unsigned();
        });
    }

    public function down()
    {
        Schema::drop('kiosk_user');
    }
}
