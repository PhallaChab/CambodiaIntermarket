<?php
    ob_start();
    include ('template/header.php');
    include ('../models/users.php');

    $emailErr='';
    $regisErr = '';

    if(isset($_POST['btnSubmit'])){
        //session_start();
        $name = $_POST['name'];
        $company_name = $_POST['company_name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = md5($_POST['pass']);
        $phone = $_POST['phone'];
        $role = "user";

        $email_validate = User::ValidateEmail($email);
        if($email_validate){
            $emailErr = "";
        }else{
            $emailErr = "Email not valid formart";
        }

        $checkMail = User::checkEmail($email);
        if($checkMail=='already'){
            $emailErr = "Email has already registered.";
        }else{
            echo "";
        }

        if($email_validate && $checkMail!='already')
        {
            $insert_users = User::insert($name,$company_name,$address,$email,$password,$phone,$role);
            //echo "You have been registered!";
            $userID = User::getUserid($email);
            $row = mysqli_fetch_array($userID);
            if($row){
                $userid = $row['userid'];
            }
            $mycart = User::insertcart($userid);
            header ("location:".URL."views/login.php");
        }else{
            $regisErr = "Register not success!";
        }

        
    }
?>
<head>
    <style type="text/css">
        .error {color: #FF0000;font-size: 28px;}
        .errorEmail{color:#ff0000;}
    </style>
</head>
<div class='register_account'>
    <div class='wrap'>
        <h4 class='title'><?php echo _t_newacc;?></h4>
        <form method='POST' name="form">
            <div class='col_1_of_2 span_1_of_2'>
            <p class="errorEmail"><?php echo $regisErr;?></p>
                <div><input type='text' name='name' value='' placeholder='<?php echo _t_name;?>' required>
                <span class="error">*</div>
                <div><input type='text' name='company_name' value='' placeholder='<?php echo _t_companyname;?>' ><span class="error">*</div>
                <div><input type='text' name='address' value='' placeholder='<?php echo _t_address;?>' >
                <span class="error">*</div>
            </div>
            <div class='col_1_of_2 span_1_of_2'>
                <div>
                <p class="errorEmail"><?php echo $emailErr;?></p>
                <input type='text' name='email' value='' placeholder='<?php echo _t_email;?>' required>
                <span class="error">*
                </div>
                <div><input type='password' name='pass' value='' placeholder='<?php echo _t_pass;?>' required>
                <span class="error">*</div>
                <div><input type='text' name='phone' value='' placeholder='<?php echo _t_phonenum;?>' required><span class="error">*</div>
            </div>
            <div class='clear'></div>
            <button class='grey' type='submit' name='btnSubmit' ><?php echo _t_signup;?></button>
            <div class='clear'></div>
        </form>
    </div>
</div>
<?php
    include ('template/footer.php');
?>