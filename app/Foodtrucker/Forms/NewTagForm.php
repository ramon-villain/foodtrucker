<?php
namespace Foodtrucker\Forms;

use Laracasts\Validation\FormValidator;

class NewTagForm extends FormValidator{

	protected $rules = [
		'tags'  => 'required'
	];
}