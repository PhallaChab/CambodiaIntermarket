<?php
	session_start();
	//give session when first load page
	if(!isset($_SESSION['lang'])){
		$_SESSION['lang']=2;
	}
	if($_SESSION['lang']==1){
		include ('lang_kh.php');
	}else if($_SESSION['lang']==2){
		include ('lang_en.php');
	}

?>