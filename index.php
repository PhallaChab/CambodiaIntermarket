<?php
	session_start();
	require_once 'config/config.php';
	header("location: ".URL."views/index.php");
?>