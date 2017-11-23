<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKioskLogsTable extends Migration {

	public function up()
	{
		Schema::create('kiosk_logs', function(Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('kiosk_id')->unsigned();
			$table->integer('student_id')->unsigned();
			$table->string('type');
            $table->timestamps();
            $table->softDeletes();


        });
	}

	public function down()
	{
		Schema::drop('kiosk_logs');
	}
}