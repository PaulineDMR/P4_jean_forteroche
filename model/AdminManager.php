<?php 
require_once("Manager.php");
require_once("Admin.php");

class AdminManager extends Manager {

	// CREATE
	
	// READ
	
	// Get all admins from db
	public function get_admins() {
	$db = $this->dbConnect();
	$resp = $db->query("SELECT id, name, login, password FROM admin ");

	$admins = array();

		while ($donnees = $resp->fetch()) {
			$admin = new Admin();
			$admin->hydrate($donnees);
			$admins[] = $admin;
		}

		$resp->closeCursor();
		return $admins;
	}

	
	// UPDATE
	
	// DELETE

}
