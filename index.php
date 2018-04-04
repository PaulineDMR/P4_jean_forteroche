<?php
// Routeur
require('controller/frontend.php');
require('controller/backend.php');

// choix de l'affichage selon les donnée de l'url
try {
	// Display the index page of the blog
	if (isset($_GET["action"])) { 
		if ($_GET["action"] == "listPosts") {
			posts_list();
		}
		// Display the page of one post - Frontend
		elseif ($_GET["action"] == "post") { 
			if (isset($_GET["id"]) && $_GET["id"] > 0) {
				post_comments();
			}
			else {
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		}
		// Create and add a new comment and display the page of one poste - Front
		elseif ($_GET["action"] == "comment") { 
			if (isset($_GET["id"]) && $_GET["id"] > 0) {
				if (!empty($_POST['pseudo']) && !empty($_POST['comment'])) {
	                new_comment(htmlspecialchars($_POST["pseudo"]), htmlspecialchars($_POST["comment"]), $_GET["id"]);
	            } else {
	                throw new Exception('Tous les champs ne sont pas remplis !');
	            }
			} else {
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		} 
		// Create a comment warning and display the the page of one post - Front
		elseif ($_GET["action"] == "warning") {
			if (isset($_GET["id"]) && $_GET["id"] > 0) {
				if (isset($_GET["commentId"]) && $_GET["commentId"] > 0) {
					comment_warning($_GET["id"], $_GET["commentId"]);
				} else {
					throw new Exception('Signalement impossible');
				}	
			} else {
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		}
		// Display the login page
		elseif ($_GET["action"] == "login") {
			$errorLoginMessage = "";
			require('view/backend/loginView.php');
		}
		// Display the index page of backoffice
		elseif ($_GET["action"] == "authentification") {
			adminAuthentification($_POST["pseudo"], $_POST["mdp"]);
		}
		// Dispaly the post edit page or the write post page
		elseif ($_GET["action"] == "writePost") {
			if (isset($_GET["id"])) {
				edit_post($_GET["id"]);
			} else {
				$title = " ";
				$content = "Ecrivez votre texte ici";
				$url = "action=newPost";
				$submit ="Créer";

				require('view/backend/writePostView.php');
			}		
		}
		// Creat a new post in DB and Display the admin posts page - backoffice
		elseif ($_GET["action"] == "newPost") {
			if (!empty($_POST["titre"]) && !empty($_POST["contenu"])) {
				newPost(htmlspecialchars($_POST["titre"]), htmlspecialchars($_POST["contenu"]));

			} else {
	            throw new Exception('Tous les champs ne sont pas remplis !');
	        }			
		}
		// Display the admin posts page - backoffice
		elseif ($_GET["action"] == "postAdmin") {
			publishedPosts();
		}
		// Update a post and display the admin post page - back
		elseif ($_GET["action"] == "updatePost") {
			if (isset($_GET["id"])) {
				updatePost($_GET["id"], htmlspecialchars_decode($_POST["titre"]), htmlspecialchars_decode($_POST["contenu"]));
			} else {
				throw new Exception("Aucun identifiant de billet envoyé");
				
			}	
		}

	}
	else {
		posts_list();
	}
}
catch(Exception $e) {
	echo 'Erreur: ' . $e->getMessage();
}







