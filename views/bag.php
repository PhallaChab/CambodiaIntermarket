<?php
    include ("template/header.php");
    include ("../models/products.php");
?>

<div class="main">
    <div class="wrap">
        <div class="col-lg-12">
            <div class="col-lg-2">
                <?php
                    include ("template/left_menu.php");
                ?>
            </div>
            <div class="col-lg-10">
                <div class="slide">
                    <!-- <img src="resources/images/banner.jpg" alt=""/> -->
                </div>
                <h2 class="head">BackPack</h2>
                <?php
                    include ("template/pagination.php");
                ?>
                <div class="">
                <?php
                    $product =  Product::getBag();
                    foreach ($product as $pro){
                    echo "<ul class='list-inline'>
                                <li class='displaydata'>
                                    <a href='details.php?code=".$pro['pro_code']."&id=".$pro['pro_id']."'>
                                        <img src='../uploads/".$pro['pro_image']."' />
                                        <div class='price'>
                                            <div class='cart-left'>
                                                <p class='title'>".$pro['pro_name']."</p>
                                                <div class='price1'>
                                                  <span class='actual'>$".$pro['pro_price']."</span>
                                                </div>
                                            </div>
                                            <div class='clear'></div>
                                        </div>  
                                    </a>
                                </li>
                           </ul>
                        ";
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<?php
    include ("template/footer.php");
?>