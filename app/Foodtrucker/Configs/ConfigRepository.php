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
		return $this->config->getFeatured();
	}

}