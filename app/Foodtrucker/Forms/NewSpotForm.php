<?php
namespace Foodtrucker\Forms;

use Laracasts\Validation\FormValidator;

class NewSpotForm extends FormValidator{

	protected $rules = [
		'inicio'  => 'required',
		'fim'   => 'required',
		'endereco'  => 'required',
		'truck'   => 'required'
	];
}