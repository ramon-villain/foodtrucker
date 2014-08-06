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
			$table->string('slug')->unique();
			$table->string('logo');
			$table->string('especialidade');
			$table->integer('cat_id')->unsigned()->index();
			$table->foreign('cat_id')->references('id')->on('categorias')->onDelete('cascade');
			$table->string('mais_pedido');
			$table->string('site');
			$table->string('facebook');
			$table->string('instagram');
			$table->string('preco');
			$table->string('pagamento');
			$table->longtext('description');
			$table->string('imagens', 5000);
			$table->string('extras')->nullable();
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
