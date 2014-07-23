<?php
namespace Foodtrucker\Configs\SetFeatured;

use Foodtrucker\Configs\Config;
use Foodtrucker\Configs\ConfigRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class SetFeaturedCommandHandler implements CommandHandler{

	use DispatchableTrait;
	private $configRepository;

	function __construct(ConfigRepository $configRepository) {
		$this->configRepository = $configRepository;
	}

	public function handle( $command ) {
		$config = Config::register('featured_home', serialize($command));
		$this->configRepository->saveFeatured($config);
		$this->dispatchEventsFor($config);
		return $config;

//		Tag::register($tag)
	}
}