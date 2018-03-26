<?php
// Index frontend controller

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function posts_list() {
	$postManager = new PostManager();
	$resp = $postManager->get_posts();

	require('view/frontend/indexView.php');
}

function post_comments() {
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->get_post($_GET["id"]);
	$comments = $commentManager->get_comments($_GET["id"]);
	

	require('view/frontend/postView.php');
}

function new_comment($author, $comment, $post_id)
{
	$commentManager = new CommentManager();
	$new_entry = $commentManager->add_comment($author, $comment, $post_id);
	if ($new_entry === false)
	{
		throw new Exception('Impossible d\'ajouter le commentaire !');
	}
	else
	{
		header('location: index.php?action=post&id=' . $post_id);
	}
}