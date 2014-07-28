<?php
namespace Foodtrucker\Trucks;

use Laracasts\Commander\Events\EventGenerator;
use Hash, Eloquent;

class Truck extends \Eloquent {
	use EventGenerator;

	protected $fillable = ['nome', 'logo','description','pagamento','facebook','instagram', 'mais-pedido', 'extras'];
	protected $table = 'trucks';

	public static function register( $truck, $abertura, $encerramento, $inicio, $fim, $local , $description) {
		$spot = new static(compact('truck', 'abertura','encerramento', 'inicio', 'fim', 'local', 'description'));
		$spot->raise(new SpotRegistered($spot));
		return $spot;
	}

}