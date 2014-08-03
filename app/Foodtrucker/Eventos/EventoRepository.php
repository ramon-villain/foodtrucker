<?php
namespace Foodtrucker\Eventos;

use DateTime;

class EventosRepository {

	public function save( $nome, $local, $imagem, $data, $description ) {
		return Evento::insert([
			'nome' => $nome,
			'local' => $local,
			'imagem' => $imagem,
			'data' => $data,
			'description' => $description
		]);
	}

	public function getEventosActive() {
		return Evento::where('active', 1)->where('data', '>=', new DateTime('today'))->orderBy('data', 'asc')->get();
	}

	public function getEventos(){
		return Evento::orderBy('created_at', 'desc')->get();
	}
}