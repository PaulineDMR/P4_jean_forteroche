<?php

require_once('Controller.php');


class WritePostController extends Controller {

	public function editPost() {
		$post = $this->postManager->get_post($_GET["id"]);

		$title = htmlspecialchars($post->getTitle());
		$content = htmlspecialchars($post->getContent());
		$url = "action=updatePost&amp;id=" .$post->getId();
		$submit = "Enregistrer";

		require("view/backend/writePostView.php");
	}

	public function writeNewPost() {
		$title = " ";
		$content = "Ecrivez votre texte ici";
		$url = "action=newPost";
		$submit ="Créer";

		require('view/backend/writePostView.php');
	}
}