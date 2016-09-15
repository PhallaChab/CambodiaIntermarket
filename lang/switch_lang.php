<?php
	session_start();

	//get current url
	$goback = $_SERVER['HTTP_REFERER'];
	$lang=$_GET['lang'];
	$_SESSION['lang']=$lang;
	//echo $goback;

	//go to current url
	header('location: '.$goback);
?>