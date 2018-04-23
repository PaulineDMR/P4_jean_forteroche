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
		$resp = $db->query('SELECT id, title, content, post_date, publication_date FROM posts WHERE publication_status = TRUE ORDER BY publication_date DESC');

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
		$resp = $db->query('SELECT id, post_date, title, content, publication_date FROM posts WHERE publication_status = FALSE ORDER BY publication_date DESC');

		$posts = array();

		while ($donnees = $resp->fetch()) {
			$post = new Post();
			$post->hydrate($donnees);
			$posts[] = $post;
		}

		$resp->closeCursor();
		return $posts;
	}

	public function get_lastPost() {
		$db = $this->dbConnect();
		$resp = $db->query("SELECT id, title, publication_date FROM posts WHERE publication_status = TRUE ORDER BY publication_date DESC LIMIT 1");

		$entry = $resp->fetch();
		$post = new Post;
		$post->hydrate($entry);

		$resp->closeCursor();
		return $post;
	}

	public function countPages($postsPerPage) {
		$db = $this->dbConnect();
		$resp = $db->query('SELECT id FROM posts WHERE publication_status = TRUE');
		$numberOfPosts = $resp->rowCount();
		$numberOfPages = ceil($numberOfPosts / $postsPerPage);

		$resp->closeCursor();
		return $numberOfPages;
	}

	public function pager($firstIndex, $postsPerPage) {
		$db = $this->dbConnect();
		$resp = $db->prepare('SELECT id, title, content, publication_date FROM posts WHERE publication_status = TRUE ORDER BY publication_date DESC LIMIT :firstIndex, :postsPerPage');
		
		$resp->bindValue('firstIndex', $firstIndex, PDO::PARAM_INT);
		$resp->bindValue('postsPerPage', $postsPerPage, PDO::PARAM_INT);
		$resp->execute();

		$posts = array();

		while ($data = $resp->fetch()) {
			$post = new Post;
			$post->hydrate($data);
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

	public function postPublication($postId) {
		$db = $this->dbConnect();
		$resp = $db->prepare("UPDATE posts SET publication_status = :status, publication_date = NOW() WHERE id = :postId LIMIT 1");
		$resp->bindValue(status, TRUE, PDO::PARAM_STR);
		$resp->bindValue(postId, $postId, PDO::PARAM_INT);
		$postPublished = $resp->execute();

		$resp->closeCursor();

		return $postPublished;
	}



// DELETE a post in DB


}