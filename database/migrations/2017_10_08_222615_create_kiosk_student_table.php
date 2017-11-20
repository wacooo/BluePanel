<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKioskStudentTable extends Migration {

	public function up()
	{
		Schema::create('kiosk_student', function(Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('student_id')->unsigned();
			$table->timestamps();
			$table->integer('kiosk_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('kiosk_student');
	}
}