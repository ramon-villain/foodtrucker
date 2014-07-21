<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagsTrucksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags_trucks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('truck');
			$table->integer('tag')->unsigned()->index();
			$table->foreign('tag')->references('id')->on('tags')->onDelete('cascade');
			$table->integer('spot')->nullable()->unsigned()->index();
			$table->foreign('spot')->references('id')->on('spots')->onDelete('cascade');
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
		Schema::drop('tags_trucks');
	}

}
