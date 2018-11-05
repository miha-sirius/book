<?php
define("MODE", "LIVE"); // RC or LIVE
define(TOTAL_RECORDS_ON_PAGE, 5);
define(ALLOWED_TAGS_IN_MESSAGE, '<a><i><strong><strike>');

if(MODE == "LIVE") {
	
	define("DB_NAME", "skaistu3_mybook");
	define("DB_USER", "skaistu3_book_user");
	define("DB_PASS", "PERU911911911");
	define("DB_URL", "localhost");
	
} elseif(MODE == "RC") {
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	//print('<pre>');
	
	define("DB_NAME", "skaistu3_mybook");
	define("DB_USER", "skaistu3_book_user");
	define("DB_PASS", "PERU911911911");
	define("DB_URL", "localhost");
}