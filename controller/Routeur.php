<?php 

require_once('controller/PostsController.php');
require_once('controller/PostCommentsController.php');
require_once('controller/LoginController.php');
require_once('controller/AdminController.php');
require_once('controller/WritePostController.php');
require_once('controller/PostsAdminController.php');
require_once('controller/CommentsAdminController.php');


class Routeur {

	private $request;

	public function __construct($request) {
		$this->request = $request;
	}

	public function renderController() {

		$request = $this->request;

		$postsController = new PostsController();
		$postCommentsController = new PostCommentsController();
		$loginController = new LoginController();
		$adminController = new AdminController();
		$writePostController = new WritePostController();
		$postsAdminController = new PostsAdminController();
		$commentsAdminController = new CommentsAdminController();

		try {

			// Display the list of posts on the frontend view 
			if ($request == "listPosts") {
				$postsController->postsList();
			}

			// Display one post with his comments on the frontend post view
			elseif ($request == "post") {
				if (isset($_GET["id"]) && $_GET["id"] > 0) {
				$postCommentsController->postComments();
				}
				else {
					throw new Exception('Aucun identifiant de billet envoyé');
				}
			}

			// Create and add a new comment and display the post view
			elseif ($request == "comment") {
				if (isset($_GET["id"]) && $_GET["id"] > 0) {
					if (!empty($_POST['pseudo']) && !empty($_POST['comment'])) {
		                $postCommentsController->addPostComment();
		            } else {
		                throw new Exception('Tous les champs ne sont pas remplis !');
		            }
				} else {
					throw new Exception('Aucun identifiant de billet envoyé');
				}
			}

			// Create a comment warning and display the post view
			elseif ($request == "warning") {
				if (isset($_GET["id"]) && $_GET["id"] > 0) {
					if (isset($_GET["commentId"]) && $_GET["commentId"] > 0) {
						$postCommentsController->addCommentWarning();
					} else {
						throw new Exception('Signalement impossible');
					}	
				} else {
					throw new Exception('Aucun identifiant de billet envoyé');
				}
			}

			// Display the login page
			elseif ($request  == "login") {
				if (array_key_exists("authentification" , $_SESSION) && $_SESSION["authentification"]) {	
					header("Location: index.php?action=adminSpace");
				} else {
					$loginController->login();
				}
			}

			// Authentification
			elseif ($request == "authentification") {
				$loginController->authentification();
			}

			// Get out from Login View
			elseif ($request == "exitLogin") {
				unset($_SESSION["authentification"]);
				$postsController->postsList();
			}

			// Display the Admin view
			elseif ($request == "adminSpace") {
				if (array_key_exists("authentification" , $_SESSION) && $_SESSION["authentification"]) {
					$adminController->admin();
				} else {
					throw new Exception("Vous n'avez pas l'autorisation d'accès");
				}
			}

			// Display the admin posts view
			elseif ($request == "postAdmin") {
				if (array_key_exists("authentification" , $_SESSION) && $_SESSION["authentification"]) {
					$postsAdminController->adminPostsList();
				} else {
						throw new Exception("Vous n'avez pas l'autorisation d'accès");
				}
			}	

			// Display the "Write or Update a Post" view
			elseif ($request == "writePost") {
				if (array_key_exists("authentification" , $_SESSION) && $_SESSION["authentification"]) {
					if (isset($_GET["id"]) && $_GET["id"] > 0) {
						$writePostController->editPost();
					} elseif (!isset($_GET["id"])) {
						$writePostController->writeNewPost();
					} else {
						throw new Exception("Impossible d'écrire ou de modifier un article");
					}
				} else {
						throw new Exception("Vous n'avez pas l'autorisation d'accès");
				}				 
			}

			// Create a post in DB and Display the admin posts view
			elseif ($request == "newPost") {
				if (array_key_exists("authentification" , $_SESSION) && $_SESSION["authentification"]) {
					if (!empty($_POST["titre"]) && !empty($_POST["contenu"])) {
						$postsAdminController->addNewPost();
					} else {
			            throw new Exception('Tous les champs ne sont pas remplis !');
			        }
			    } else {
					throw new Exception("Vous n'avez pas l'autorisation d'accès");
				}			
			}

			// Update a post and display the admin posts view
			elseif ($request == "updatePost") {
				if (array_key_exists("authentification" , $_SESSION) && $_SESSION["authentification"]) {
					if (!empty($_GET["id"]) && is_numeric($_GET["id"])) {
						$postsAdminController->updatePost();
					} else {
						throw new Exception("Aucun identifiant de billet envoyé");	
					}
				} else {
					throw new Exception("Vous n'avez pas l'autorisation d'accès");
				}			
			}

			// Update the publication post status and display the posts admin view
			elseif ($request == "publishPost") {
				if (array_key_exists("authentification" , $_SESSION) && $_SESSION["authentification"]) {
					if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
						$postsAdminController->updatePostStatus();
					} else {
						throw new Exception("Impossible de publier cet article");	
					}
				} else {
						throw new Exception("Vous n'avez pas l'autorisation d'accès");
				}	
			}

			// Delete a post and come back to the post admin View
			elseif ($request == "deletePost") {
				if (array_key_exists("authentification" , $_SESSION) && $_SESSION["authentification"]) {
					if (!empty($_GET["id"]) && is_numeric($_GET["id"])) {
						$postsAdminController->deletePost();
					} else {
						throw new Exception("l'identifiant du post est incorrect, suppression impossible");
					}
				} else {
						throw new Exception("Vous n'avez pas l'autorisation d'accès");
				}	
			}

			// Display the Comments Admin View
			elseif ($request == "commentAdmin") {
				if (array_key_exists("authentification" , $_SESSION) && $_SESSION["authentification"]) {
					$commentsAdminController->commentsAdminList();
				} else {
						throw new Exception("Vous n'avez pas l'autorisation d'accès");
				}		
			}

			// Moderate a comment and Display commentsAdminView
			elseif ($request == "moderate" ) {
				if (array_key_exists("authentification" , $_SESSION) && $_SESSION["authentification"]) {
					if (is_numeric($_GET["id"])) {
						$commentsAdminController->moderateComment();
					} else {
						throw new Exception("l'identifiant du commentaire est incorrect");
					}
				} else {
						throw new Exception("Vous n'avez pas l'autorisation d'accès");
				}	
			}

			// Delete a comment and display the comments admin view
			elseif ($request == "deleteComment") {
				if (array_key_exists("authentification" , $_SESSION) && $_SESSION["authentification"]) {
					if (!empty($_GET["id"]) && is_numeric($_GET["id"])) {
						$commentsAdminController->deleteComment();
					} else {
						throw new Exception("l'identifiant du commentaire est incorrect");
					}
				} else {
						throw new Exception("Vous n'avez pas l'autorisation d'accès");
				}	
			}

			// Delete a comment and display the comments admin view
			elseif ($request == "deleteComment") {
				if (array_key_exists("authentification" , $_SESSION) && $_SESSION["authentification"]) {
					if (!empty($_GET["id"]) && is_numeric($_GET["id"])) {
						$commentsAdminController->deleteComment();
					} else {
						throw new Exception("l'identifiant du commentaire est incorrect");
					}
				} else {
						throw new Exception("Vous n'avez pas l'autorisation d'accès");
				}	
			}

			// Log out the adminUser, destroy the session and display the index viewrequest
			elseif ($request == "logout") {
				session_unset();
				session_destroy();
				header('location: index.php');
			}

			else {
				$postsController->postsList();
			}
		}
		catch(Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
}

