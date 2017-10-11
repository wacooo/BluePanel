<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	public function up()
	{
		Schema::create('students', function(Blueprint $table) {
			$table->integer('id')->unique()->unsigned();
			$table->string('first');
			$table->string('last');
			$table->char('gender');
		});
	}

	public function down()
	{
		Schema::drop('students');
	}
}