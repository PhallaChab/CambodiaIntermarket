<?php
    include ('template/header.php');
    include ('../include/functions.php');
?>
<div id="fwslider">
    <div class="slider_container">
        <div class="slide">
            <img src="resources/images/banner.jpg" alt=""/>
            <div class="slide_content">
                <div class="slide_content_wrap">
                    <h4 class="title">Aluminium Club</h4>
                    <p class="description">Experiance ray ban</p>
                </div>
            </div>
        </div>
        <div class="slide">
            <img src="resources/images/banner1.png" alt=""/>
            <div class="slide_content">
                <div class="slide_content_wrap">
                    <h4 class="title">consectetuer adipiscing </h4>
                    <p class="description">diam nonummy nibh euismod</p>
                </div>
            </div>
        </div>
        <div class="slide">
            <img src="resources/images/banner2.png" alt=""/>
            <div class="slide_content">
                <div class="slide_content_wrap">
                    <h4 class="title">Hello world</h4>
                    <p class="description">good product</p>
                </div>
            </div>
        </div>
    </div>
    <div class="timers"></div>
    <div class="slidePrev"><span></span></div>
    <div class="slideNext"><span></span></div>
</div>
<div class='main'>
	<div class='wrap'>
		<div class='section group'>
		  	<div class='cont span_2_of_3'>
			  	<h2 class='head'><?php echo _t_justarr;?></h2>
				<div class='top-box'>
					<?php
						$product =  getProducts();
						foreach ($product as $pro){
							echo "<div class='col_1_of_3 span_1_of_3'>
							 		<a href='details.php?id=".$pro['pro_id']."'>
									<div class='inner_content clearfix'>
										<div class='product_image'>
											<img src='resources/".$pro['pro_image']."' alt=''/>
										</div>
										<div class='sale-box1'>
											<span class='on_sale title_shop'>"._t_new."</span>
										</div>	
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
	              	<!-- <div class='btn'>
	              		<a href='single.html'>Check it Out</a>
	              	</div> -->
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