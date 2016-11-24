<?php 
    session_start();
    include ("../config/config.php");
    
    $user = $_SESSION['login_user'];
    $role = $_SESSION['rerole'];
    
    if($user){
        if($role=='user'){
            header("location:".URL);
        }
    }else{
        header("location:".URL."views/login.php");
    }
?>
