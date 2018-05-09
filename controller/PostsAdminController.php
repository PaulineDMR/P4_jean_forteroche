<?php

require_once('Controller.php');

class PostsAdminController extends Controller {

	public function adminPostsList() {
		$publishedPosts = $this->postManager->get_posts();
		$nonPublishedPosts = $this->postManager->get_nonPublishedPosts();

		require("view/backend/postAdminView.php");
	}

	public function addNewPost() {
		$newPost = $this->postManager->addPost($_POST["titre"], $_POST["contenu"]);

		if ($newPost === false) {
			throw new Exception('Impossible d\'ajouter l\'article !');
		} else {
			header('location: index.php?action=postAdmin');
		}
	}

	public function updatePost() {
		$postUpdated = $this->postManager->update_post($_GET["id"], $_POST["titre"], $_POST["contenu"]);

		if ($postUpdated === false)
		{
			throw new Exception('Impossible de modifier l\'article !');
		}
		else {
			header('location: index.php?action=postAdmin');
		}
	}

	public function updatePostStatus() {
		$postUpdated = $this->postManager->postPublication($_GET["id"]);

		if ($postUpdated === false)
		{
			throw new Exception('Impossible de publier cet article !');
		}
		else {
			header('location: index.php?action=postAdmin');
		}
	}

	public function deletePost() {
		$deletion = $this->postManager->deletePost($_GET["id"]);

		if ($deletion == false) {
			throw new Exception('Impossible de supprimer ce commentaire');
		} else {
			header('location: index.php?action=postAdmin');
		}
	}





}