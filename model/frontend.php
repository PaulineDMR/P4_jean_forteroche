<?php
// Get info from DB p4jf

function get_posts()
{
	$db = dbConnect();

	$resp = $db->query('SELECT id, title, content, DATE_FORMAT(post_date, "%d/%m/%Y à %Hh%imin%ss") AS post_date_fr FROM posts ORDER BY post_date DESC');

	return $resp;
}

/*function get_post($post_id)	
{
	$db = dbConnect();
	$resp = $db->prepare("SELECT id, title, content, DATE_FORMAT(post_date, '%d/%m/%Y à %Hh%imin%ss') AS post_date_fr FROM posts WHERE id = ?");
	$db->execute(array($post_id));

	$post = $db->fetch();
	return $post;
}

function get_comments($post_id)
{
	$db = dbConnect();
	$comments = $db->prepare("SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date_fr FROM comments WHERE id = ? ORDER BY comment_date DESC");
	$comments->execute(array($post_id));
	return $comments;
}*/

function dbConnect()
{
	try
	{
		$db = new PDO('mysql:host=localhost:8889;dbname=p4jf;charset=utf8', 'root', 'root');
		return $db;
	} catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}
}

?>