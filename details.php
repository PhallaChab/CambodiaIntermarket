<?php
    $db = mysqli_connect("localhost","root","","cim");
    mysqli_query ( $db,"set character_set_results='utf8'" );

    include ('template/header.php');
    include ('models/products.php');

    $id = $_GET['id'];
    $product =  Product::getProductImage($id);
    $row = mysqli_fetch_array($product);
    if($row){
        $pname = $row['pro_name'];
        $pprice = $row['pro_price'];
        $pimage = $row['pro_image'];
        $deskh = $row['pro_descriptionKh'];
        $desen = $row['pro_descriptionEn'];
        $pinfor = $row['pro_information'];
    }
    $select = "select * from products where pro_id = ".$id;
    $query = mysqli_query($db,$select);
    $numrow = mysqli_num_rows($query);
    if($numrow>0){
        while($row = $query->fetch_object()){;
            if($_SESSION['lang']==1){
                $disc=$row->pro_descriptionKh;
            }else if($_SESSION['lang']==2){
                $disc=$row->pro_descriptionEn;
            }
        }
    }
?>
<head>
    <meta charset='utf-8' />
    <script>
    $(function() {
        $('#products').slides({
            preload: true,
            preloadImage: 'img/loading.gif',
            effect: 'slide, fade',
            crossfade: true,
            slideSpeed: 350,
            fadeSpeed: 500,
            generateNextPrev: true,
            generatePagination: false
        });
    });
    jQuery(document).ready(function($) {

        $('#etalage').etalage({
            thumb_image_width: 360,
            thumb_image_height: 360,
            source_image_width: 900,
            source_image_height: 900,
            show_hint: true,
            click_callback: function(image_anchor, instance_id) {
                alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
            }
        });

    });
    </script>
</head>
    <div class="main">
        <div class="wrap">
            <ul class="breadcrumb breadcrumb__t">
                <a class="home" href="index.php">Home</a> / 
                <a href="#">Details</a>
            </ul>
            <div class="col-md-12">
                <img src="resources/images/hauwei.gif"/>
            </div>
            <div class="cont span_2_of_3">
            	<?php
            		
				?>
                <div class="grid images_3_of_2" >
                    <ul id="etalage">
                        <li style="background: #f7f7f7;border: none;">
    						<a href=''>
                        		<img class='etalage_thumb_image' src='uploads/<?php echo $pimage;?>' class='img-responsive' />
                    		</a>
                    		<img class='etalage_source_image' src='uploads/<?php echo $pimage;?>' class='img-responsive' title='' />
                        </li>
                    </ul> 
	                <div class='clearfix'></div>
	            </div>
                <div class='desc1 span_3_of_2'>
                    <h3 class='m_3 p_title'><?php echo $pname;?><h3>
               		<p class='m_5'>Price: $ <?php echo $pprice;?></p>
                    <div class='toogle'>
                    	<h3 class='m_3'>Product Description</h3>
                    	<p class='m_text2'><?php echo $disc;?></p>
                        <p>I want buy this product <a href="">Chat Here</a></p>
                	</div>
	            </div>
                <div class='clear'></div>
                    <div class='toogle'>
                    <h3 class='m_3'>Product Information</h3>
                    <p class='m_text'><?php echo $pinfor?></p>
                </div>
                <div class="clearfix"></div>
                <div class="clients">
                    <h3 class="m_3">Products in the same category</h3>
                    <ul id="flexiselDemo3" class="col-xs-6">
                        <li><img src="resources/images/s5.jpg" /><a href="#">Glass</a>
                            <p>$ 100</p>
                        </li>
                        <li><img src="resources/images/s6.jpg" /><a href="#">Glass</a>
                            <p>$ 35</p>
                        </li>
                        <li><img src="resources/images/s7.jpg" /><a href="#">Glass</a>
                            <p>$ 25</p>
                        </li>
                        <li><img src="resources/images/s8.jpg" /><a href="#">Glass</a>
                            <p>$ 110</p>
                        </li>
                        <li><img src="resources/images/s9.jpg" /><a href="#">Glass</a>
                            <p>$ 60</p>
                        </li>
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
            </div>
            <div class='rsidebar span_1_of_left'>
                <?php include ("template/advertise.php");?>
            </div>
    </div>
    <div class="clear"></div>

<?php
    include ('template/footer.php');
?>