<?php
class Book extends DB {	
	
	public function getMessages($sort = 'date', $order = 'DESC', $page = 1, $itemsPerPage = TOTAL_RECORDS_ON_PAGE):array { 
		global $db;
		$limit = ($page>1)? ($page-1)*$itemsPerPage.','.$itemsPerPage : '0,'.$itemsPerPage;	
		$sql = 'SELECT * FROM messages ORDER BY '.$sort.' '.$order.' LIMIT '.$limit;
		try {
			$data = $db->query($sql);
		} catch(Exception $e) {
			// Log database error
			view::displayError();
		}
		return $data->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getTotalPages() {
		global $db;
		$sql = 'SELECT * FROM messages';
		try {
			$data = $db->query($sql);
		} catch(Exception $e) {
			// Log database error
			view::displayError();
		}		
		$totalRows = $data->rowCount();
		
		$base = intval($totalRows/TOTAL_RECORDS_ON_PAGE);
		if($totalRows/TOTAL_RECORDS_ON_PAGE - $base != 0) {
			$base++;
		}		
		return $base;
	}
	
	public static function getPager($page) {
		$template = file_get_contents('templates/pager.php');
		$data = array(
			'{{PAGE}}'=>$page,
			'{{TOTAL}}'=>$_SESSION['total']
		);
		if ($page>1) {
			$data['{{VIS_PREV}}']='';
			$data['{{PREV_ID}}']=$page-1;
		} else 
			$data['{{VIS_PREV}}']='hidden';
		
		if($page<$_SESSION['total']) {
			$data['{{VIS_NEXT}}']='';
			$data['{{NEXT_ID}}']=$page+1;
		} else {
			$data['{{VIS_NEXT}}']='hidden';
		}
				
		$template = view::replaceTags($template, $data);		
		return($template);
	}
}
?>