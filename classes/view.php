<?php
class view {
	public $tableData, $tableHtml, $pagerHtml;
	
	function __construct() {
		
	}
	private function getHead() {
		return(file_get_contents('templates/head.php')); 		
	}
	private function getTableHeaders() {
		return(file_get_contents('templates/headers.php')); 		
	}
	private function getFormHtml() {
		return(file_get_contents('templates/form.php')); 		
	}
	private function previewHtml() {
		return(file_get_contents('templates/preview.php')); 		
	}
	public function prepareTable() {
		$template = file_get_contents('templates/item.php');
		$table = '';
		foreach($this->tableData as $item) {
			$data = array('{{NAME}}'=>$item['username'], 
						'{{IP}}'=>$item['ip'],
						'{{DATE}}'=>$item['date'],
						'{{EMAIL}}'=>$item['email'],
						'{{WWW}}'=>$item['www'],
						'{{MESSAGE}}'=>$item['text'],);
						
			$table .= self::replaceTags($template, $data);
		}
		return($table);
	}	
	public static function replaceTags($template, $placeholders) {
		$placeholders = array_merge($placeholders, array('<?'=>'', '?>'=>''));
		return str_replace(array_keys($placeholders), $placeholders, $template);
	}
	public function publishTable() {
		$template = file_get_contents('templates/main.php');
		
		$data = array('{{HEAD}}'=>$this->getHead(), 
				'{{T_HEADERS}}'=>$this->getTableHeaders(), 
				'{{DATATABLE}}'=>$this->tableHtml,
				'{{PAGER}}'=>$this->pagerHtml,
				'{{FORM_MESSAGE}}'=>$this->getFormHtml(),
				'{{PREVIEW}}'=>$this->previewHtml());		
				
		print(self::replaceTags($template, $data));
	}
	public static function displayError() {
		print(file_get_contents('templates/error.php'));
		die();
	}
	public function createPreview($message) {
		$template = file_get_contents('templates/preview.php');
		
		$data = array('{{PREVIEW_NAME}}'=>$message->username, 
				'{{PREVIEW_EMAIL}}'=>$message->email, 
				'{{PREVIEW_WWW}}'=>$message->www,
				'{{PREVIEW_MESSAGE}}'=>$message->text,
				'{{PREVIEW_IP}}'=>$message->ip,
				'{{PREVIEW_BROWSER}}'=>$message->browser);		
				
		return(self::replaceTags($template, $data));
	}
}