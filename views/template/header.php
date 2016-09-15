<?php
	include ('../lang/define_lang.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cambodia Intermarket</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="resources/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="resources/css/form.css" rel="stylesheet" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="resources/js/jquery1.min.js"></script>
	<!-- start menu -->
	<link href="resources/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="resources/js/megamenu.js"></script>
	<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
	<!--start slider -->
	    <link rel="stylesheet" href="resources/css/fwslider.css" media="all">
	    <script src="resources/js/jquery-ui.min.js"></script>
	    <script src="resources/js/css3-mediaqueries.js"></script>
	    <script src="resources/js/fwslider.js"></script>
	<!--end slider -->
	<script src="resources/js/jquery.easydropdown.js"></script>
</head>
<div class="header-top">
	   <div class="wrap"> 
			<div class="header-top-left">
			  	<div class="box">
			  		<div class="cssmenu">
						<ul>
							<li><a href="../lang/switch_lang.php?lang=2">English</a></li> |
							<li><a href="../lang/switch_lang.php?lang=1">Khmer</a></li>
						</ul>
					</div>
   				</div>
   				<div class="clear"></div>
   			</div>
   			<div class="cssmenu">
				<ul>
					<li><a href="login.php"><?php echo _t_login;?></a></li> |
					<li><a href="register.php"><?php echo _t_signup;?></a></li>
				</ul>
			</div>
			<div class="clear"></div>
 		</div>
	</div>
	<div class="header-bottom">
	    <div class="wrap">
			<div class="header-bottom-left">
				<div class="logo">
					<a href="index.php"><img src="resources/images/logo.jpg" alt=""/></a>
				</div>
				<div class="menu">
	            <ul class="megamenu skyblue">
				<li class="active grid"><a href="index.php"><?php echo _t_home;?></a></li>
				<li><a class="color4" href="glassess.php"><?php echo _t_glass;?></a>
					<!-- <div class="megapanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<h4>Contact Lenses</h4>
									<ul>
										<li><a href="womens.html">Daily-wear soft lenses</a></li>
										<li><a href="womens.html">Extended-wear</a></li>
										<li><a href="womens.html">Lorem ipsum </a></li>
										<li><a href="womens.html">Planned replacement</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>Sun Glasses</h4>
									<ul>
										<li><a href="womens.html">Heart-Shaped</a></li>
										<li><a href="womens.html">Square-Shaped</a></li>
										<li><a href="womens.html">Round-Shaped</a></li>
										<li><a href="womens.html">Oval-Shaped</a></li>
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>Eye Glasses</h4>
									<ul>
										<li><a href="womens.html">Anti Reflective</a></li>
										<li><a href="womens.html">Aspheric</a></li>
										<li><a href="womens.html">Bifocal</a></li>
										<li><a href="womens.html">Hi-index</a></li>
										<li><a href="womens.html">Progressive</a></li>
									</ul>	
								</div>												
							</div>
						  </div>
						</div>
					</li> -->				
				<li><a class="color5" href="watches.php"><?php echo _t_watch;?></a>
				<li><a class="color6" href="handbag.php"><?php echo _t_bag;?></a></li>
				<li><a class="color7" href="cosmetic.php"><?php echo _t_cosmetic;?></a></li>
				<li><a class="color7" href="#"><?php echo _t_siren;?></a></li>
				<li><a class="color7" href="aboutus.php"><?php echo _t_about;?></a></li>

			</ul>
			</div>
		</div>
		<?php
			if(!isset($_POST['search'])){
			    $searchname = "";
			} else {
			    $searchname = $_POST['search'];
			}  
		?>
	   	<div class="header-bottom-right">
         	<div class="search">	
	         	<form method="post" action="search.php"  id="searchform">  
					<input type="text" name="search" class="textbox" placeholder="<?php echo _t_search;?>" value="<?= $searchname ?>">
					<input type="submit" id="submit" name="submit">
					<div id="response"> </div>
				</form>
		 	</div>
   		 </div>
     <div class="clear"></div>
     </div>
	</div>


