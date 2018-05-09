<?php  

require_once("Controller.php");

class LoginController extends Controller {

	private $errorLoginMessage = "";

	public function __construct() {
		parent::__construct();
		if (array_key_exists("authentification", $_SESSION) && !$_SESSION["authentification"]) {
			$this->errorLoginMessage = "<p>Votre pseudo ou votre de mot de passe est incorrect, à nouveau saississez vos identifiants</p>";
		} else {
			$this->errorLoginMessage = "";
		}
	}

	public function login() {
		$message = $this->errorLoginMessage;
		require('view/backend/loginView.php');	
	}

	public function authentification () {
		$admins = $this->adminManager->get_admins();
		
		foreach ($admins as $value) {

			if ($value->getLogin() == $_POST["pseudo"] AND password_verify($_POST["mdp"], $value->getPassword())) {
				
				$_SESSION["userId"] = $value->getId();
				
				$_SESSION["authentification"] = TRUE;

				header("Location: index.php?action=adminSpace");

			} else {
				$_SESSION["authentification"] = false;
				
				header("Location: index.php?action=login");
			}
		return $_SESSION;
		}
	
	}

	
}

