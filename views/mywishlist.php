<?php
    include ("template/header.php");
    include ("../models/products.php");

    require_once("../include/dbcontroller.php");
	$db_handle = new DBController();
	if(!empty($_GET["action"])) {
		switch($_GET["action"]) {
			case "remove":
				if(!empty($_SESSION["like_item"])) {
					foreach($_SESSION["like_item"] as $k => $v) {
						if($_GET["code"] == $k)
							unset($_SESSION["like_item"][$k]);				
						if(empty($_SESSION["like_item"]))
							unset($_SESSION["like_item"]);
					}
				}
			break;
			case "empty":
				unset($_SESSION["like_item"]);
			break;	
		}
	}
?>

<div class="main">
    <div class="wrap">
    	<h2 class="head"><?php echo _t_wishlist;?></h2>
		<?php
			if(isset($_SESSION["like_item"])){
		?>
	  	<table class="table table-hover">
		    <thead>
		      	<tr>
		        	<th style="width:25%"></th>
		        	<th style="width:35%">Product</th>
		        	<th>Price</th>
		        	<th>Action</th>
		      	</tr>
		    </thead>
		    <tbody>
			
			<?php
				foreach ($_SESSION["like_item"] as $item) { 
					$product_info = $db_handle->runQuery("SELECT * FROM products WHERE pro_code = '" . $item["code"] . "'");
			?>
		      	<tr onMouseOver="document.getElementById('<?php echo $item["code"]; ?>').style.display='block';"  onMouseOut="document.getElementById('<?php echo $item["code"]; ?>').style.display='';">
		        	<td>
		        		<a href='details.php?code=<?php echo $product_info[0]['pro_code'];?>&id=<?php echo $product_info[0]['pro_id'];?>'>
		        		<img src="<?php echo "../uploads/".$product_info[0]['pro_image']; ?>" style="height:auto;width:60%"></a>
		        	</td>
		        	<td>
		        		<p><?php echo $product_info[0]["pro_name"]; ?></p>
		        	</td>
		        	<td><?php echo "$ ".$item["price"]; ?></td>
		        	<td>
		        		<p id="<?php echo $item["code"]; ?>" >
		        			<a href="mywishlist.php?action=remove&code=<?php echo $item["code"]; ?>" title="Remove from Wishlist" >
		        				<span name='heart' 
		        			  			type="submit" 
		        			  			class="glyphicon glyphicon-heart heartdetail" 
		        			  			aria-hidden="true">
		        		</span>
		        			</a>
		        		</p>
		        	</td>
		      	</tr>
			<?php
				}
			?>
		      	
			</tbody>
		</table>
		<?php 
      		}else{
				echo "<h2 class='head' style='color:#f16725'>"._t_emtywish."!</h2>";
			}
      	?>
		<div class="cart_footer_link">
			<a href="mywishlist.php?action=empty"><?php echo _t_clarwish;?></a>
		</div>
    </div>
</div>

<?php 
	include ("template/footer.php");
?>