<?php
	include ("../include/functions.php");
	class Category {
		public static function getCat(){
	        $sql = "SELECT * from category";
	        return runQuery($sql);
	    }

	    public static function getCatID($id){
	        $sql = "SELECT * from category where cat_id=".$id;
	        return runQuery($sql);
	    }

	    public static function insertCat($catName,$description){
	        $sql = "INSERT INTO category (cat_name,description) VALUES ('{$catName}','{$description}')";
	        return runNonQuery($sql);
	    }

	    public static function editCat($id,$catName,$description){
	    	$sql = "UPDATE category SET cat_name='$catName',description='$description' where cat_id='$id'";
	    	return runNonQuery($sql);
	    }
	}
?>