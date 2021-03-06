<?php
    include ("template/header.php");
    include ("../models/products.php");
	//session_start();
	require_once("../include/dbcontroller.php");
	$db_handle = new DBController();
	if(!empty($_GET["action"])) {
		switch($_GET["action"]) {
			case "remove":
				if(!empty($_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
						if($_GET["code"] == $k)
							unset($_SESSION["cart_item"][$k]);				
						if(empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
					}
				}
			break;
			case "empty":
				unset($_SESSION["cart_item"]);
			break;	
		}
	}
?>

<div class="main">
    <div class="wrap">
    	<h2 class="head"><?php echo _t_shopping;?></h2>
		<?php
			if(isset($_SESSION["cart_item"])){
			    $item_total = 0;
			    $total = 0;
			    $Subtotal = 0;
		?>
	  	<table class="table table-hover">
		    <thead>
		      	<tr>
		        	<th style="width:25%"></th>
		        	<th style="width:35%">Product</th>
		        	<th>Quatity</th>
		        	<th>Total</th>
		      	</tr>
		    </thead>
		    <tbody>
			
			<?php
				foreach ($_SESSION["cart_item"] as $item) { 
					$product_info = $db_handle->runQuery("SELECT * FROM products WHERE pro_code = '" . $item["code"] . "'");
					$total += ($item["price"]*$item["quantity"]);
					$item_total= ($item["price"]*$item["quantity"]);
					$Subtotal = ($total*0.95);
					//$item_qty += ($item["quantity"]); 
			?>
		      	<tr onMouseOver="document.getElementById('<?php echo $item["code"]; ?>').style.display='block';"  onMouseOut="document.getElementById('<?php echo $item["code"]; ?>').style.display='';">
		        	<td>
		        		<a href='details.php?code=<?php echo $product_info[0]['pro_code'];?>&id=<?php echo $product_info[0]['pro_id'];?>'>
		        		<img src="<?php echo "../uploads/".$product_info[0]['pro_image']; ?>" style="height:auto;width:60%"></a>
		        	</td>
		        	<td>
		        		<p><?php echo $product_info[0]["pro_name"]; ?></p>
		        		<p><?php echo "Price: $ ".$item["price"]; ?></p>
		        		<p>In stock usually within 2 weeks after order</p>
		        		<p id="<?php echo $item["code"]; ?>" >
		        			<a href="mycart.php?action=remove&code=<?php echo $item["code"]; ?>" title="Remove from Cart" >Delete</a>
		        		</p>
		        	</td>
		        	<td><p name="qty"><?php echo $item["quantity"]; ?></p></td>
		        	<td>$ <?php echo $item_total; ?></td>
		      	</tr>
			<?php
				}
			?>
				<tr>
		      		<td></td>
		      		<td></td>
		      		<td style="text-align:right;font-size:25px;padding: 20px 30px 20px 0;">
			      		<p>Total : </p>
			      		<p>Discount : </p>
		      		</td>
		      		<td style="font-size:25px;padding: 20px 0 20px 0;">
		      			<p>$ <?php echo $total; ?></p>
		      			<p>5%</p>
		      		</td>
		      	</tr>
		      	<tr>
		      		<td></td>
		      		<td></td>
		      		<td style="text-align:right;font-size:25px;padding: 20px 30px 20px 0;"><?php echo _t_subtotal;?> :</td>
		      		<td style="font-size:25px;padding: 20px 0 20px 0;"><?php echo $Subtotal;?></td>
		      	</tr>
		      	
			</tbody>
		</table>
		<h2 class="head"> Pay Now : Please transfer to bellow phone number</h2>
		<p>
			<a href=""><img src="resources/images/wing.png" title="Wing"></a>
			<a href=""><img src="resources/images/truemoney.png" title="True Money"></a>
			<a href=""><img src="resources/images/emoney.png" title="E-Money"></a>
		</p>
		<p>
			 
			
		</p>
		<div>
			<ul class="f-list">
	            <li>
	                <img src="resources/images/email.png" style="width:40px;">
	                <span class="icon-text f-text">: 
	                	<u style="color:#3e7ab7;">phalla.chab@gmail.com</u>
	                </span>
	                <div class="clear"></div>
	            </li>
	        </ul>
        </div>
		<div>
			<ul class="f-list">
	            <li>
	                <img src="resources/images/phone.png" style="width:40px;">
	                <span class="icon-text f-text">: 089 27 200</span>
	                <div class="clear"></div>
	            </li>
	        </ul>
        </div>
		<?php 
      		}else{
				echo "<h2 class='head' style='color:#f16725'>"._t_emtycard."!</h2>";
			}
      	?>
		<div class="cart_footer_link">
			<a href="mycart.php?action=empty"><?php echo _t_clearcard;?></a>|
			<a href="index.php" title="Cart"><?php echo _t_countinue;?></a>
		</div>
    </div>
</div>

<?php 
	include ("template/footer.php");
?>