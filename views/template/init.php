<?php
	session_start();

	$allowed_lang = array('english','khmer');
	if(isset($_GET['lang'])===true && in_array($_GET['lang'],$allowed_lang)===true){
		$_SESSION['lang'] = $_GET['lang'];
	}else if(isset($_SESSION['lang'])===false){
		$_SESSION['lang']='english';
	}
	include $_SESSION['lang'].".php";

?>