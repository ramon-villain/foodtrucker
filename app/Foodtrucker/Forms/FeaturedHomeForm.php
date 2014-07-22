<?php
namespace Foodtrucker\Forms;

use Laracasts\Validation\FormValidator;

class FeaturedHomeForm extends FormValidator{

	protected $rules = [
		'title'  => 'required',
		'body'   => 'required'
	];
}