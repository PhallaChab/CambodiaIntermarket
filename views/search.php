<?php
	session_start();
	include ('template/header.php');
	include ('../models/products.php');
?>
<div class='main'>
	<div class='wrap'>
		<div class='section group'>
		  	<div class='cont span_2_of_3'>
			  	<h2 class='head'>Result Search</h2>
				<div class='top-box'>
					<?php
						if(!isset($_POST['submit'])){
							$searchname = "";
						}else{
							$searchname  = $_POST['search'];
						 	$search = preg_replace("#[^0-9a-z]#i", "", $searchname);
						 	$result = Product::getSearch($search);
						 	
						 	// if($search == $result){
						 	if($result=="No"){
						 		echo "<p>There is no product.</p>";
						 	}else{
						 		foreach ($result as $resultsearch){
						 			echo "<div class='col_1_of_3 span_1_of_3'>
										 	<a href='details.php?id=".$resultsearch['pro_id']."'>
												<div class='inner_content clearfix'>
													<div class='product_image'>
														<img src='resources/".$resultsearch['pro_image']."' alt=''/>
													</div>
													<div class='sale-box1'>
														<span class='on_sale title_shop'>New</span>
													</div>	
								                    <div class='price'>
													    <div class='cart-left'>
															<p class='title'>".$resultsearch['pro_name']."</p>
															<div class='price1'>
															  <span class='reducedfrom'>$66.00</span>
															  <span class='actual'>$".$resultsearch['pro_price']."</span>
															</div>
														</div>
														<div class='clear'></div>
													</div>				
								                </div>
						                   	</a>
										</div>";
						 		}
						 	}
						}
					?>
				</div>			 						 			    
		  	</div>
			<div class='rsidebar span_1_of_left'>
				<div class='top-border'> </div>
				<div class='border'>
	             	<link href='resources/css/default.css' rel='stylesheet' type='text/css' media='all' />
	             	<link href='resources/css/nivo-slider.css' rel='stylesheet' type='text/css' media='all' />
				  	<script src='resources/js/jquery.nivo.slider.js'></script>
				    <script type='text/javascript'>
					    $(window).load(function() {
					        $('#slider').nivoSlider();
					    });
					</script>
				    <div class='slider-wrapper theme-default'>
		              	<div id='slider' class='nivoSlider'>
			                <img src='resources/images/pic.jpg' alt='' />
			               	<img src='resources/images/pic1.jpg' alt='' />
			                <img src='resources/images/pic2.jpg' alt='' />
		              	</div>
		            </div>
             	</div>
           <div class='top-border'> </div>
			<div class='sidebar-bottom'>
			    <h2 class='m_1'>Newsletters<br> Signup</h2>
			    <p class='m_text'>Lorem ipsum dolor sit amet, consectetuer</p>
			    <div class='subscribe'>
					 <form>
					    <input name='userName' type='text' class='textbox'>
					    <input type='submit' value='Subscribe'>
					 </form>
	  			</div>
			</div>
	    </div>
	   <div class='clear'></div>
	</div>
	</div>
</div>
<?php
include ('template/footer.php');
?>