<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriversTable extends Migration {

	public function up()
	{
		Schema::create('drivers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 255);
			$table->string('nationality', 255);
			$table->string('phone', 255)->unique();
			$table->boolean('activate')->default(0);
			$table->integer('office_id');
		});
	}

	public function down()
	{
		Schema::drop('drivers');
	}
}
