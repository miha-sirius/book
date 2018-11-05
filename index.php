<?php
session_start();

include_once('config.php');

include_once('classes/db.php');
include_once('classes/book.php');
include_once('classes/message.php');
include_once('classes/view.php');

if(isset($_GET['action'])) {
	switch($_GET['action']) {
		case '__updatePager':
			print(Book::getPager($_POST['page']));
			die();
		break;
		case '__saveMessage':
			$message = new message($_POST['name'], $_POST['mail'], $_POST['www'], $_POST['message']);
			if(!$message->validateData()) {
				view::displayError();
			}
			$message->insertMessage();
			header('location: index.php');
		break;
		case '__preview':
			$message = new message($_POST['name'], $_POST['mail'], $_POST['www'], $_POST['message']);
			$message->text = $message->prepareMessage($message->text);
			$view = new View();
			print($view->createPreview($message));
			die();
		break;
	}	
}

$book = new Book();
$view = new View();

$sort = (isset($_POST['sort'])&&$_POST['sort']!='')?$_POST['sort']:'date';
$order = (isset($_POST['order'])&&$_POST['order']!='')?$_POST['order']:'DESC';

$_SESSION['total'] = $book->getTotalPages();
$page = (isset($_POST['page'])&&$_POST['page']!='')?$_POST['page']:1;

$view->tableData = $book->getMessages($sort, $order, $page);
$view->tableHtml = $view->prepareTable();

if(isset($_GET['action']) && $_GET['action']=='__updateTable') {
	print($view->tableHtml);
	die();
}

$view->pagerHtml = $book->getPager($page);

$view->publishTable();

	
