<?php
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('I want to view my profile');

$I->logIn();

$I->postAStatus('My new status.');

$I->click('My Profile');

$I->see('My new status.');


