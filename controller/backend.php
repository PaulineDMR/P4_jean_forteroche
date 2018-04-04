<?php 
// backend controller

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once("model/AdminManager.php");

function adminAuthentification($login, $password) {
	$adminManager = new AdminManager();
	$admins = $adminManager->get_admins();

	foreach ($admins as $value) {
		if ($value->getLogin() == $login AND $value->getPassword() == md5($password)) {
			$name = $value->getName();
			require("view/backend/adminView.php");
		} else {
			$errorLoginMessage = "<p>Votre pseudo ou votre de mot de passe est incorrect, à nouveau saississez vos identifiants</p>";
			require("view/backend/loginView.php");
		}
	}
}

function newPost($title, $content) {
	$postManager = new PostManager();
	$newPost = $postManager->add_new_post($title, $content);

	if ($newPost === false)
	{
		throw new Exception('Impossible d\'ajouter l\'article !');
	}
	else {
		header('location: index.php?action=postAdmin');
	}

}

function publishedPosts() {
	$postManager = new PostManager();
	$publishedPosts = $postManager->get_posts();
	$nonPublishedPosts = $postManager->get_nonPublishedPosts();

	require("view/backend/postAdminView.php");
}

function edit_post($id) {
	$postManager = new PostManager();
	$post = $postManager->get_post($id);

	$title = $post->getTitle();
	$content = $post->getContent();
	$url = "action=updatePost&amp;id=" .$post->getId();
	$submit = "Enregistrer";

	require("view/backend/writePostView.php");
}

function updatePost($id, $title, $content) {
	$postManager = new PostManager();
	$postUpdated = $postManager->update_post($id, $title, $content);

	if ($postUpdated === false)
	{
		throw new Exception('Impossible de modifier l\'article !');
	}
	else {
		header('location: index.php?action=postAdmin');
	}
}



