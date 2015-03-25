<?php

use Illuminate\Support\Facades\Auth;

$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign up for a Larabook account');
$I->amOnPage('/');

$I->click('Sign Up');

$I->seeCurrentUrlEquals('/auth/register');
$I->fillField('name', 'John Doe');
$I->fillField('email', 'john@example.com');
$I->fillField('password', 'password');
$I->fillField('password_confirmation', 'password');

$I->click('sign_up');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to larabook!');

$I->seeRecord('users', [
    'name' => 'John Doe',
    'email' => 'john@example.com'
]);

$I->assertTrue(Auth::check());
