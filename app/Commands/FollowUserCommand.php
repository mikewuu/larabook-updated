<?php namespace App\Commands;

use App\Commands\Command;

class FollowUserCommand extends Command {

    public $userId;

    public $userIdToFollow;

    /**
     * Create a new command instance.
     *
     * @param $userId
     * @param $userIdToFollow
     */
	public function __construct($userId, $userIdToFollow)
	{
		$this->userId = $userId;

        $this->userIdToFollow = $userIdToFollow;
	}

}
