<?php

namespace Foodtrucker\Configs;


use Foodtrucker\Configs\Events\ConfigSetted;
use Laracasts\Commander\Events\EventGenerator;

class Config extends \Eloquent{
	use EventGenerator;

	protected $fillable = ['config_name', 'config_value'];
	protected $table = 'global_configs';

	public static function register($config_name, $config_value){
		$config = new static(compact('config_name', 'config_value'));
		$config->raise(new ConfigSetted($config));
		return $config;
	}
}