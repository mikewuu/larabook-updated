<?php namespace App\Commands;

use App\Commands\Command;

class LeaveCommentOnStatusCommand extends Command {

    /**
     * Create a new command instance.
     *
     * @param $input
     */
	public function __construct($input)
	{
		$this->input = $input;
	}

}
