<?php

require_once('Controller.php');


class PostsController extends Controller {

	private $postsPerPage = 5;
	private $pageNumber;

	public function __construct() {
		parent::__construct();
		if (!empty($_GET["page"]) && is_numeric($_GET["page"])) {
			$this->pageNumber = $_GET["page"];
		} else {
			$this->pageNumber = 1;
		}
	}

	public function postsList() {
		$numberOfPages = $this->postManager->countPages($this->postsPerPage);

		$pageNumber = $this->pageNumber;

		if ($this->pageNumber > $numberOfPages) {
			$this->pageNumber = $numberOfPages;
		}

		$firstIndex = ($this->pageNumber - 1) * $this->postsPerPage;

		$resp = $this->postManager->pager($firstIndex, $this->postsPerPage);
		
		require('view/frontend/indexView.php');	
	}

}
