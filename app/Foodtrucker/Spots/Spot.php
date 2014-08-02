<?php
namespace Foodtrucker\Spots;

use Foodtrucker\Spots\Events\SpotRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Hash, Eloquent;

class Spot extends \Eloquent {
	use EventGenerator;

	protected $fillable = ['truck_id', 'abertura','encerramento','inicio','fim','local', 'description'];
	protected $table = 'spots';

	public function tags(){
		return $this->belongsToMany('Foodtrucker\Tags\Tag', 'tags_trucks');
	}
	public static function register( $truck_id, $abertura, $encerramento, $inicio, $fim, $local , $description) {
		$spot = new static(compact('truck_id', 'abertura','encerramento', 'inicio', 'fim', 'local', 'description'));
		$spot->raise(new SpotRegistered($spot));
		return $spot;
	}

	public function setPasswordAttribute($password){
		$this->attributes['password'] = Hash::make($password);
	}

	public function truck()
	{
		return $this->belongsTo('Foodtrucker\Trucks\Truck');
	}

//	public function getAberturaAttribute($value)
//	{
//		$value = explode('-', $value);
//		return $value[2].'/'.$value[1];
//	}
//	public function getInicioAttribute($value)
//	{
//		$value = explode(':', $value);
//		return $value[0].':'.$value[1];
//	}


}