<?php 
	$Filename="files/" . $_GET['ServerFilename'];  //設定路徑
	if(!file_exists($Filename)){
		header ('Content-type: text/html; charset=utf-8');
		die("檔案不存在");
	}
		
	header('Content-type: application/force-download');
	header('Content-Transfer-Encoding: Binary');
	header("Content-Disposition: attachment; filename=".  $_GET['UserFilename']); //設定下載檔名
	readfile($Filename);  //下載檔案
?>
