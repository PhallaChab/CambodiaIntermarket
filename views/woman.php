<?php
    include ("template/header.php");
    //include ("../models/products.php");
?>
<div class='main'>
    <div class='wrap'>
        <div class="col-md-12">
			<?php 
				$product =  Product::getWoman();
					foreach ($product as $pro){
						echo "<ul class='list-inline'>
                                    <li class='displayresult'>
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
                                </ul>";
					}
				?>
		</div>
		<div class='clear'></div>
	</div>
</div>
<?php
	include ('template/footer.php');
?>