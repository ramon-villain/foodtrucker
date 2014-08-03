<?php
namespace Foodtrucker\Forms;

use Laracasts\Validation\FormValidator;

class EventoForm extends FormValidator{

	protected $rules = [
		'nome'      => 'required',
		'local'       => 'required',
		'imagem'       => 'required',
		'data'       => 'required',
		'description'       => 'required'
	];
}