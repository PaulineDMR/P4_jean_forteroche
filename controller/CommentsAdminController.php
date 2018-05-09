<?php 

require_once("Controller.php");

class CommentsAdminController extends Controller {

	public function commentsAdminList() {
		$comments = $this->commentManager->getComments();
		$posts = $this->postManager->get_posts();

		require("view/backend/commentAdminView.php");
	}

	public function moderateComment() {
		$commentModerated = $this->commentManager->updateModerated($_GET["id"]);

		if ($commentModerated == false) {
			throw new Exception('Impossible de modérer ce commentaire');
		} else {
			header('location: index.php?action=commentAdmin');
		}
	}

	public function deleteComment() {
	$deletion = $this->commentManager->delete($_GET["id"]);

		if ($deletion == false) {
			throw new Exception('Impossible de supprimer ce commentaire');
		} else {
			header('location: index.php?action=commentAdmin');
		}
	}

}