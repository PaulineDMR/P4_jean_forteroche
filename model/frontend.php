<?php
// Get posts list from DB p4jf table posts

function get_posts()
{
	$db = dbConnect();

	$resp = $db->query('SELECT id, title, content, DATE_FORMAT(post_date, "%d/%m/%Y à %Hh%imin%ss") AS post_date_fr FROM posts ORDER BY post_date DESC');

	return $resp;
}

function get_post($post_id)	
{
	$db = dbConnect();
	$resp = $db->prepare("SELECT id, title, content, DATE_FORMAT(post_date, '%d/%m/%Y à %Hh%imin%ss') AS post_date_fr FROM posts WHERE id = ?");
	$db->execute(array($post_id));

	$post = $db->fetch();
	return $post;
}

function dbConnect()
{
	try
	{
		$db = new PDO('mysql:host=localhost:8889;dbname=p4jf;charset=utf8', 'root', 'root');
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
}