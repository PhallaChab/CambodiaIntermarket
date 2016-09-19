
<?php
	session_start();
    //include ('include/functions.php');
    //include ('lang/define_lang.php');
	include ("config/config.php");
	//include ("views/auth.php");
	if ($_SESSION["login_user"]!=NULL) {
		//echo $_SESSION['login_user'];
	    header("location: ".URL."views/index.php");
	}else{
		header("location: ".URL."views/index.php");
	}
?>
