<?php
	//session_start();
	include ('template/header.php');
	//include ('../models/products.php');
?>
<div class='main'>
	<div class='wrap'>
		<div class="col-lg-12">
            <div class="slide">
            </div>
            <h2 class="head">Products Result</h2>
            <?php
                include ("template/pagination.php");
            ?>
            <div class="">
            <?php
                if(!isset($_POST['submit'])){
					$searchname = "";
				}else{
					$searchname  = $_POST['search'];
				 	$search = preg_replace("#[^0-9a-z]#i", "", $searchname);
				 	$result = Product::getSearch($search);
				 	if($result=="No"){
				 		echo "<p>There is no product.</p>";
				 	}else{
				 		foreach ($result as $pro){
		                    echo "<ul class='list-inline'>
		                            <li class='displayresult'>
		                                <a href='details.php?id=".$pro['pro_id']."'>
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
                    }
                }
            ?>
            </div>
	    </div>
	   	<div class='clear'></div>
	</div>
</div>
<?php
include ('template/footer.php');
?>