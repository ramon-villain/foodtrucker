<?php

namespace Foodtrucker\Configs;


class ConfigRepository {

	/**
	 * @var Config
	 */
	private $config;

	function __construct(Config $config) {
		$this->config = $config;
	}

	public function getFeatured() {
			$config = Config::where('config_name','featured_home')->pluck('config_value');
			$config = unserialize($config);
			return $config;
	}

	public function save(Config $config){
		return $config->save();
	}

}