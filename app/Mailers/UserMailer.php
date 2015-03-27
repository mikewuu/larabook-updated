<?php namespace App\Mailers;


use App\User;

class UserMailer extends Mailer{

    public function sendWelcomeMessageTo($user)
    {
        $subject = 'Welcome to Larabook';
        $view = 'emails.confirm';
        $data = [];

        $this->sendto($user, $subject, $view, $data);
    }

}