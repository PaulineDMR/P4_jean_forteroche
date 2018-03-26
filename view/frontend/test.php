<?php
require_once ('../../model/Model.php');
require_once ('../../model/Post.php');
require_once('../../model/PostManager.php');
require_once('../../model/CommentManager.php');

function post_comments() {
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->get_post($_GET["id"]);
	$comments = $commentManager->get_comments($_GET["id"]);
	require('view/frontend/postView.php');
}

$postManager = new PostManager();
$commentManager = new CommentManager();

$post = $postManager->get_post(1);
/*$comments = $commentManager->get_comments(1);*/

var_dump($post);

/*$post_test->setTitle("Alaska")
	->setAuthor("James")
	->setContent("Super article, !!!");
var_dump($post_test);
echo "<br>";
echo $post_test->getTitle();*/
