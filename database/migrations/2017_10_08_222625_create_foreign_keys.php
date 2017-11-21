<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('kiosk_user', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('kiosk_user', function(Blueprint $table) {
			$table->foreign('kiosk_id')->references('id')->on('kiosks')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('kiosk_student', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('kiosk_student', function(Blueprint $table) {
			$table->foreign('kiosk_id')->references('id')->on('kiosks')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('kiosk_logs', function(Blueprint $table) {
			$table->foreign('kiosk_id')->references('id')->on('kiosks')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('kiosk_logs', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('kiosk_user', function(Blueprint $table) {
			$table->dropForeign('kiosk_user_user_id_foreign');
		});
		Schema::table('kiosk_user', function(Blueprint $table) {
			$table->dropForeign('kiosk_user_kiosk_id_foreign');
		});
		Schema::table('kiosk_student', function(Blueprint $table) {
			$table->dropForeign('kiosk_student_student_id_foreign');
		});
		Schema::table('kiosk_student', function(Blueprint $table) {
			$table->dropForeign('kiosk_student_kiosk_id_foreign');
		});
		Schema::table('kiosk_logs', function(Blueprint $table) {
			$table->dropForeign('kiosk_logs_kiosk_id_foreign');
		});
		Schema::table('kiosk_logs', function(Blueprint $table) {
			$table->dropForeign('kiosk_logs_student_id_foreign');
		});
	}
}