<?php

namespace Foodtrucker\Configs\Events;


use Foodtrucker\Configs\Config;

class ConfigSetted{

	public $config;

	function __construct(Config $config) {
		$this->config = $config;
	}
}