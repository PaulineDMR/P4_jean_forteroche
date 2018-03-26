<?php
// set PostManager extended class of Manager
require_once("Manager.php");
require_once("Post.php");

class PostManager extends Manager {

// CREATE a new post in db
	/**
	 * @return 
	 */
	public function add_new_post ($title, $content) {
		$db = $this->dbConnect();
		$insert = $db->prepare("INSERT INTO posts ((id, post_date, title, author, content) VALUES (null, NOW(), ?, null, ?)");
		$newPost = $insert->execute(array($author, $content));

	    return $newPost;
	}



// READ one or all posts from DB

	/**
	 * @return [type]
	 */
	public function get_posts() {
		$db = $this->dbConnect();
		$resp = $db->query('SELECT id, title, content, post_date FROM posts ORDER BY post_date DESC');

		$posts = array();

		while ($donnees = $resp->fetch()) {
			$post = new Post();
			$post->hydrate($donnees);
			$posts[] = $post;
		}
		return $posts;
	}

	public function get_post($post_id) {
		$db = $this->dbConnect();
		$resp = $db->prepare("SELECT id, title, content, post_date /*DATE_FORMAT(post_date, '%d/%m/%Y à %Hh%imin%ss') AS post_date_fr*/ FROM posts WHERE id = ?");
		$resp->execute(array($post_id));

		$entry = $resp->fetch();
		$post = new Post;
		$post->hydrate($entry);
		return $post;
	}

// UPDATE a post in DB



// DELETE a post in DB


}