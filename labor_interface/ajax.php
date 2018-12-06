<?php
	require_once("lib/labor.php");
	$lab = new Labor();
	if(isset($_GET['current'])){
		//$lab->nextLabs(20, $_GET['current']);
		echo json_encode($lab->nextLabs(30, $_GET['current']));
		
	}
	
?>