<?php
namespace Foodtrucker\Forms;

use Laracasts\Validation\FormValidator;

class LoginForm extends FormValidator{

	protected $rules = [
		'email'  => 'required',
		'password'  => 'required'
	];
}