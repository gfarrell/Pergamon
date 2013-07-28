<?php

use Illuminate\Database\Migrations\Migration;

class CreateShelvesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Make the shelves table
		Schema::create('shelves', function($table){
			$table->increments('id');
			$table->string('name');
			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Drop the shelves table
		Schema::drop('shelves');
	}

}