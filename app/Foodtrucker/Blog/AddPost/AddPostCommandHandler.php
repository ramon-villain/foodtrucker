<?php
namespace Foodtrucker\Blog\AddPost;


use Foodtrucker\Blog\Blog;
use Foodtrucker\Blog\BlogRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class AddPostCommandHandler implements CommandHandler{

	use DispatchableTrait;

	/**
	 * @var BlogRepository
	 */
	private $blogRepository;

	function __construct(BlogRepository $blogRepository) {
		$this->blogRepository = $blogRepository;
	}


	public function handle( $command ) {
		$post = Blog::register($command->titulo, $command->slug, $command->body, $command->imagem, $command->publish_at);
		$this->blogRepository->savePost($post);
		$this->dispatchEventsFor($post);
		return $post;
	}
}