<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('logar no site');
$I->signIn();
$I->seeInCurrentUrl('/admin/dashboard');
$I->see('Olá');

$I->assertTrue(Auth::check());
