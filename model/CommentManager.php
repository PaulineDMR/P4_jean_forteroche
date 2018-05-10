<?php

require_once("Manager.php");
require_once("Comment.php");


class CommentManager extends Manager {

// CREATE a new comment in db

	/**
	 * @param [string]
	 * @param [string]
	 * @param [int]
	 */
	public function add_comment($author, $comment, $post_id) {
		$db = $this->dbConnect();
		$new_comment = $db->prepare("INSERT INTO comments(author, comment, post_id, comment_date) VALUES (?, ?, ?, NOW())");
		$new_entry = $new_comment->execute(array($author, $comment, $post_id));

		$new_comment->closeCursor();

	    return $new_entry;
	}

// READ all comments for one post

	/**
	 * [get all the comments from the db, table comments]
	 * @return [array] [list of all the comments]
	 */
	public function getComments() {
		$db = $this->dbConnect();
		$resp = $db->query("SELECT id, author, comment, comment_date, warning, post_id, moderated FROM comments ORDER BY comment_date DESC");

		$comments = array();

		while ($data = $resp->fetch()) {
			$comment = new Comment();
			$comment->hydrate($data);
			$comments[] = $comment;
		}

		$resp->closeCursor();

		return $comments;
	}

	/**
	 * [Get the comments attached to one post]
	 * @param  [int] $post_id [id of the post]
	 * @return [array]  [list of the comments with all their attributes]
	 */
	public function get_postComments($post_id) {
		$db = $this->dbConnect();
		$resp = $db->prepare("SELECT id, author, comment, comment_date, warning, post_id, moderated FROM comments WHERE post_id = ? ORDER BY comment_date DESC");
		$resp->execute(array($post_id));

		$comments = array();

		while ($data = $resp->fetch()) {
			$comment = new Comment();
			$comment->hydrate($data);
			$comments[] = $comment;
		}

		$resp->closeCursor();

		return $comments;
	}

// UPDATE comment
	
	/**
	 *Change the status of warning to TRUE
	 *
	 *
	 * 
	 */
	public function updateWarning($id) { 
		$db = $this->dbConnect();
		$resp = $db->prepare("UPDATE comments SET warning = TRUE WHERE id = :id LIMIT 1");

		$resp->bindValue("id", $id, PDO::PARAM_INT);
		$resp->execute();
		$resp->closeCursor();

		return $resp;
	}

	/**
	 * [Moderation of the comment function, warning=false, moderated=true]
	 * @param  [int] $id [comment id]
	 * @return [bollean]     [true or false]
	 */
	public function updateModerated($id) {
		$db = $this->dbConnect();
		$resp = $db->prepare("UPDATE comments SET warning = :warning, moderated = :moderated WHERE id = :id LIMIT 1");

		$resp->bindValue("warning", false, PDO::PARAM_INT);
		$resp->bindValue("moderated", true, PDO::PARAM_INT);
		$resp->bindValue("id", $id, PDO::PARAM_INT);
		$resp->execute();

		return $resp;
	}

// DELETE a comment

	public function delete($id) {
		$db = $this->dbConnect();
		$resp = $db->prepare("DELETE FROM comments WHERE id = :id");

		$resp->bindValue("id", $id, PDO::PARAM_INT);
		$resp->execute();

		return $resp;
	} 
	
}