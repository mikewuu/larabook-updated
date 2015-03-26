<?php namespace App\Commands;

use App\Commands\Command;

class UnfollowUserCommand extends Command {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($idOfUserToUnfollow)
	{
		$this->idOfUserToUnfollow = $idOfUserToUnfollow;
	}

}
