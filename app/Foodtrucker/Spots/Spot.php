<?php
namespace Foodtrucker\Spots;

use Foodtrucker\Spots\Events\SpotRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Hash, Eloquent;

class Spot extends \Eloquent {
	use EventGenerator;

	protected $fillable = ['truck', 'abertura','encerramento','inicio','fim','local', 'description'];
	protected $table = 'spots';

	public static function register( $truck, $abertura, $encerramento, $inicio, $fim, $local , $description) {
		$spot = new static(compact('truck', 'abertura','encerramento', 'inicio', 'fim', 'local', 'description'));
		$spot->raise(new SpotRegistered($spot));
		return $spot;
	}

	public function setPasswordAttribute($password){
		$this->attributes['password'] = Hash::make($password);
	}
}