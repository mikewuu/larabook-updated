<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Laracasts\TestDummy\Factory as TestDummy;

class FunctionalHelper extends \Codeception\Module {

    public function haveAnAccount($overrides = [])
    {
        $this->have('App\User', $overrides);
    }

    public function LogIn()
    {

        $email = 'foo@example.com';
        $password = 'password';

        $this->haveAnAccount(['email' => 'foo@example.com', 'password' => bcrypt('password')]);

        $I = $this->getModule('Laravel5');

        $I->amOnPage('/auth/login');



        $I->fillField('email', $email);
        $I->fillField('password', $password);

        $I->click('loginbutton');


    }


    public function postAStatus($body)
    {
        // declare module
        $I = $this->getModule('Laravel5');

        $I->fillField('body', $body);
        $I->click('Post Status');
        //$this->have('App\Status', $overrides);
    }

    public function have($model, $overrides = [])
    {
        return TestDummy::create($model, $overrides);
    }

}
