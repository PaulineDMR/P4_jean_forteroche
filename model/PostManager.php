<?php
// set PostManager extended class of Manager
require_once("model/Manager.php");

class PostManager extends Manager {
	public function get_posts() {
		$resp = $db->query('SELECT id, title, content, DATE_FORMAT(post_date, "%d/%m/%Y à %Hh%imin%ss") AS post_date_fr FROM posts ORDER BY post_date DESC');

			return $resp;
	}

	public function get_post($post_id) {
		$resp = $db->prepare("SELECT id, title, content, DATE_FORMAT(post_date, '%d/%m/%Y à %Hh%imin%ss') AS post_date_fr FROM posts WHERE id = ?");
		$resp->execute(array($post_id));

		$post = $resp->fetch();
		return $post;
	}
}