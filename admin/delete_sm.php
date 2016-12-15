<?php
	include ('../models/admin.php');
	$sid = $_GET['id'];
	$i = Products::delectSm($sid);
	header("location:manage_menu.php");
?>