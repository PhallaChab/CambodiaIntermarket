<?php
	include ("template/header.php");
	//include ("../models/products.php");
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
		      		<?php 
		      			$ShowSlide=Product::showslide();
		      			foreach ($ShowSlide as $show){
		      				echo "
		      					<img src = '../uploads/".$show['image']."'/>
		      				";
		      			}
		      		?>

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
						echo "	<ul class='list-inline'>
                                    <li class='displayborder'>
                                        <a href='details.php?code=".$pro['pro_code']."&id=".$pro['pro_id']."'>
                                            <img src='../uploads/".$pro['pro_image']."' />
                                            <div class='price'>
                                                <div class='cart-left'>
                                                    <p class='titlepro'>".$pro['pro_name']."</p>
                                                    <div class='price1'>
                                                      <span class='actual'>$".$pro['pro_price']."</span>
                                                    </div>
                                                </div>
                                                <div class='clear'></div>
                                            </div>  
                                        </a>
                                    </li>
                                </ul>";
					}
				?>
			</div>
		</div>
		<div class='clear'></div>
	</div>
</div>
<?php
	include ('template/footer.php');
?>