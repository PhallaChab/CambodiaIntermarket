<?php
	include ('../include/functions.php');
  	// Category class is used instead of above function
  	class Category {
    	public static function deleteCagetories($id){
      		$sql = "delete from category where catid=".$id;
      		return runNonQuery($sql);
    	}
  	}
?>