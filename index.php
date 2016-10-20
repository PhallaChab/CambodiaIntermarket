<?php
	include ("template/header.php");
	include ("models/products.php");
?>

<div class='main'>
	<div class='wrap'>
		<div class=''>
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
		            <img src='resources/images/bannerh.jpg' alt='' />
		           	<img src='resources/images/banner2.png' alt='' />
		            <!-- <img src='resources/images/banner1.jpg' alt='' /> -->
		            <img src='resources/images/bannerw.jpg' alt='' />

		      	</div>
		    </div>
		</div>
		
		<div class='section group col-lg-12'>
		  	<div class='cont span_2_of_3'>
				<div class='top-box hover01'>
					<?php
						/*$product =  Product::getProducts();
						foreach ($product as $pro){
							echo "<div class='col_1_of_3 span_1_of_3'>
							 		<a href='details.php?id=".$pro['pro_id']."'>
									<div class='inner_content clearfix'>
										<figure>
											<img src='uploads/".$pro['pro_image']."' />
										</figure>	
					                    <div class='price'>
										    <div class='cart-left'>
												<p class='title'>".$pro['pro_name']."</p>
												<div class='price1'>
												  <span class='actual'>$".$pro['pro_price']."</span>
												</div>
											</div>
											<div class='clear'></div>
										</div>				
					                </div>
			                   	</a>
							</div>";
						}*/
					?>
				</div>			 						 			    
		  	</div>
	   		<div class='clear'></div>
		</div>
		<div class="col-md-12 col-xs-12 modeproduct">
			<div class="staticWrapper">
			<?php 
				$product =  Product::getProducts();
					foreach ($product as $pro){
						echo "<div class='col-md-4 col-xs-12 homestyle'>
							<a href='details.php?id=".$pro['pro_id']."'>
								<img src='uploads/".$pro['pro_image']."' class='small img-responsive'>
								<div class='showdiv'>
									<p class='productname'>".$pro['pro_name']."</p>
									<p class='productname'>$ ".$pro['pro_price']."</p>

								</div>
							</a>
							</div>";
					}
				?>
			</div>
		</div>
		<div class='clear'></div>
		<!-- <div class="col-md-12 col-xs-12 modeproduct">
			<div class="staticWrapper">
				<div class="col-md-6 col-xs-12 showhim">
					<a href="">
						<img src="resources/images/garnierbanner.jpg" class="modeimg">
						<div class="showme">
							<p class="modename">Hello world</p>
							<img src="resources/images/plus.jpg" class="plusimg">
						</div>
					</a>
				</div>
				<div class="col-md-6 col-xs-12 showhim">
					<a href="">
						<img src="resources/images/evoludermbanner.jpg" class="modeimg">
						<div class="showme">
							<p class="modename">Hello world</p>
							<img src="resources/images/plus.jpg" class="plusimg">
						</div>
					</a>
				</div>
				<div class="col-md-6 col-xs-12 showhim">
					<a href="">
						<img src="resources/images/raybanbanner.jpg" class="modeimg">
						<div class="showme">
							<p class="modename">Hello world</p>
							<img src="resources/images/plus.jpg" class="plusimg">
						</div>
					</a>
				</div>
				<div class="col-md-6 col-xs-12 showhim">
					<a href="">
						<img src="resources/images/2.jpg" class="modeimg">
						<div class="showme">
							<p class="modename">Hello world</p>
							<img src="resources/images/plus.jpg" class="plusimg">
						</div>
					</a>
				</div>
				<div class="col-md-6 col-xs-12 showhim">
					<a href="">
						<img src="resources/images/1.jpg" class="modeimg">
						<div class="showme">
							<p class="modename">Hello world</p>
							<img src="resources/images/plus.jpg" class="plusimg">
						</div>
					</a>
				</div>
				<div class="col-md-6 col-xs-12 showhim">
					<a href="">
						<img src="resources/images/2.jpg" class="modeimg">
						<div class="showme">
							<p class="modename">Hello world</p>
							<img src="resources/images/plus.jpg" class="plusimg">
						</div>
					</a>
				</div>
			</div>
		</div> -->
		<div class='clear'></div>
		<!-- <div class='section group'>
			<div class="clients">
	            <p style="text-align: center;font-size:25px;">Recommended Products</p>
	            <ul id="flexiselDemo3" class="col-xs-6">
	            <?php
					/*$product =  Product::getProducts();
					foreach ($product as $pro){
						echo "<li>
			                	<img src='uploads/".$pro['pro_image']."' />
			                	<div class='titlerecom'>
			                	<a href='#' >".$pro['pro_name']."</a>
			                	</div>
			                    <p>$".$pro['pro_price']."</p>
			                </li>";
					}*/
				?>
	            </ul>
	            <script type="text/javascript">
	            $(window).load(function() {
	                $("#flexiselDemo1").flexisel();
	                $("#flexiselDemo2").flexisel({
	                    enableResponsiveBreakpoints: true,
	                    responsiveBreakpoints: {
	                        portrait: {
	                            changePoint: 480,
	                            visibleItems: 1
	                        },
	                        landscape: {
	                            changePoint: 640,
	                            visibleItems: 2
	                        },
	                        tablet: {
	                            changePoint: 768,
	                            visibleItems: 3
	                        }
	                    }
	                });

	                $("#flexiselDemo3").flexisel({
	                    visibleItems: 5,
	                    animationSpeed: 1000,
	                    autoPlay: false,
	                    autoPlaySpeed: 3000,
	                    pauseOnHover: true,
	                    enableResponsiveBreakpoints: true,
	                    responsiveBreakpoints: {
	                        portrait: {
	                            changePoint: 480,
	                            visibleItems: 1
	                        },
	                        landscape: {
	                            changePoint: 640,
	                            visibleItems: 2
	                        },
	                        tablet: {
	                            changePoint: 768,
	                            visibleItems: 3
	                        }
	                    }
	                });

	            });
	            </script>
	        </div>
	   	<div class='clear'></div>
		</div> -->
	</div>
</div>
<?php
	include ('template/footer.php');
?>