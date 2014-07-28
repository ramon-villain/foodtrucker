<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrucksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trucks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome');
			$table->string('logo');
			$table->longtext('description');
			$table->string('pagamento');
			$table->string('facebook');
			$table->string('instagram');
			$table->string('mais-pedido');
			$table->string('extras');
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
		Schema::drop('trucks');
	}

}
