<?php
namespace Foodtrucker\Forms;

use Laracasts\Validation\FormValidator;

class BannerHomeForm extends FormValidator{

	protected $rules = [
		'body'      => 'required',
		'url'       => 'required'
	];
}