<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlacesTable extends Migration {

	public function up()
	{
		Schema::create('places', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->double('price');
			$table->integer('office_id');
			$table->timestamps();

		});
	}

	public function down()
	{
		Schema::drop('places');
	}
}
