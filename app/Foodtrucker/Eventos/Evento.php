<?php
namespace Foodtrucker\Eventos;

use Laracasts\Commander\Events\EventGenerator;
use Hash, Eloquent;

class Evento extends \Eloquent {
	use EventGenerator;
	protected $fillable = ['nome', 'local','imagem','data', 'description'];
	protected $table = 'eventos';


}