<?php
namespace Foodtrucker\Forms;

use Laracasts\Validation\FormValidator;

class newTruckForm extends FormValidator{

	protected $rules = [
		'nome'  => 'required',
		'logo'  => 'required'
	];
}