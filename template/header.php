<?php
	include ('lang/define_lang.php');
	include ("config/config.php");
	include ("seo.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $pageTitle; ?></title>
	<meta name="description" content="<?php echo $pageDescription; ?>">
	<meta name="keywords" content="<?php echo $pageKeyword; ?>">
	<?php
		// If canonical URL is specified, include canonical link element
		if($pageCanonical){
			echo '<link rel="canonical" href="' . $pageCanonical . '">';
		}
		// If meta robots content is specified, include robots meta tag
		if($pageRobots){
			echo '<meta name="robots" content="' . $pageRobots . '">';
		}
	?>
	<meta name="google-site-verification" content="Ry4SC9lqacxjYGDI_lYE9LC_Kg6POipip5-QEJCG4ZA" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link href="resources/css/bootstrap.min.css" rel="stylesheet">
	<link href="resources/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="resources/css/form.css" rel="stylesheet" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="resources/js/jquery1.min.js"></script>
	<!-- start menu -->
	<link href="resources/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="resources/js/megamenu.js"></script>
	<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
	<link href="resources/css/etalage.css" rel="stylesheet">
    <script src="resources/js/slides.min.jquery.js"></script>
    <script src="resources/js/jquery.flexisel.js"></script>
    <script src="resources/js/jquery.etalage.min.js"></script>
	<script src="resources/js/jquery.easydropdown.js"></script>
</head>
<div class="header-top">
	   <div class="wrap"> 
			<div class="header-top-left">
			  	   <div class="box dropdown">
						<a href="lang/switch_lang.php?lang=2" style="color:#fff;">English</a> | 
						<a href="lang/switch_lang.php?lang=1" style="color:#fff;">ភាសាខ្មែរ</a>
   				    </div>
   				    <div class="box1">
   				    <?php
	   				    if(isset($_SESSION['login_user'])=='Undefined'){
	   				        echo "<select tabindex='4' class='dropdown'>";
									echo "<option value='' class='label' value=''>Welcom :".$_SESSION['login_user']."</option>
									</select>";
						}else{
	   				        echo "";
	   				    }
					?>
   				    </div>
   				    <div class='clear'></div>
   			 </div>
			 <div class="cssmenu">
				<ul>
					<?php
						if(isset($_SESSION['login_user'])=='Undefined'){
							echo '<li><a href="logout.php">'._t_logout.'</a></li>';
						}else{
							echo '<li><a href="login.php"> '._t_login.'</a></li> | 
								<li><a href="register.php">'._t_signup.'</a></li>';
						}
					?>
				</ul>
			</div>
			<div class="clear"></div>
 		</div>
	</div>
	<div class="header-bottom">
	    <div class="wrap">
		    <div class="col-md-12">
			    <div class="col-md-4">
				    <div class="row">
				    	<a href="index.php">
							<img src="resources/images/logo.png" alt="" style="width: 280px;" />
						</a>
				    </div>
			    </div>
			    <div class="col-md-4">
				    <div class="row">
				    	<?php
							if(!isset($_POST['search'])){
							    $searchname = "";
							} else {
							    $searchname = $_POST['search'];
							}  
						?>
				    	<div class="search">	
				         	<form method="post" action="search.php"  id="searchform">  
								<input type="text" name="search" class="textbox" placeholder="<?php echo _t_search;?>" value="<?= $searchname ?>">
								<input type="submit" id="submit" name="submit">
								<div id="response"> </div>
							</form>
				 		</div>
				    </div>
			    </div>
			    <div class="col-md-4">
				    <div class="row">
				    	<i class="fa fa-shopping-cart" aria-hidden="true"></i>
		            </div>
			    </div>
		    </div>

	 		<div class="clear"></div>
		 	<div class="">
				<div class="menu">
		            <ul class="megamenu skyblue">
		            	<li class="dropdown1">
						    <a href="#" class="dropbtn"><?php echo _t_woman;?></a>
						    <div class="dropdown-content">
							    <ul class="col-md-12 submenu">
								    <li class="col-md-4">
								      	<a href="<?php echo URL."cosmetic.php"; ?>"><?php echo _t_cosmetic;?></a>
								      	<a href="<?php echo URL."perfume.php"; ?>"><?php echo _t_perfume;?></a>
								      	<a href="<?php echo URL."handbag.php"; ?>"><?php echo _t_bag;?></a>
								      	<a href="<?php echo URL."glassess.php"; ?>"><?php echo _t_glass;?></a>
								      	<a href="<?php echo URL."w_watch.php"; ?>"><?php echo _t_watch;?></a>
								    </li>
								    <li class="col-md-4">
								    </li>
								    <li class="col-md-4">
								      	<img src="resources/images/s2.jpg">
								    </li>
							    </ul>
						    </div>
						</li>
						<li class="dropdown1">
							<a class="dropbtn" href="#"><?php echo _t_man;?></a>
							<div class="dropdown-content">
							    <ul class="col-md-12 submenu">
								    <li class="col-md-4">
								    	<a href="<?php echo URL."m_belt.php"; ?>"><?php echo _t_belt; ?></a>
								      	<a href="<?php echo URL."glassess.php"; ?>"><?php echo _t_glass;?></a>
								      	<a href="<?php echo URL."m_watch.php"; ?>"><?php echo _t_watch;?></a>
								      	<a href="<?php echo URL."perfume.php"; ?>"><?php echo _t_perfume;?></a>
								    </li>
								    <li class="col-md-4">
								    </li>
								    <li class="col-md-4">
								      	<img src="resources/images/s1.jpg">
								    </li>
							    </ul>
						    </div>
						</li>	
						<li class="dropdown1">
							<a class="dropbtn" href="<?php echo URL."child.php";?>"><?php echo _t_child;?></a>
						</li>
						<li class="dropdown1">
							<a class="dropbtn" href="#"><?php echo _t_house;?></a>
							<div class="dropdown-content">
							    <ul class="col-md-12 submenu">
								    <li class="col-md-4">
								      	<a href="<?php echo URL."siren.php"; ?>"><?php echo _t_siren;?></a>
								    </li>
								    <li class="col-md-4">
								    </li>
								    <li class="col-md-4">
								      	<img src="resources/images/sedea.jpg">
								    </li>
							    </ul>
						    </div>
						</li>
						<li class="dropdown1">
							<a class="dropbtn" href="<?php echo URL;?>aboutus.php"><?php echo _t_about;?></a>
						</li>
					</ul>
				</div>
			</div>
		
	   	<!-- <div class="header-bottom-right">
         	
   		</div> -->
     <div class="clear"></div>
     </div>
	</div>


