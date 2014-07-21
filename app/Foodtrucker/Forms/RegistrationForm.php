<?php
namespace Foodtrucker\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator{

	protected $rules = [
		'nome'  => 'required',
		'sobrenome'  => 'required',
		'email'  => 'required|email|unique:users',
		'password'  => 'required|confirmed'
	];
}