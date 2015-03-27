<?php namespace App\Handlers\Commands;

use App\Commands\LeaveCommentOnStatusCommand;

use App\Comment;
use App\Status;
use Illuminate\Queue\InteractsWithQueue;

class LeaveCommentOnStatusCommandHandler {

    /**
     * Create the command handler.
     * @param Status $status
     */
	public function __construct(Status $status)
	{
		$this->status = $status;
	}

	/**
	 * Handle the command.
	 *
	 * @param  LeaveCommentOnStatusCommand  $command
	 * @return void
	 */
	public function handle(LeaveCommentOnStatusCommand $command)
	{
        $statusId = $command->input['status_id'];
        $this->status->find($statusId)->comments()->create($command->input);
	}

}
