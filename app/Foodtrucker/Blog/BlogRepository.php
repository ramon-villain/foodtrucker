<?php
namespace Foodtrucker\Blog;

class BlogRepository {

	public function savePost(Blog $post){
		return $post->save();
	}

	public function getPosts($filter = 'id', $order = 'ASC', $paginate = null){
		if($paginate){
			return Blog::orderBy( $filter, $order )->paginate($paginate);
		}else {
			return Blog::orderBy( $filter, $order )->get();
		}
	}

} 