<?php
	$dbcon = new MySQLi("localhost","root","","cambointermarket");
	if(isset($_POST['add_main_menu'])){
		$menu_name = $_POST['menu_name'];
		$menu_link = $_POST['mn_link'];
		$sql=$dbcon->query("INSERT INTO main_menu(m_menu_name,m_menu_link) 
							VALUES('$menu_name','$menu_link')");
	}
	if(isset($_POST['add_sub_menu'])){
		$parent = $_POST['parent'];
		$proname = $_POST['sub_menu_name'];
		$menu_link = $_POST['sub_menu_link'];
		$sql=$dbcon->query("INSERT INTO sub_menu(m_menu_id,s_menu_name,s_menu_link) 
							VALUES('$parent','$proname','$menu_link')");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Dynamic Dropdown Menu using PHP and MySQLi</title>
</head>
<body>
	<div id="head">
		<div class="wrap"><br />
			<h1><a href="http://www.codingcage.com/">Coding Cage - programming blog</a></h1>
		</div>
	</div>
	<center>
		<pre>
			<form method="post">
				<input type="text" placeholder="Main menu name :" name="menu name" /><br />
				<input type="text" placeholder="Menu link :" name="mn_link" /><br />
				<button type="submit" name="add_main_menu">Add main menu</button>
			</form>
		</pre>
		<br />
		<pre>
			<form method="post">
				<select name="parent">
					<option selected="selected">select parent menu</option>
					<?php
						$res=$dbcon->query("SELECT * FROM main_menu");
						while($row=$res->fetch_array()){
					?>
						    <option value="<?php echo $row['m_menu_id']; ?>">
						    	<?php echo $row['m_menu_name']; ?>
						    </option>
					<?php
						}
					?>
				</select><br />
				<input type="text" placeholder="Sub menu name :" name="sub_menu_name" /><br />
				<input type="text" placeholder="Sub menu link :" name="sub_menu_link" /><br />
				<button type="submit" name="add_sub_menu">Add sub menu</button>
			</form>
		</pre>
		<a href="indexmenu.php">back to main page</a>
	</center>
</body>
</html>