<?php

namespace Foodtrucker\Tags;


use Laracasts\Commander\CommandHandler;

class AddTagCommandHandler implements CommandHandler {

	public $tags;

	function __construct($tags) {
		$this->tags = $tags;
	}

	/**
	 * Handle the command
	 *
	 * @param $command
	 *
	 * @return mixed
	 */
	public function handle( $command ) {
		// TODO: Implement handle() method.
	}}