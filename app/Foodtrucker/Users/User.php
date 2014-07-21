<?php
namespace Foodtrucker\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Foodtrucker\Users\Events\UserRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Hash, Eloquent;

class User extends \Eloquent implements UserInterface, RemindableInterface{
	use UserTrait, RemindableTrait, EventGenerator;

	protected $fillable = ['nome', 'sobrenome' ,'password', 'email'];
	protected $table = 'users';
	protected $hidden = ['password', 'remember_token'];



	public static function register( $nome, $sobrenome, $email, $password ) {
		$user = new static(compact('nome', 'sobrenome', 'email', 'password'));
		$user->raise(new UserRegistered($user));
		return $user;
	}

	public function setPasswordAttribute($password){
		$this->attributes['password'] = Hash::make($password);
	}
}