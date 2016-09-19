<?php
    include ('../include/functions.php');
  // User class is used instead of above two user functions
    class User {
        public static function login($email,$password){
            $sql ="select userid,name,email,password from users where email='".$email."' AND password = '".$password."'";
            return runQuery($sql);
        }

        public static function insert($name,$company_name,$address,$email,$password,$code,$phone){
            $sql = "INSERT INTO users (name,company_name,address,email,password,country_code,phone_number) values ('{$name}','{$company_name}','{$address}','{$email}','{$password}','{$code}', '{$phone}')";
            return runNonQuery($sql);
        }
    }
?>