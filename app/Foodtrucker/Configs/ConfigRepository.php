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

	public function saveFeatured(Config $config){
		$cfg = Config::where('config_name','featured_home')->first();
		if($cfg){
			return Config::where('config_name','featured_home')->update(['config_value' => $config['config_value']]);
		}else{
			return $config->save();
		}
//		return $config->save();
	}

}