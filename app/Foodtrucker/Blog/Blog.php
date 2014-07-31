<?php
namespace Foodtrucker\Blog;

use Foodtrucker\Blog\Events\PostPublished;
use Laracasts\Commander\Events\EventGenerator;
use Hash, Eloquent;

class Blog extends \Eloquent {
	use EventGenerator;

	protected $fillable = ['titulo', 'body','imagem','publish_at'];
	protected $table = 'posts';

	public function tags(){
		return $this->belongsToMany('Foodtrucker\Tags\Tag', 'tags_trucks');
	}
	public static function register( $titulo, $body, $imagem, $publish_at) {
		$post = new static(compact('titulo', 'body','imagem', 'publish_at'));
		$post->raise(new PostPublished($post));
		return $post;
	}

	public function SetPublishAtAttribute($att){
		$att = explode('-', $att);
		$horario = trim($att[1].":00");
		$data = explode('/', $att[0]);
		$data = trim($data[2]).'-'.$data[1].'-'.$data[0];
		$final = $data.' '.$horario;
		return $this->attributes['publish_at'] = $final;

	}

}