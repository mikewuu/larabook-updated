<?php namespace App\Handlers\Commands;

use App\Commands\PublishStatusCommand;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class PublishStatusCommandHandler {

	/**
	 * Create the Repositories handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the Repositories.
	 *
	 * @param  PublishStatusCommand  $command
	 * @return void
	 */
	public function handle(PublishStatusCommand $command)
	{
		Auth::user()->statuses()->create($command->body);
	}

}
