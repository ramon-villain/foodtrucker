<?php
namespace Foodtrucker\Forms;

use Laracasts\Validation\FormValidator;

class SliderHomeForm extends FormValidator{

	protected $rules = [
		'body'      => 'required',
		'url'       => 'required'
	];
}