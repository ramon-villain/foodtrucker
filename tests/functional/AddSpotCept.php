<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');

$I->signIn();
$I->amOnPage('/admin/spot');
$I->selectOption('truck','Buzina Food Truck');
$I->fillField('endereco', 'Rua Domingos Cristal, 81');
$I->fillField('inicio', '19/07/2014 - 01:00');
$I->fillField('fim', '19/07/2014 - 10:00');
$I->fillField('description', '');

$I->click('Adicionar Spot');

$I->see('Rua Domingos Cristal');
