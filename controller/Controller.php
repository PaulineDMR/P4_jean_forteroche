<?php 

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');

class Controller {

	protected $postManager;
	protected $commentManager;
	protected $adminManager;

	public function __construct() {
		$this->postManager = new PostManager();
		$this->commentManager = new CommentManager();
		$this->adminManager = new AdminManager();
	}
}

?>