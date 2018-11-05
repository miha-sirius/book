<?php 
class DB {
	function __construct() {
		$this->dbInit();
	}
	public function dbInit() {		
		global $db;
		try {
			$db = new PDO('mysql:host='.DB_URL.';dbname='.DB_NAME.'', DB_USER, DB_PASS);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		} catch(Exception $e) {
			// Log database error
			view::displayError();
		}			
	}
}
	?>