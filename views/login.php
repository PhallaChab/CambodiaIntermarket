<?php
	ob_start();

    include ('template/header.php');
    //session_start();
    include ('../models/users.php');
    
    if(@$_SESSION['login_user']!=""){
    	header("location:".URL);
    }

    $errLogin = '';

	if(isset($_POST['btnLogin'])){
	    $email = $_POST['email'];
	    $password = md5($_POST['pass']);
	    $query = User::login($email,$password);

	    if(mysqli_num_rows($query)>0){
	        while($row=mysqli_fetch_array($query)){
	        	$_SESSION['login_user']=$row['name']; // Initializing Session
	        	$_SESSION['rerole']=$row['role'];
	        	$_SESSION['uid']=$row['userid'];

		        if($_SESSION['rerole']=="admin"){
		    		header("location:".URL."admin");
		    	}else if($_SESSION['rerole']=="user"){
		    		header("location:".URL);
		    	}
	        }
	    }else{
		    $errLogin = "Please check your email and password again!";
	    }
	}
	
?>	
<div class="login">
  	<div class="wrap">
		<div class="col_1_of_login span_1_of_login">
			<h4 class="title"><?php echo _t_newcus;?></h4>
			<p><?php echo _t_register;?></p>
			<div class="button1">
			   <a href="register.php">
			   		<button class='grey' name="Submit" value=""><?php echo _t_newacc;?></button>
			   	</a>
			 </div>
			 <div class="clear"></div>
		</div>
		<div class="col_1_of_login span_1_of_login">
			<div class="login_account">
				<div class='wrap'>
		       		<h4 class="title"><?php echo _t_regcus;?></h4>
			        <form method='POST' action=''>
			            <div class='col_1_of_2 span_2_of_2'>
			            <p style="color:red;"><?php echo $errLogin;?></p>
			                <div><input type='text' name='email' value='' placeholder='<?php echo _t_email;?>' required></div>
			                <div><input type='password' name='pass' value='' placeholder='<?php echo _t_pass;?>' required></div>
			            </div>
			            <div class='clear'></div>
			            <button class='grey' type='submit' name='btnLogin'><?php echo _t_login;?></button>
			            <div class='clear'></div>
			        </form>
			      </div>
		    </div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php
	//}
    include ('template/footer.php');
?>