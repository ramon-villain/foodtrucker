<?php

namespace Foodtrucker\Blog\Events;


use Foodtrucker\Blog\Blog;

class PostPublished{

	/**
	 * @var Spot
	 */
	public  $post;

	function __construct(Blog $post) {

		$this->post = $post;
	}
}