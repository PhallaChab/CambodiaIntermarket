<?php
	//header("Content-type: text/html; charset=utf-8");
	$db = mysqli_connect("localhost","root","","cim");
	mysqli_query ($db,"set character_set_results='utf8'");
	//mysqli_query("SET NAMES 'UTF8'",$db);
	include ('define_lang.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>language</title>
	<meta charset='utf-8' />
</head>
<body>
	<ul>
		<li><a href="switch_lang.php?lang=1">Khmer</a> ||
			<a href="switch_lang.php?lang=2">English</a></li>
		</ul>

		<ul>
		<li><a href=""><?php echo _t_home;?></a></li>
		<li><a href=""><?php echo _t_product;?></a></li>
		<li><a href=""><?php echo _t_contact;?></a></li>
		<li><a href=""><?php echo _t_student;?></a></li>
	</ul>
	<hr/>
	<?php 
		$select = "select * from tbl_lang";
		$query = mysqli_query($db,$select);
		$numrow = mysqli_num_rows($query);
		if($numrow>0){
			while($row = mysqli_fetch_object($query)){;
				if($_SESSION['lang']==1){
					$how=$row->kh;
				}else if($_SESSION['lang']==2){
					$how=$row->en;
				}
				echo $how . "<br/>";
			}
		}
	?>
</body>
</html>