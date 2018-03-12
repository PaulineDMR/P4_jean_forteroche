<?php
// Index frontend controller

require('model/frontend.php');

/*function posts_list()
{*/
	$resp = get_posts();

	require('view/indexView.php');
/*}

function post_comments()
{
	$post = get_post($_GET["id"]);
	$comments = get_comments($_GET["id"]);
	require('view/postView.php');
}*/

?>

