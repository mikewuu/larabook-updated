<?php namespace App\Handlers\Commands;

use App\Commands\FollowUserCommand;

use App\User;
use Illuminate\Queue\InteractsWithQueue;

class FollowUserCommandHandler {

    /**
     * Create the command handler.
     *
     */
	public function __construct(User $users)
	{
        $this->users = $users;
	}

	/**
	 * Handle the command.
	 *
	 * @param  FollowUserCommand  $command
	 * @return void
	 */
	public function handle(FollowUserCommand $command)
	{
        // Fetch user
        $user = $this->users->findOrFail($command->userId);
        // Follow user
        $user->followedUsers()->attach($command->userIdToFollow);
	}

}
