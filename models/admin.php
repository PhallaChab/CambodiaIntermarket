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
       return runQuery("SELECT products.*, category.cat_name from products inner join category on products.cat_id=category.cat_id ORDER BY create_date DESC");
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
    public static function insertslide($description,$image,$date){
        $sql = "INSERT INTO slides (description,image,date_add) values ('{$description}','{$image}','{$date}')";
        return runNonQuery($sql);
    }
    public static function delectslide($id){
        $sql = "DELETE from slides where id=".$id;
        return runQuery($sql);
    }
    public static function editslide($id,$img, $descrip){
        $sql = "UPDATE slides SET image ='$img',description = '$descrip' where id='$id'";
        return runNonQuery($sql);
    }
    public static function getSlide(){
        $sql = "SELECT * from slides ORDER BY date_add DESC";
        return runQuery($sql);
    }
    public static function getSlideid($id){
        $sql = "SELECT * from slides where id=".$id;
        return runQuery($sql);
    }
    // manage menu
    public static function insertMenu($menu_name,$menu_kh,$menu_link){
        $sql = "INSERT INTO main_menu(m_menu_name,menu_kh,m_menu_link) 
                VALUES('$menu_name','$menu_kh','$menu_link')";
        return runQuery($sql);
    }
    public static function insertSubMenu($parent,$proname,$menu_link,$submenu_kh){
        $sql = "INSERT INTO sub_menu(m_menu_id,s_menu_name,s_menu_link,submenu_kh) 
                VALUES('$parent','$proname','$menu_link','$submenu_kh')";
        return runQuery($sql);
    }
    public static function getMainmenu(){
        return runQuery("SELECT * FROM main_menu");
    }
    public static function getSubmenu($mainid){
        $sql = "SELECT * FROM sub_menu WHERE m_menu_id=".$mainid;
        return runQuery($sql);
    }
    public static function delectMm($mid){
        return runNonQuery("DELETE from main_menu where m_menu_id=".$mid);
    }
    public static function delectSm($sid){
        return runNonQuery("DELETE from sub_menu where s_menu_id=".$sid);
    }

}