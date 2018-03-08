<?php
// Index frontend controller

require('model/frontend.php');

function posts_list()
{
	$resp = get_posts();

	require('view/indexView.php');
}



?>

