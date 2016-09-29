<?php
    include ("template/header.php");
    include ("models/products.php");
?>
    <div class="mens">
        <div class="slider_container">
            <div class="slide">
                <img src="resources/images/banner1.png" alt=""/>
            </div>
        </div>
        <div class="main">
            <div class="wrap">
                <div class="cont span_2_of_3">
                    <h2 class="head">Watch</h2>
                    <?php
                        include ("template/pagination.php");
                    ?>
                    <div class="top-box">
                    <?php
                        $product =  Product::getWatch();
                        foreach ($product as $pro){
                            echo "<div class='col_1_of_3 span_1_of_3'>
                                <a href='details.php?id=".$pro['pro_id']."'>
                                    <div class='inner_content clearfix'>
                                        <div class='product_image'>
                                            <img src='uploads/".$pro['pro_image']."' alt='' />
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
                        <div class="clear"></div>
                    </div>
                </div>
                <?php
                    include ("template/right.php");
                ?>
            </div>
        </div>
    </div>
<?php
    include ("template/footer.php");
?>