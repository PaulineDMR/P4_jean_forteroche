<?php

class Manager {
	protected function dbConnect() {
		$db = new PDO('mysql:host=localhost:8889;dbname=p4jf;charset=utf8', 'root', 'root');
		return $db;
	}
}