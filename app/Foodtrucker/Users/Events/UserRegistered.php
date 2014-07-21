<?php
namespace Foodtrucker\Users\Events;
use Foodtrucker\Users\User;

class UserRegistered {

	public $user;
	function __construct( User $user ) {
		$this->user = $user;
	}


} 