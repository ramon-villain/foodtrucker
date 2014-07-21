<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');

$I->signIn();
$I->amOnPage('/admin/dashboard');
$I->selectOption('truck','Buzina Food Truck');
$I->fillField('address', 'Rua Domingos Cristal, 81');
$I->fillField('start', '19/07/2014 - 01:00');
$I->fillField('end', '19/07/2014 - 10:00');
$I->fillField('description', '');

$I->click('Adicionar Spot');

$I->seeInCurrentUrl('/admin/spot/new');
$I->see('truck');
