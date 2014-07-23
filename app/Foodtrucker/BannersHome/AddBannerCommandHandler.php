<?php

namespace Foodtrucker\BannersHome;


use Laracasts\Commander\CommandHandler;

class AddBannerCommandHandler implements CommandHandler {

	private $bannerRepository;

	function __construct(BannerRepository $bannerRepository) {
		$this->bannerRepository = $bannerRepository;
	}

	public function handle( $command ) {
		$banner = Banner::register($command->image, $command->url, $command->body, 1);
		$this->bannerRepository->save($banner);
	}

}