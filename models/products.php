<?php
include ("include/functions.php");
// Product class is used instead of above four get product by category functions
class Product {
    public static function getProducts(){
        return runQuery("select * from products");
    }

    public static function getProductImage($id){
        return runQuery("select * from products where pro_id = ".$id);
    }

    public static function getSunglass(){
        return runQuery("select * from products where cat_id = 1");
    }

    public static function getWatch(){
        return runQuery("select * from products where cat_id = 2");
    }

    public static function getHandbag(){
        return runQuery("select * from products where cat_id = 3");
    }

    public static function getCosmetic(){
        return runQuery("select * from products where cat_id = 4");
    }

    // public static function getCosmetic(){
    //     return runQuery("select * from products where cat_id = 5");
    // }

    public static function getPerfume(){
        return runQuery("select * from products where cat_id = 6");
    }

    // public static function getCosmetic(){
    //     return runQuery("select * from products where cat_id = 7");
    // }

    // public static function getCosmetic(){
    //     return runQuery("select * from products where cat_id = 8");
    // }

    public static function getSearch($result){
        $sql = "select * from products where pro_name LIKE '%".$result."%' or pro_price LIKE '%".$result."%'";
        $rows =  runQuery($sql);
        if(@mysqli_num_rows($rows)>0){
            return $rows;
        }else{
            return "No";
        }
    }
    public static function getOrderName(){
        $sql = "SELECT * FROM products ORDER BY pro_name";
        return runQuery($sql);
    }
}
?>