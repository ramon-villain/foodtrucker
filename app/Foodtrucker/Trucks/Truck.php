<?php
namespace Foodtrucker\Trucks;

use Foodtrucker\Trucks\Events\TruckRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Hash, Eloquent;

class Truck extends \Eloquent {
	use EventGenerator;

	protected $fillable = ['nome', 'logo','description','pagamento','facebook','instagram', 'maisPedido', 'extras'];
	protected $table = 'trucks';

	public function tags(){
		return $this->belongsToMany('Foodtrucker\Tags\Tag', 'tags_trucks');
	}

	public function spots(){
		return $this->hasMany('Foodtrucker\Spots\Spot');
	}

	public static function register( $nome, $logo, $description, $pagamento, $facebook, $instagram , $maisPedido, $extras) {
		$truck = new static(compact('nome', 'logo','description', 'pagamento', 'facebook', 'instagram', 'maisPedido', 'extras'));
		$truck->raise(new TruckRegistered($truck));
		return $truck;
	}

}