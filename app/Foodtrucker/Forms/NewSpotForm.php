<?php
namespace Foodtrucker\Forms;

use Laracasts\Validation\FormValidator;

class NewSpotForm extends FormValidator{

	protected $rules = [
		'start'  => 'required',
		'end'   => 'required',
		'address'  => 'required',
		'truck'   => 'required'
	];
}