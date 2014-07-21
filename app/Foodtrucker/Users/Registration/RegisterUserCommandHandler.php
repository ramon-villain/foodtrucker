<?php
namespace Foodtrucker\Users\Registration;

use Foodtrucker\Users\User;
use Laracasts\Commander\CommandHandler;
use Foodtrucker\Users\UserRepository;
use Laracasts\Commander\Events\DispatchableTrait;

class RegisterUserCommandHandler implements CommandHandler{

	use DispatchableTrait;

	protected $repository;

	function __construct(UserRepository $repository ) {
		$this->repository = $repository;
	}

	public function handle( $command ) {
		$user = User::register(
			$command->nome, $command->sobrenome, $command->email, $command->password
		);
		$this->repository->save($user);

		$this->dispatchEventsFor($user);

		return $user;
	}
}