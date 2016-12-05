<?php
	include ('../models/products.php');
	$id = $_GET['id'];
	$i = Product::delect($id);
	header("location:mycart.php");
?>