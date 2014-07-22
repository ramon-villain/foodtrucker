<?php

namespace Foodtrucker\Configs;


class Config extends \Eloquent{

	protected $fillable = ['home_destaque'];
	protected $table = 'global_configs';

	public function getFeatured() {
		$data['tituloDestaque'] = 'asd';
		$data['bodyDestaque'] = 'dsa';
		$data['imagemDestaque'] = '/images/image001.jpg';
		return $data;
	}
}