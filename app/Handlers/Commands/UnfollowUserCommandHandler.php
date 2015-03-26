<?php namespace App\Handlers\Commands;

use App\Commands\UnfollowUserCommand;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Queue\InteractsWithQueue;

class UnfollowUserCommandHandler {

    /**
     * Create the command handler.
     *
     * @param Guard $auth
     */
	public function __construct(Guard $auth)
	{
		$this->currentUser = $auth->user();
	}

	/**
	 * Handle the command.
	 *
	 * @param  UnfollowUserCommand  $command
	 * @return void
	 */
	public function handle(UnfollowUserCommand $command)
	{
            $this->currentUser->followedUsers()->detach($command->idOfUserToUnfollow);
	}

}
