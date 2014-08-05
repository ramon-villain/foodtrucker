<?php
namespace Foodtrucker\Blog;

use Foodtrucker\Blog\Events\PostPublished;
use Laracasts\Commander\Events\EventGenerator;
use Hash, Eloquent;

class Blog extends \Eloquent {
	use EventGenerator;

	protected $fillable = ['titulo', 'slug', 'body','imagem','publish_at'];
	protected $table = 'posts';

	public function tags(){
		return $this->belongsToMany('Foodtrucker\Tags\Tag', 'tags_trucks');
	}
	public static function register( $titulo, $slug ,$body, $imagem, $publish_at) {
		$post = new static(compact('titulo','slug','body','imagem', 'publish_at'));
		$post->raise(new PostPublished($post));
		return $post;
	}
}