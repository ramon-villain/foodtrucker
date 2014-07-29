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
			$table->integer('truck_id')->unsigned()->index();
			$table->foreign('truck_id')->references('id')->on('trucks')->onDelete('cascade');
			$table->integer('tag_id')->unsigned()->index();
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
			$table->integer('spot_id')->nullable()->unsigned()->index();
			$table->foreign('spot_id')->references('id')->on('spots')->onDelete('cascade');
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
