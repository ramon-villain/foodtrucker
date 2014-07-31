<?php
namespace Foodtrucker\Forms;

use Laracasts\Validation\FormValidator;

class ContatoForm extends FormValidator{

	protected $rules = [
		'nome'      => 'required',
		'email_contato'       => 'required',
		'mensagem'       => 'required'
	];
}