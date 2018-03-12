<?php
// Index frontend controller

require('model/frontend.php');

function posts_list()
{
	$resp = get_posts();

	require('view/indexView.php');
}

function post_comments()
{
	$post = get_post($_GET["id"]);
	$comments = get_comments($_GET["id"]);
	require('view/postView.php');
}

function new_comment($author, $comment, $post_id)
{
	$new_entry = add_comment($author, $comment, $post_id);
	if ($new_entry === false)
	{
		die('Impossible d\'ajouter le commentaire !');
	}
	else
	{
		header('location: index.php?action=post&id=' . $post_id);
	}
}