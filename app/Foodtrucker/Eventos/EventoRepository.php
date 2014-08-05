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

	public function getEventoById( $id ) {
		return Evento::where('id', $id)->first();
	}

	public function updateEvento( $id, $nome, $local, $img, $data, $description ) {
		return Evento::where('id', $id)->update([
			'nome' => $nome,
			'local' => $local,
			'imagem' => $img,
			'data' => $data,
			'description' => $description
		]);
	}

	public function getActualImage( $id ) {
		return Evento::where('id', $id)->pluck('imagem');
	}

	public function searchThis( $query ) {
		return Evento::where('nome','like', "%$query%")->orWhere('local','like', "%$query%")->get();
	}
}