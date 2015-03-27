<?php namespace App\Events;

use App\Events\Event;

use App\User;
use Illuminate\Queue\SerializesModels;

class UserRegistered extends Event {

	use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @param $user
     */
	public function __construct($user)
	{
		$this->user = $user;
	}

}
