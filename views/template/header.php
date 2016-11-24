<?php
	include ('../lang/define_lang.php');
	include ("../config/config.php");
	include ("seo.php");
	// include ("models/products.php");

	//add to cart
    require_once("../include/dbcontroller.php");
    $db_handle = new DBController();
    if(!empty($_GET["action"])) {
        switch($_GET["action"]) {
            case "add":
                if(!empty($_POST["quantity"])) {
                    $productByCode = $db_handle->runQuery("SELECT * FROM products WHERE pro_code='" . $_GET["code"] . "'");
                    $itemArray = array($productByCode[0]["pro_code"]=>array(
                        'name'=>$productByCode[0]["pro_name"], 
                        'code'=>$productByCode[0]["pro_code"], 
                        'quantity'=>$_POST["quantity"], 
                        'price'=>$productByCode[0]["pro_price"])
                    );

                    if(!empty($_SESSION["cart_item"])) {
                        if(in_array($productByCode[0]["pro_code"],$_SESSION["cart_item"])) {
                            foreach($_SESSION["cart_item"] as $k => $v) {
                                    if($productByCode[0]["pro_code"] == $k)
                                        $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
                            }
                        } else {
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                        }
                    } else {
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
            break;
            case "like":
            	if(!empty($_POST["quantity"])) {
                    $productByCode = $db_handle->runQuery("SELECT * FROM products WHERE pro_code='" . $_GET["code"] . "'");
                    $ArrayItem = array($productByCode[0]["pro_code"]=>array(
                        'name'=>$productByCode[0]["pro_name"], 
                        'code'=>$productByCode[0]["pro_code"], 
                        'quantity'=>$_POST["quantity"], 
                        'price'=>$productByCode[0]["pro_price"]));
                    
                    if(!empty($_SESSION["like_item"])) {
                        if(in_array($productByCode[0]["pro_code"],$_SESSION["like_item"])) {
                            foreach($_SESSION["like_item"] as $key => $vvalue) {
                                    if($productByCode[0]["pro_code"] == $key)
                                        $_SESSION["like_item"][$k]["quantity"] = $_POST["quantity"];
                            }
                        } else {
                            $_SESSION["like_item"] = array_merge($_SESSION["like_item"],$ArrayItem);
                        }
                    } else {
                        $_SESSION["like_item"] = $ArrayItem;
                    }
                }
            break;
        }
    }

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
	<link rel="icon" type="image/gif/png" href="resources/images/logo1.jpg">
	<meta name="google-site-verification" content="Ry4SC9lqacxjYGDI_lYE9LC_Kg6POipip5-QEJCG4ZA" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link href="resources/css/bootstrap.min.css" rel="stylesheet">
	<?php
		if($_SESSION['lang']==2){
	?>
		<link href="resources/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
		<link href='resources/css/style.css' rel='stylesheet' type='text/css' media='all' />
	<?php
		}else{
	?>
		<link href="resources/css/megamenukh.css" rel="stylesheet" type="text/css" media="all" />
		<link href='resources/css/stylekh.css' rel='stylesheet' type='text/css' media='all' />
	<?php
		}
	?>
	<link href="resources/css/form.css" rel="stylesheet" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="resources/js/jquery1.min.js"></script>
	<!-- start menu -->
	
	<script type="text/javascript" src="resources/js/megamenu.js"></script>
	<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
	<link href="resources/css/etalage.css" rel="stylesheet">
    <script src="resources/js/slides.min.jquery.js"></script>
    <script src="resources/js/jquery.flexisel.js"></script>
    <script src="resources/js/jquery.etalage.min.js"></script>
	<script src="resources/js/jquery.easydropdown.js"></script>
</head>
<div class="wrap">
	<div class="header-top col-md-12 col-xs-12">
		<div class="col-md-4 col-xs-12">
			<ul class="list-inline lang">
				<li>
					<a href="..\lang/switch_lang.php?lang=2" style="color:#fff; font-family:'Bodoni MT';font-size:18px;">English |</a>
					<a href="..\lang/switch_lang.php?lang=1">ភាសាខ្មែរ</a>
				</li>
				<?php
			    if(isset($_SESSION['login_user'])=='Undefined'){
					echo "<li>"._t_welcome." ".$_SESSION['login_user']."</li>";
					}else{
						echo "";
					}
				?>
			</ul>
		</div>
		<?php
	        $session_items = 0;
	        $session_like = 0;
	        if(!empty($_SESSION["cart_item"])){
	            $session_items = count($_SESSION["cart_item"]);
	        }

	        if(!empty($_SESSION["like_item"])){
	            $session_like = count($_SESSION["like_item"]);
	        } 
	    ?>
		<div class="col-md-4 col-xs-12 threeicon">
			<div class="col-md-4 col-xs-4 styleicon">
				<a href="mycart.php">
		    		<img src="resources/images/cart.png" class="icon">
		    		<span style="color:#fff;" class="divItems"><?php echo $session_items; ?></span>
		    		<p class="texticon"><?php echo _t_basket;?></p>
		    	</a>
			</div>
			<div class="col-md-4 col-xs-4 styleicon">
				<a href="mywishlist.php">
		    		<img src="resources/images/heart.png" class="icon">
		    		<span class="divItems" style="color:#fff;"><?php echo $session_like; ?></span>
		    		<p class="texticon"><?php echo _t_wishlist;?></p>
		    	</a>
			</div>
			<div class="col-md-4 col-xs-4 styleicon">
			<?php
			if(isset($_SESSION['login_user'])=='Undefined'){
				echo "<a href='profile.php?id=".$_SESSION['uid']."'>
			    		<img src='resources/images/user.png' class='icon'>
			    		<p class='texticon'>"._t_account."</p>
			    	</a>";
			}else{
				echo "<a href='login.php'>
			    		<img src='resources/images/user.png' class='icon'>
			    		<p class='texticon'>"._t_account."</p>
			    	</a>";
			}
		    ?>
			</div>
		</div>
		<div class="col-offset-2 col-md-2 col-xs-12">
			<ul class="list-inline loginheader">
				<?php
					if(isset($_SESSION['login_user'])=='Undefined'){
						echo '<li><a href="logout.php">'._t_logout.'</a></li>';
					}else{
						echo '<li>
								<a href="login.php"> '._t_login.' |</a>
								<a href="register.php">'._t_signup.'</a>
							</li>';
					}
				?>
			</ul>
		</div>
		<div class="clear"></div>
		<?php
		    if(isset($_SESSION['login_user'])=='Undefined'){
				echo "";
			}else{
				echo "<div class='animation'>Please register to get 5% off.</div>";
			}
		?>
 	</div>
</div>
	<div class="header-bottom">
	    <div class="wrap">
		    <div class="col-md-12 logostyle">
			    <div class="col-md-4">
				    <div class="row">
				    	<a href="index.php">
							<img src="resources/images/LOGO-01.png" alt="" style="width: 260px; height: 80px; margin-top: -12px;" />
							<!-- <p class="logotext">Cambodia Intermarket</p> -->
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
			    <div class="col-md-4" style="text-align:center;">
				    <div class="row">
				    	<div class="hotline">
					    	<p><?php echo _t_hotline; ?>: (+855) 89 27 2000</p>
					    </div>
		            </div>
			    </div>
		    </div>

	 		<div class="clear"></div>

	 		<!-- desktop menu -->
		 	<div class="">
				<div class="menu">
		            <ul class="megamenu skyblue">
		            	<li class="dropdown1">
						    <a href="woman.php" class="dropbtn"><?php echo _t_woman;?></a>
						    <div class="dropdown-content">
							    <ul class="col-md-12 submenu">
								    <li>
								    	<a href="w_new.php"><?php echo _t_new;?></a>
								      	<a href="cosmetic.php"><?php echo _t_cosmetic;?></a>
								      	<a href="w_perfume.php"><?php echo _t_perfume;?></a>
								      	<a href="handbag.php"><?php echo _t_bag;?></a>
								      	<a href="glassess.php"><?php echo _t_glass;?></a>
								      	<a href="w_watch.php"><?php echo _t_watch;?></a>
								      	<a href="bag.php"><?php echo _t_backpack;?></a>

								    </li>
							    </ul>
						    </div>
						</li>
						<li class="dropdown1">
							<a class="dropbtn" href="man.php"><?php echo _t_man;?></a>
							<div class="dropdown-content">
							    <ul class="col-md-12 submenu">
								    <li>
								    	<a href="m_new.php"><?php echo _t_new;?></a>
								    	<a href="belt.php"><?php echo _t_belt; ?></a>
								      	<a href="glassess.php"><?php echo _t_glass;?></a>
								      	<a href="m_watch.php"><?php echo _t_watch;?></a>
								      	<a href="m_perfume.php"><?php echo _t_perfume;?></a>
								      	<a href="bag.php"><?php echo _t_backpack;?></a>
								    </li>
							    </ul>
						    </div>
						</li>	
						<li class="dropdown1">
							<a class="dropbtn" href="#"><?php echo _t_child;?></a>
							<div class="dropdown-content">
							    <ul class="col-md-12 submenu">
								    <li>
								    	<a href="bag.php"><?php echo _t_backpack;?></a>
								    </li>
							    </ul>
						    </div>
						</li>
						<li class="dropdown1">
							<a class="dropbtn" href="#"><?php echo _t_house;?></a>
							<div class="dropdown-content">
							    <ul class="col-md-12 submenu">
								    <li>
								    	<a href=""><?php echo _t_new;?></a>
								      	<a href="siren.php"><?php echo _t_siren;?></a>
								    </li>
							    </ul>
						    </div>
						</li>
						<li class="dropdown1">
							<a class="dropbtn" href="aboutus.php"><?php echo _t_about;?></a>
						</li>
					</ul>
				</div>
			</div>

			<!-- mobile menu -->
			<!-- <div class="hidden-lg hidden-md ">
				<div class="menu">
		            <ul class="megamenu skyblue">
		            	<li class="dropdown1">
						    <a href="" class="dropbtn"><?php echo _t_woman;?></a>
						    <div class="dropdown-content">
							    <ul class="col-md-12 submenu">
								    <li>
								    	<a href="w_new.php"><?php echo _t_new;?></a>
								      	<a href="cosmetic.php""><?php echo _t_cosmetic;?></a>
								      	<a href="w_perfume.php""><?php echo _t_perfume;?></a>
								      	<a href="handbag.php""><?php echo _t_bag;?></a>
								      	<a href="glassess.php"><?php echo _t_glass;?></a>
								      	<a href="w_watch.php"><?php echo _t_watch;?></a>
								    </li>
							    </ul>
						    </div>
						</li>
						<li class="dropdown1">
							<a class="dropbtn" href=""><?php echo _t_man;?></a>
							<div class="dropdown-content">
							    <ul class="col-md-12 submenu">
								    <li>
								    	<a href="m_new.php"><?php echo _t_new;?></a>
								    	<a href="belt.php"><?php echo _t_belt; ?></a>
								      	<a href="glassess.php"><?php echo _t_glass;?></a>
								      	<a href="m_watch.php"><?php echo _t_watch;?></a>
								      	<a href="m_perfume.php"><?php echo _t_perfume;?></a>
								    </li>
							    </ul>
						    </div>
						</li>	
						<li class="dropdown1">
							<a class="dropbtn" href="#"><?php echo _t_child;?></a>
						</li>
						<li class="dropdown1">
							<a class="dropbtn" href="#"><?php echo _t_house;?></a>
							<div class="dropdown-content">
							    <ul class="col-md-12 submenu">
								    <li>
								    	<a href=""><?php echo _t_new;?></a>
								      	<a href="siren.php"><?php echo _t_siren;?></a>
								    </li>
							    </ul>
						    </div>
						</li>
						<li class="dropdown1">
							<a class="dropbtn" href="aboutus.php"><?php echo _t_about;?></a>
						</li>
					</ul>
				</div>
			</div> -->
     <div class="clear"></div>
     </div>
	</div>


