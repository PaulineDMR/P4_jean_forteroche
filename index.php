<?php
// Routeur
require('controller/frontend.php');

// choix de l'affichage selon les donnée de l'url
if (isset($_GET["action"])) {
	if ($_GET["action"] == "listPosts") {
		posts_list();
	}
	elseif ($_GET["action"] == "post") {
		if (isset($_GET["id"]) && $_GET["id"] > 0) {
			post_comments();
		}
		else {
			echo 'Erreur : aucun identifiant de billet envoyé';
		}
	}
	elseif ($_GET["action"] == "comment")
	{
		if (isset($_GET["id"]) && $_GET["id"] > 0)
		{
			if (!empty($_POST['pseudo']) && !empty($_POST['comment']))
			{
                new_comment($_POST["pseudo"], $_POST["comment"], $_GET["id"]);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
		}
		else
		{
			echo 'Erreur : aucun identifiant de billet envoyé';
		}
	}
}
else {
	posts_list();
}





