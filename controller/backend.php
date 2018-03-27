<?php 
// backend controller

require_once("model/Admin.php");
require_once("model/AdminManager.php");

function adminAuthentification($login, $password) {
	$adminManager = new AdminManager();
	$admins = $adminManager->get_admins();

	foreach ($admins as $value) {
		if ($value->getLogin() == $login AND $value->getPassword() == md5($password)) {
			require("adminView.php");
		} else {
			throw new Exception("Identifiant ou mot de passe incorect, veuillez recommencer");
		}
	}


}
