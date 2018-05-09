<?php

require_once('Controller.php');

class PostCommentsController extends controller {

	public function postComments() {
		$post = $this->postManager->get_post($_GET["id"]);
		$comments = $this->commentManager->get_postComments($_GET["id"]);
	
		require('view/frontend/postView.php');
	}

	public function addPostComment() {
		$new_entry = $this->commentManager->add_comment($_POST["pseudo"], $_POST["comment"], $_GET["id"]);
		
		if ($new_entry === false) {
			throw new Exception('Impossible d\'ajouter le commentaire !');
		} else {
			header('location: index.php?action=post&id=' . $_GET["id"]);
		}
	}

	public function addCommentWarning () {
		$newWarningStatus = $this->commentManager->updateWarning($_GET["commentId"]);

		if ($newWarningStatus === false) {
			throw new Exception('Impossible de signaler le commentaire !');
		} else {
			header('location: index.php?action=post&id=' . $_GET["id"]);
		}
	}
}
