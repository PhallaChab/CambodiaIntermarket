<?php
    include ('template/header.php');
    include ('../include/functions.php');
?>
<div class='register_account'>
    <div class='wrap'>
        <h4 class='title'>Create an Account</h4>
        <form method='POST'>
            <div class='col_1_of_2 span_1_of_2'>
                <div><input type='text' name='name' value='' placeholder='Name'></div>
                <div><input type='text' name='company_name' value='' placeholder='Company Name' '></div>
                <div><input type='text' name='address' value='' placeholder='Address'></div>
            </div>
            <div class='col_1_of_2 span_1_of_2'>
                <div><input type='text' name='email' value='' placeholder='E-Mail'></div>
                <div><input type='password' name='pass' value='' placeholder='password'></div>
                <input type='text' name='code' value='' class='code' placeholder='Country Code'> +
                <input type='text' name='phone' value='' class='number' placeholder='Phone Number'>
            </div>
            <div class='clear'></div>
            <button class='grey' type='submit' name='btnSubmit'>Register</button>
            <div class='clear'></div>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['btnSubmit'])){
        //session_start();
        $name = $_POST['name'];
        $company_name = $_POST['company_name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = md5($_POST['pass']);
        $code = $_POST['code'];
        $phone = $_POST['phone'];
        //var_dump($name);
        $insert_users = insertUsers($name,$company_name,$address,$email,$password,$code,$phone);
        if($insert_users)
        {
            echo "You have been registered!";
        }
    }
    include ('template/footer.php');
?>