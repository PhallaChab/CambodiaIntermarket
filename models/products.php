<?php
    include ("../include/functions.php");
    // Product class is used instead of above four get product by category functions
    class Product {
        public static function getProducts(){
            return runQuery("SELECT * FROM products ORDER BY create_date DESC LIMIT 12");
        }

        public static function getProductImage($id){
            return runQuery("SELECT * FROM products WHERE pro_id = ".$id);
        }

        public static function getSunglass(){
            return runQuery("SELECT * FROM products WHERE cat_id = 1");
        }

        public static function getMwatch(){
            return runQuery("SELECT * FROM products WHERE cat_id = 2");
        }

        public static function getWwatch(){
            return runQuery("SELECT * FROM products WHERE cat_id = 3");
        }

        public static function getCosmetic(){
            return runQuery("SELECT * FROM products WHERE cat_id = 4");
        }

        public static function getHandbag(){
            return runQuery("SELECT * FROM products WHERE cat_id = 5");
        }

        public static function getWperfume(){
            return runQuery("SELECT * FROM products WHERE cat_id = 6");
        }

        public static function getMperfume(){
            return runQuery("SELECT * FROM products WHERE cat_id = 7");
        }

        public static function getSiren(){
            return runQuery("SELECT * FROM products WHERE cat_id = 8");
        }
        public static function getBelt(){
            return runQuery("SELECT * FROM products WHERE cat_id = 9");
        }
        public static function getBag(){
            return runQuery("SELECT * FROM products WHERE cat_id = 10");
        }
        
        public static function getMnew(){
            return runQuery("SELECT * FROM products WHERE cat_id IN ('1','7','9','2') ORDER BY create_date DESC");
        }
        public static function getWnew(){
            return runQuery("SELECT * FROM products WHERE cat_id IN ('6','5','4','3','1') ORDER BY create_date DESC");
        }
        public static function getWoman(){
            return runQuery("SELECT * FROM products WHERE cat_id IN ('6','5','4','3','1') ORDER BY cat_id");
        }
        public static function getMan(){
            return runQuery("SELECT * FROM products WHERE cat_id IN ('1','7','9','2') ORDER BY cat_id");
        }


        public static function getSearch($result){
            $sql = "SELECT * FROM products WHERE pro_name LIKE '%".$result."%' or pro_price LIKE '%".$result."%'";
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
        // cart process
        public static function getcartID($userid){
            return runQuery("SELECT * from carts where userid = ".$userid);
        }
        public static function insertpro_cart($cartid,$productid,$qty){
            $sql = "INSERT INTO cartproducts (cart_id,pro_id,quantity) values ('{$cartid}','{$productid}','{$qty}')";
            return runNonQuery($sql);
        }
        public static function selectproductcart($code){
            $sql= "SELECT * FROM products WHERE pro_code='" . $code . "'";
            return runQuery($sql);
        }
        public static function getIdCart($uid){
            return runQuery("SELECT * from carts where userid = ".$uid);
        }
        public static function getCartProduct($cartid){
            $sql = "SELECT products.*, cartproducts.* from products 
                    JOIN cartproducts on products.pro_id = cartproducts.pro_id 
                    where cart_id=".$cartid;
            return runQuery($sql);
        }
        public static function delect($id){
            return runNonQuery("DELETE from cartproducts where id=".$id);
        }
        public static function countCart($cartid){
            return runQuery("SELECT count(*) from cartproducts where cart_id =".$cartid);
        }
        public static function showslide(){
            $sql = "SELECT * from slides ORDER BY date_add DESC LIMIT 4";
            return runQuery($sql);
        }
        //menu dinamic
        public static function getMainmenu(){
            return runQuery("SELECT * FROM main_menu");
        }
        public static function getSubmenu($mainid){
            $sql = "SELECT * FROM sub_menu WHERE m_menu_id=".$mainid;
            return runQuery($sql);
        }
    }
?>
<!-- SELECT products.pro_name from products 
inner join productcarts.pro_id 
on productcarts.pro_id = products.pro_id
SELECT products.* from products JOIN cartproducts on products.pro_id = cartproducts.pro_id
alter table cartproducts add foreien key (pro_id) references products (pro_id) -->