<?php
namespace Foodtrucker\Categorias;

use Laracasts\Commander\Events\EventGenerator;
use Hash, Eloquent;

class Categoria extends \Eloquent {
	use EventGenerator;
	protected $fillable = ['nome'];
	protected $table = 'categorias';


}