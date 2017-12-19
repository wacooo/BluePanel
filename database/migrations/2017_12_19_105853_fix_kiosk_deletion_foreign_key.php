<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixKioskDeletionForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	Schema::table('kiosk_logs', function (Blueprint $table) {
		$table->dropForeign('kiosk_logs_kiosk_id_foreign');
	});

	Schema::table('kiosk_logs', function (Blueprint $table) {
		$table->foreign('kiosk_id')->references('id')->on('kiosks')
			->onDelete('cascade')
			->onUpdate('cascade');
	});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
