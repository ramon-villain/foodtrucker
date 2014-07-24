<?php
$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');

$I->signIn();
$I->amOnPage('/admin/tag');
$I->fillField("//input[@type='text']", "banana");
$I->click('Adicionar Tag');

$I->see('banana');
