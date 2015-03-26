<?php 
$I = new FunctionalTester($scenario);

$I->am('a Larabook user');
$I->wantTo('Follow other larabook users');

$I->haveAnAccount(['id'=>88, 'name' => 'Other User', 'email' => 'otheruser@example.com', 'password' => bcrypt('secret')]);
$I->logIn();

$I->click('Browse Users');

$I->click(2);

$I->click('Other User');

$I->seeCurrentUrlEquals('/users/88');

// When I follow a user...
$I->click('Follow Other User');
$I->seeCurrentUrlEquals('/users/88');
$I->see('You are now following Other User');
$I->See('Unfollow Other User');

/*
 * Acceptance test = Client's point of view
 * Functional test = From Developer's point of view
 */

// When I unfollow a user...
$I->click('Unfollow Other User');
$I->seeCurrentUrlEquals('/users/88');
$I->see('Follow Other User');


