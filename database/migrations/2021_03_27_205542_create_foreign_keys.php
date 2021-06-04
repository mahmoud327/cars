<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('trips', function(Blueprint $table) {

			$table->foreign('driver_id')->references('id')->on('drivers')
						->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::table('trips', function(Blueprint $table) {
			$table->dropForeign('trips_driver_id_foreign');
		});
	}
}
