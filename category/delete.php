<?php
	include ('../include/functions.php');
	$id = $_GET['id'];
	$i = deleteCagetories($id);
	header("location:index.php");

?>