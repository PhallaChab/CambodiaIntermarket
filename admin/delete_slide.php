<?php
	include ('../models/admin.php');
	$id = $_GET['id'];
	$i = Products::delectslide($id);
	header("location:manage_slide.php");
?>