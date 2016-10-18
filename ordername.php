<?php
    include ("template/header.php");
    include ("models/products.php");
?>
    <div class="main">
        <div class="wrap">
            <div class="cont span_2_of_3">
                <div class="top-box hover01">
                <?php
                    $product =  Product::getOrderName();
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
<?php
    include ("template/footer.php");
?>