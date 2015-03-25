<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('Logging to my Larabook acocunt');

$I->LogIn();

$I->seeInCurrentUrl('/statuses');
$I->see('Welcome back!');