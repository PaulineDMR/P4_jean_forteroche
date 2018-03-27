<?php
// Routeur
require('controller/frontend.php');
require('controller/backend.php');

// choix de l'affichage selon les donnée de l'url
try {
	if (isset($_GET["action"])) {
		if ($_GET["action"] == "listPosts") {
			posts_list();
		}
		elseif ($_GET["action"] == "post") {
			if (isset($_GET["id"]) && $_GET["id"] > 0) {
				post_comments();
			}
			else {
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		}
		elseif ($_GET["action"] == "comment") {
			if (isset($_GET["id"]) && $_GET["id"] > 0) {
				if (!empty($_POST['pseudo']) && !empty($_POST['comment'])) {
	                new_comment($_POST["pseudo"], $_POST["comment"], $_GET["id"]);
	            } else {
	                throw new Exception('Tous les champs ne sont pas remplis !');
	            }
			} else {
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		} 
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
		elseif ($_GET["action"] == "login") {
			require('view/backend/loginView.php');
		}
		elseif ($_GET["action"] == "authentification") {
			adminAuthentification($_POST["pseudo"], $_POST["mdp"]);
		}
	}
	else {
		posts_list();
	}
}
catch(Exception $e) {
	echo 'Erreur: ' . $e->getMessage();
}







