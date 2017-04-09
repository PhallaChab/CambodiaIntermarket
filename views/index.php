<?php
	$db = mysqli_connect("localhost","root","","cambointermarket");
        mysqli_query ( $db,"set character_set_results='utf8'" );
	include ("template/header.php");
	include ("../models/products.php");
?>
<?php
    $per_page=12;
    if (isset($_GET['page'])) {

    $page = $_GET['page'];
    }
    else {
    $page=1;
    
    }
    // Page will start from 0 and Multiple by Per Page
    $start_from = ($page-1) * $per_page;
    //Selecting the data from table but with limit
    $query = "select products.*, category.cat_name from products inner join category on products.cat_id=category.cat_id LIMIT $start_from, $per_page";
    
    $result = mysqli_query ($db, $query);
?>
<div class='main'>
	<div class='wrap'>
		<div class=''>
		 	<link href='resources/css/default.css' rel='stylesheet' type='text/css' media='all' />
		 	<link href='resources/css/nivo-slider.css' rel='stylesheet' type='text/css' media='all' />
		  	<script src='resources/js/jquery.nivo.slider.js'></script>
		    <script type='text/javascript'>
			    $(window).load(function() {
			        $('#slider').nivoSlider();
			    });
			</script>
		    <div class='slider-wrapper theme-default'>
		      	<div id='slider' class='nivoSlider'>
		            <img src='resources/images/bannerh.jpg' alt='' />
		           	<img src='resources/images/banner2.png' alt='' />
		            <img src='resources/images/bannerw.jpg' alt='' />

		      	</div>
		    </div>
		</div>
		 <div class="col-md-12 col-xs-12 modeproduct">
			<div class="staticWrapper">
       			<?php
                  	while ($row = mysqli_fetch_assoc($result)) {
                ?>
      
			<?php 
				echo "	<ul class='list-inline'>
                            <li class='displayborder'>
                                <a href='details.php?code=".$row['pro_code']."&id=".$row['pro_id']."'>
                                    <img src='../uploads/".$row['pro_image']."' />
                                    <div class='price'>
                                        <div class='cart-left'>
                                            <p class='titlepro'>".$row['pro_name']."</p>
                                            <div class='price1'>
                                              <span class='actual'>$".$row['pro_price']."</span>
                                            </div>
                                        </div>
                                        <div class='clear'></div>
                                    </div>  
                                </a>
                            </li>
                        </ul>";
				?>
	        <?php 
	           }
	        ?>
        </div>
		</div>
	    <div id="bottom_anchor"></div>
	        <?php
	          //Now select all from table
	          $query = "SELECT * from products";
	          $result = mysqli_query($db, $query);

	          // Count the total records
	          $total_records = mysqli_num_rows($result);

	          //Using ceil function to divide the total records on per page
	          $total_pages = ceil($total_records / $per_page);

	          //Going to first page
	          echo "<center><a href='index.php?page=1'>".'First Page'."</a> ";

	          for ($i=1; $i<=$total_pages; $i++) {

	          echo "<a href=index.php?page=".$i."'>".$i."</a> ";
	          };
	          // Going to last page
	          echo "<a href='index.php?page=$total_pages'>".'Last Page'."</a></center> ";
	        ?>
	         
  	</div>
</div>
<div class='clear'></div>
<?php
	include ('template/footer.php');
?>
    

















