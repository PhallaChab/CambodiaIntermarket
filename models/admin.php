<?php
include ("../include/functions.php");
// Product class is used instead of above four get product by category functions
class Products {
	public static function insert($pname,$pprice,$pcode,$pcat,$stock,$pimage,$deskh,$desen,$pinfor,$date){
        $sql = "INSERT INTO products (pro_name,pro_price,pro_code,cat_id,pro_stock,pro_image,pro_descriptionKh,pro_descriptionEn,pro_information,create_date) values ('{$pname}','{$pprice}','{$pcode}','{$pcat}','{$stock}','{$pimage}','{$deskh}','{$desen}','{$pinfor}','{$date}')";
        return runNonQuery($sql);
    }
   
    public static function edit($id,$pname,$pprice,$pcode,$pcat,$stock,$pimage,$deskh,$desen,$pinfor){
    	$sql = "UPDATE products SET pro_name='$pname',pro_price='$pprice',pro_code='$pcode',cat_id='$pcat',pro_stock='$stock',pro_image='$pimage',pro_descriptionKh='$deskh',pro_descriptionEn='$desen',pro_information='$pinfor' where pro_id='$id'";
    	return runNonQuery($sql);
    }

    public static function delect($id){
    	return runNonQuery("DELETE from products where pro_id=".$id);
    }

    public static function getProducts(){
       return runQuery("select products.*, category.cat_name from products inner join category on products.cat_id=category.cat_id ORDER BY create_date DESC");
   }
    public static function getProductByid($id){
        //return runQuery("SELECT * from products where pro_id = ".$id);
        $sql = "SELECT products.*, category.cat_name from products inner join category on products.cat_id=category.cat_id where pro_id=".$id;
        return runQuery($sql);
    }
    public static function getCategory(){
        return runQuery("SELECT * from category");
    }
    public static function getCategoryId($id){
        return runQuery("SELECT * from category where cat_id=".$id);
    }
    public static function checkCode($pcode){
        $select_code = "SELECT pro_code from products where pro_code = '".$pcode."'";
        $query = runQuery($select_code);        
        $a = mysqli_num_rows($query);
        while($row = mysqli_fetch_array($query)){
            if($row['pro_code'] == $pcode){
                return "already";
            }
        }
    }
}