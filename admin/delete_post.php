<?php
	include ('../models/admin.php');
	$id = $_GET['id'];
	$i = Products::delect($id);
	header("location:listproducts.php");
?>