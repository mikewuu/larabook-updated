<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('Post statuses to my profile.');

$I->LogIn();

$I->seeCurrentUrlEquals('/statuses');
$I->postAStatus('My first post!');

$I->seeCurrentUrlEquals('/statuses');
$I->see('My first post!');

