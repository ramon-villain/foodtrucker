<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('quero me registrar');

$I->amOnPage('/cadastrar');

$I->fillField('Nome', 'Ramon');
$I->fillField('Sobrenome', 'Villain');
$I->fillField('Email', 'ramon@teste.com');
$I->fillField('Senha', 'secret');
$I->fillField('Confirmação da Senha', 'secret');
$I->click('Registrar');

$I->seeCurrentUrlEquals('');
$I->see('registrado');
$I->seeRecord('users', [
	'email' => 'ramon@teste.com'
]);

$I->assertTrue(Auth::check());