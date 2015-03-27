<?php namespace App\Handlers\Events;

use App\Events\UserRegistered;

use App\Mailers\UserMailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SendNotificationEmail {

    /**
     * Create the event handler.
     *
     * @param UserMailer $mailer
     */
	public function __construct(UserMailer $mailer)
	{
		$this->mailer = $mailer;
	}

	/**
	 * Handle the event.
	 *
	 * @param  UserRegistered  $event
	 * @return void
	 */
	public function handle(UserRegistered $event)
	{
		$this->mailer->sendWelcomeMessageTo($event->user);
	}

}
