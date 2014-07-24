<?php
namespace Foodtrucker\Forms;

use Laracasts\Validation\FormValidator;

class NewsletterForm extends FormValidator{

	protected $rules = [
		'email'  => 'required'
	];
}