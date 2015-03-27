<?php namespace App\Mailers;

use Illuminate\Mail\Mailer as Mail;
abstract class Mailer {

    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }


    /**
     * @param $user
     * @param $subject
     * @param $view
     * @param $data
     */
    public function sendto($user, $subject, $view, $data)
    {
       $this->mail->queue($view, $data, function($message) use ($user, $subject){
            $message->to($user->email, $user->name)->subject($subject);
       });
    }

}