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
		$insert = $db->prepare("INSERT INTO posts (post_date, title, content) VALUES (NOW(), ?, ?)");
		$newPost = $insert->execute(array($title, $content));

		$insert->closeCursor();

	    return $newPost;
	}



// READ one or all posts in DB

	/**
	 * @return [type]
	 */
	public function get_posts() {
		$db = $this->dbConnect();
		$resp = $db->query('SELECT id, title, content, post_date, publication_date FROM posts WHERE publication_status = "yes" ORDER BY post_date DESC');

		$posts = array();

		while ($donnees = $resp->fetch()) {
			$post = new Post();
			$post->hydrate($donnees);
			$posts[] = $post;
		}

		$resp->closeCursor();
		return $posts;
	}

	public function get_post($post_id) {
		$db = $this->dbConnect();
		$resp = $db->prepare("SELECT id, title, content, post_date FROM posts WHERE id = ?");
		$resp->execute(array($post_id));

		$entry = $resp->fetch();
		$post = new Post;
		$post->hydrate($entry);

		$resp->closeCursor();
		return $post;
	}

	public function get_nonPublishedPosts () {
		$db = $this->dbConnect();
		$resp = $db->query('SELECT id, post_date, title, content, publication_date FROM posts WHERE publication_status = "no" ORDER BY publication_date DESC');

		$posts = array();

		while ($donnees = $resp->fetch()) {
			$post = new Post();
			$post->hydrate($donnees);
			$posts[] = $post;
		}

		$resp->closeCursor();
		return $posts;
	}

// UPDATE a post in DB
	public function update_post($id, $title, $content) {
		$db = $this->dbConnect();
		$resp = $db->prepare("UPDATE posts SET title=?, content=? WHERE id=$id LIMIT 1");

		$postUpdated = $resp->execute(array($title, $content));

		$resp->closeCursor();

		return $postUpdated;
	}



// DELETE a post in DB


}