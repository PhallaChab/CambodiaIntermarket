<?php
    //include ('../include/functions.php');
  // User class is used instead of above two user functions
    class User {
        public static function login($email,$password){
            $sql ="select userid,name,email,password,role from users where email='".$email."' AND password = '".$password."'";
            return runQuery($sql);
        }

        public static function insert($name,$company_name,$address,$email,$password,$phone,$role){
            $sql = "INSERT INTO users (name,company_name,address,email,password,phone_number,role) values ('{$name}','{$company_name}','{$address}','{$email}','{$password}','{$phone}','{$role}')";
            return runNonQuery($sql);
        }
        public static function ValidateEmail($email) {
            $formart_email = filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email);
            if($formart_email){
                return $formart_email;
            }
        }
        public static function checkEmail($email){
            $select_email = "SELECT email from users where email = '".$email."'";
            $query = runQuery($select_email);        
            $a = mysqli_num_rows($query);
            while($row = mysqli_fetch_array($query)){
                if($row['email'] == $email){
                    return "already";
                }
            }
        }
        public static function getUserProfile($id){
            return runQuery("SELECT * from users where userid = ".$id);
        }
        public static function getUser(){
            return runQuery("SELECT * from users");
        }
        public static function getUserid($email){
            return runQuery("SELECT * from users where email = '".$email."'");
        }
        public static function insertcart($userid){
            $sql = "INSERT INTO carts (userid) values ('{$userid}')";
            return runNonQuery($sql);
        }
    }
?>