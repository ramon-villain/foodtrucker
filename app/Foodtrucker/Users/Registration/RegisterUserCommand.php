<?php
namespace Foodtrucker\Users\Registration;

class RegisterUserCommand{

	public $nome;
	public $sobrenome;
	public $email;
	public $password;

	function __construct($nome, $sobrenome, $email, $password){
		$this->nome = $nome;
		$this->sobrenome = $sobrenome;
		$this->email = $email;
		$this->password = $password;
	}
}