<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Adicionando Novo Truck');

$I->signIn();
$I->click('Truck');
$I->canSeeCurrentUrlMatches('/admin/trucks');

