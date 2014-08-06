<?php
namespace Foodtrucker\Blog;

use DateTime;

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

	public function getPostById($id){
		return Blog::where('id', $id)->first();
	}

	public function updatePost($id, $titulo, $body, $imagem, $publish_at) {
		$actual_post = $this->getPostById($id);
		$imagem_atual = $actual_post->imagem;
		if($imagem == null){
			$imagem = $imagem_atual;
		}
		return Blog::where('id', $id)->update([
			'titulo' => $titulo,
			'body' => $body,
			'imagem' => $imagem,
			'publish_at' => $publish_at,
		]);
	}

	public function searchThis( $query ) {
		return Blog::where('publish_at', '<=', new DateTime('today'))->where('body','like', "%$query%")->get();
	}

} 