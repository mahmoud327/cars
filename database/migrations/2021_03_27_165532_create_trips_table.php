<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripsTable extends Migration {

	public function up()
	{
		Schema::create('trips', function(Blueprint $table) {
			$table->increments('id');
			$table->string('client_name');
            
			$table->decimal('Longitude_from', 8,2);
			$table->decimal('Longitude_to',  8,2 );
			$table->decimal('price',  8,2);
			$table->decimal('latitude_from',  8,2);
			$table->decimal('latitude_to',  8,2);
			$table->unsignedInteger('driver_id');
			$table->integer('office_id');
			$table->integer('user_id');
			$table->enum('type', array('pending', 'failed', 'succeeded'));
			$table->timestamps();
		});



	}

	public function down()
	{
		Schema::drop('trips');
	}
}
