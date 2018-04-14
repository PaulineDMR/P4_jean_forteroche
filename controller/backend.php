<?php 
// backend controller

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once("model/AdminManager.php");

function adminAuthentification($login, $password, $noAccess) {
	$adminManager = new AdminManager();
	$admins = $adminManager->get_admins();

	foreach ($admins as $value) {
		if ($value->getLogin() == $login AND password_verify($password, $value->getPassword())) {
			$name = $value->getName();
			$_SESSION["login"] = password_hash($_POST["pseudo"],PASSWORD_BCRYPT);
			$_SESSION["pwd"] = password_hash($_POST["mdp"],PASSWORD_BCRYPT);
			require("view/backend/adminView.php");
		} else {
			echo $noAccess;
			require("view/backend/loginView.php");
		}
	}
	return $_SESSION;
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

function updatePostStatus($id) {
	$postManager = new PostManager();
	$postUpdated = $postManager->postPublication($id);

	if ($postUpdated === false)
	{
		throw new Exception('Impossible de publier cet article !');
	}
	else {
		header('location: index.php?action=postAdmin');
	}
}

function get_comments() {
	$commentManager = new CommentManager();
	$comments = $commentManager->get_comments();

	$postManager = new PostManager();
	$posts = $postManager->get_posts();

	require("view/backend/commentAdminView.php");
}

function moderateComment($id) {
	$commentManager = new CommentManager();
	$commentModerated = $commentManager->updateModerated($id);

	if ($commentModerated == false) {
		throw new Exception('Impossible de modérer ce commentaire');
	} else {
		header('location: index.php?action=commentAdmin');
	}
}

function deleteComment($id) {
	$commentManager = new CommentManager();
	$deletion = $commentManager->delete($id);

	if ($deletion == false) {
		throw new Exception('Impossible de supprimer ce commentaire');
	} else {
		header('location: index.php?action=commentAdmin');
	}
}

function logout() {
	session_unset();
	session_destroy();
	header('location: index.php');
}
