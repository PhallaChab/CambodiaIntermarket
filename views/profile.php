<?php
    include ("template/header.php");
    include ("../models/users.php");

    $id = $_GET['id'];
    $user =  User::getUserProfile($id);
    $row = mysqli_fetch_array($user);
    if($row){
        $name = $row['name'];
        $company_name = $row['company_name'];
        $address = $row['address'];
        $email = $row['email'];
        $phone = $row['phone_number'];
    }
?>
<div class="main">
    <div class="wrap">
    	<div class="col-lg-12">
    		<div class="col-lg-3">
    			<img src="resources/images/s2.jpg">
    		</div>
    		<div class="col-lg-9">
    			<h2 class="head">Profile</h2>
    			<p>Name : <?php echo $name;?></p>
    			<p>Company Name : <?php echo $company_name;?></p>
    			<p>Address : <?php echo $address;?></p>
    			<p>Email : <?php echo  $email;?></p>
    			<p>Phone Number : <?php echo $phone;?></p>
    		</div>
    	</div>
    </div>
</div>
<div class="clear"></div>

<?php
	include ("template/footer.php");
?>