<?php
namespace Foodtrucker\Forms;

use Laracasts\Validation\FormValidator;

class NewPostForm extends FormValidator{

	protected $rules = [
		'titulo'  => 'required',
		'body'  => 'required',
		'publish_at'  => 'required',
		'imagem'  => 'required'
	];
}