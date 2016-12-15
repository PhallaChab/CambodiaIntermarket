<?php
    include ("template/header.php");
    //include ("../models/products.php");
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
                        <img src="resources/images/bannerw.jpg" alt=""/>
                    </div>
                    <h2 class="head">Man Watch</h2>
                    <?php
                        include ("template/pagination.php");
                    ?>
                    <div class="hidden-xs">
                    <?php
                        $product =  Product::getMwatch();
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
                    <div class="clients hidden-lg hidden-md hidden-ms">
                <ul id="flexiselDemo3">
                <?php
                    $product =  Product::getMwatch();
                    foreach ($product as $pro){
                        echo "<li>
                            <a href='details.php?code=".$pro['pro_code']."&id=".$pro['pro_id']."''>
                            <img src='../uploads/".$pro['pro_image']."'/>
                            <p>".$pro['pro_name']."</p>
                            <p>$".$pro['pro_price']."</p>
                            </a>
                        </li>";
                    }
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
                <script type="text/javascript" src="js/jquery.flexisel.js"></script>
            </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
<?php
    include ("template/footer.php");
?>