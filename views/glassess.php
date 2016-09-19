<?php
    include ("template/header.php");
    include ("../models/products.php");
?>
    <div class="mens">
        <div class="slider_container">
            <div class="slide">
                <img src="resources/images/banner.jpg" alt=""/>
            </div>
        </div>
        <div class="main">
            <div class="wrap">
                <div class="cont span_2_of_3">
                    <h2 class="head">Sun Glassess</h2>
                    <div class="mens-toolbar">
                        <div class="sort">
                            <div class="sort-by">
                                <label>Sort By</label>
                                <select>
                                    <option value="">
                                        Type </option>
                                    <option value="">
                                        Name </option>
                                    <option value="">
                                        Price </option>
                                </select>
                            </div>
                        </div>
                        <div class="pager">
                            <div class="limiter visible-desktop">
                                <label>Show</label>
                                <select>
                                    <option value="" selected="selected">
                                        9 </option>
                                    <option value="">
                                        15 </option>
                                    <option value="">
                                        30 </option>
                                </select> per page
                            </div>
                            <ul class="dc_pagination dc_paginationA dc_paginationA06">
                                <li><a href="#" class="previous">Pages</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="top-box">
                    <?php
                        $product =  Product::getSunglass();
                        foreach ($product as $pro){
                            echo "<div class='col_1_of_3 span_1_of_3'>
                                <a href='details.php?id=".$pro['pro_id']."'>
                                    <div class='inner_content clearfix'>
                                        <div class='product_image'>
                                            <img src='resources/".$pro['pro_image']."' alt='' />
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