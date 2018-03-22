<?php
// set class CommentManager extended from Manager
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

	    return $new_entry;
	}

// READ all comments for one post

	public function get_comments($post_id) {
		$db = $this->dbConnect();
		$comments = $db->prepare("SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%i') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC");
		$comments->execute(array($post_id));

		return $comments;
	}

// UPDATE comment

// DELETE a comment

}