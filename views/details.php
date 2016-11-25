<?php
    $db = mysqli_connect("localhost","root","","cambointermarket");
    mysqli_query ( $db,"set character_set_results='utf8'" );

    include ('template/header.php');
    include ('../models/products.php');

    $id = $_GET['id'];
    $product =  Product::getProductImage($id);
    $row = mysqli_fetch_array($product);
    if($row){
        $pname = $row['pro_name'];
        $pprice = $row['pro_price'];
        $pimage = $row['pro_image'];
        $stock = $row['pro_stock'];
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
            <form method="post" action="details.php?action=add&code=<?php echo $_GET["code"]; ?>&id=<?php echo $_GET['id']; ?>">
                <div class="cont col-lg-12">
                    <div class="grid images_3_of_2" >
                        <ul id="etalage">
                            <li style="background: #f7f7f7;border: none;">
                                <a href=''>
                                    <img class='etalage_thumb_image' src='../uploads/<?php echo $pimage;?>' class='img-responsive'/>
                                </a>
                                <img class='etalage_source_image' src='../uploads/<?php echo $pimage;?>' class='img-responsive' title='' />
                            </li>
                        </ul> 
                        <div class='clearfix'></div>
                    </div>
                    <div class='desc1 span_3_of_2'>
                        <h3 class='m_3 p_title'><?php echo $pname;?><h3>
                        <p class='m_5'><?php echo _t_price; echo $pprice;?></p>
                        <p class="m_5" style="color:#0097ff;"><?php echo $stock;?></p><br/>
                        <input type="number" class="qty" name="quantity" value="1"><br/><br/>
                        <a href="#toogle"><?php echo _t_readmore;?></a>
                        <p>
                            <button type="submit" class="black" name="basket">
                                <?php echo _t_addbasket;?>
                            </button>
                        </p>
                    </div>
                    <!-- <div class="clearfix"></div> -->
                </div>
            </form>
            <form method="post" action="details.php?action=like&code=<?php echo $_GET["code"]; ?>&id=<?php echo $_GET['id']; ?>">
                <a href=''>
                    <img class='etalage_thumb_image hidden' src='../uploads/<?php echo $pimage;?>' class='img-responsive'/>
                </a>
                <h3 class='m_3 p_title hidden'><?php echo $pname;?><h3>
                <p class='m_5 hidden'><?php echo _t_price; echo $pprice;?></p><br/>
                <input type="number" class="hidden" name="quantity" value="1">
                <a href="">
                    <button type="submit" class="myheart">
                        <span name='heart' class="glyphicon glyphicon-heart heartdetail" aria-hidden="true"></span>
                    </button>
                </a>
            </form>
            
            <div class="clearfix"></div>
            <div class="col-lg-12" id='toogle'>
                <div style="height:120px"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div >
                        <h3 class='m_3'><?php echo _t_description;?></h3>
                        <p class='m_text2'><?php echo $disc;?></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class='' src='../uploads/<?php echo $pimage;?>' class='img-responsive' />
                </div>
            </div>
            <div class="col-lg-12">
                <div style="height:50px"></div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-4">
                    <ul class="f-list">
                        <li>
                            <img src="resources/images/delever.png">
                            <span class="f-text"><?php echo _t_order;?></span>
                            <div class="clear"></div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <ul class="f-list">
                        <li>
                            <img src="resources/images/Replace-52.png">
                            <span class="f-text"><?php echo _t_return;?></span>
                            <div class="clear"></div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <ul class="f-list">
                        <li>
                            <img src="resources/images/payment.png">
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