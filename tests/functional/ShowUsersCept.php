<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Review all users who are registered for Larabook');
$I->am('a Larabook member');

$I->haveAnAccount(['name' => 'Foo']);
$I->haveAnAccount(['name' => 'Bar']);

$I->amOnPage('/users');

$I->see('Foo');
$I->see('Bar');

