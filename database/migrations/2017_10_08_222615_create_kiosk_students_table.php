<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKioskStudentsTable extends Migration {

	public function up()
	{
		Schema::create('kiosk_students', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('student_id')->unsigned();
			$table->timestamps();
			$table->integer('kiosk_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('kiosk_students');
	}
}