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

	public function getPostById($id){
		return Blog::where('id', $id)->first();
	}

	public function updatePost($id, $titulo, $body, $imagem, $publish_at) {
		$lastPost = $this->getPostById($id);
		$imagem_atual = $lastPost->imagem;
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

} 