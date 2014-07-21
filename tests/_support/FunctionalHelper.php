<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Codeception\Module;
use Laracasts\TestDummy\Factory as TestDummy;

class FunctionalHelper extends Module
{

	public function haveAnAccount($overrides = []) {
		TestDummy::create('Foodtrucker\Users\User', $overrides);
	}

	public function signIn(){
		$email      = 'ramon@teste.com';
		$password   = 'secret';

		$this->haveAnAccount(compact('email', 'password'));

		$I = $this->getModule('Laravel4');
		$I->amOnPage('/login');
		$I->fillField('email', $email);
		$I->fillField('password', $password);
		$I->click('Logar');
	}
}