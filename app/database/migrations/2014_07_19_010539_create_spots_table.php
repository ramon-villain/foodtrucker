<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('spots', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('truck');
			$table->date('abertura');
			$table->date('encerramento');
			$table->time('inicio');
			$table->time('fim');
			$table->string('local');
			$table->string('description');
			$table->integer('active')->default(true);
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
		Schema::drop('spots');
	}

}
