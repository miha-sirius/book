<?php
class Message extends DB {	
	
	public $ip, $browser, $username, $email, $www, $text;
	
	function __construct($username, $email, $www, $text) {
		$this->dbInit();
		$this->ip = $_SERVER['REMOTE_ADDR'];
		$this->browser = $_SERVER['HTTP_USER_AGENT'];		
		
		$this->username = $username;
		$this->email = $email;
		$this->www = $www;
		$this->text = $text;
	}
	
	public function insertMessage() {
		global $db;
		try{
			$sql = 'INSERT INTO messages (date,ip,browser,username,email,www,text) VALUES(NOW(),?,?,?,?,?,?)';
			$query = $db->prepare($sql)->execute([$this->ip, $this->browser, $this->username, $this->email, $this->www, $this->text]);	
		} catch(Exception $e) {
			// Log database error
			view::displayError();
		}
	}
	
	public function validateData() {
		if (!preg_match('/[^A-Za-z0-9]/', $this->username)) {
			return false;
		}
		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			return false;
		}
		if ($this->www!='' && !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$this->www)) {
			return false;
		}
		$this->text = $this->prepareMessage($this->text);
		return true;
		
	}
	public static function prepareMessage($message) {
		return(strip_tags($message, ALLOWED_TAGS_IN_MESSAGE));
	}
	
	
}
?>