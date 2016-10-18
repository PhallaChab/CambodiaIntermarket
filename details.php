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
                <b>Details</b>
            </ul>
            <div class="cont col-lg-12">
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
               		<p class='m_5'><?php echo _t_price; echo $pprice;?></p>
                    <a href="#toogle"><?php echo _t_readmore;?></a>
                    <p><button class="black"><?php echo _t_addbasket;?></button></p>
                    <a href=""><span class="glyphicon glyphicon-heart heartdetail" aria-hidden="true"></span></a>
	            </div>
                <div class="clearfix"></div>
                <!-- <div class="clients">
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
                </div> -->
            </div>
            <div class="col-lg-12">
                <div style="height:120px"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div id='toogle'>
                        <h3 class='m_3'><?php echo _t_description;?></h3>
                        <p class='m_text2'><?php echo $disc;?></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class='' src='uploads/<?php echo $pimage;?>' class='img-responsive' />
                </div>
            </div>
            <div class="col-lg-12">
                <div style="height:50px"></div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-4">
                    <ul class="f-list">
                        <li>
                            <img src="resources/images/2.png">
                            <span class="f-text"><?php echo _t_order;?></span>
                            <div class="clear"></div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <ul class="f-list">
                        <li>
                            <img src="resources/images/3.png">
                            <span class="f-text"><?php echo _t_return;?></span>
                            <div class="clear"></div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <ul class="f-list">
                        <li>
                            <img src="resources/images/2.png">
                            <span class="f-text"><?php echo _t_payment;?></span>
                            <div class="clear"></div>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div style="height:50px"></div>
    </div>
    <div class="clear"></div>

<?php
    include ('template/footer.php');
?>