<?php namespace App\Commands;

use App\Commands\Command;
use Illuminate\Queue\SerializesModels;

class PublishStatusCommand extends Command {


    public $body;

	/**
	 * Create a new Repositories instance.
	 *
	 * @return void
	 */
	public function __construct($body)
	{
		$this->body = $body;
	}

}
