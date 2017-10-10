<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserKiosksTable extends Migration {

	public function up()
	{
		Schema::create('user_kiosks', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->integer('kiosk_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('user_kiosks');
	}
}