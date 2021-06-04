<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfficesTable extends Migration {

	public function up()
	{
		Schema::create('offices', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('email', 255);
			$table->string('name', 255);
			$table->string('phone', 255);
			$table->text('address');
		});
	}

	public function down()
	{
		Schema::drop('offices');
	}
}
