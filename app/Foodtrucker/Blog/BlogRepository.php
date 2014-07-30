<?php
namespace Foodtrucker\Blog;

class BlogRepository {

	public function savePost(Blog $post){
		return $post->save();
	}

} 