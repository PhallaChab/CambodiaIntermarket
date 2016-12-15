<?php
	include ('../models/admin.php');
	$mid = $_GET['id'];
	$i = Products::delectMm($mid);
	header("location:manage_menu.php");
?>