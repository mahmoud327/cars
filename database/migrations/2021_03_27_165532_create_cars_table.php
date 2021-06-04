<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarsTable extends Migration {

	public function up()
	{
		Schema::create('cars', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('types', 255);
			$table->string('model', 255);
			$table->integer('type_id');
			$table->string('color', 255);
			$table->string('plate', 255)->unique();
			$table->integer('count_number');
			$table->boolean('activate')->default(0);
			$table->integer('office_id');
		});


	}

	public function down()
	{
		Schema::drop('cars');
	}
}
