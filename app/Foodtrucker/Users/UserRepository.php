<?php
namespace Foodtrucker\Users;

class UserRepository {
	public function save(User $user){
		return $user->save();
	}

} 