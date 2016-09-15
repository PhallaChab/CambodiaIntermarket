<?php
	// can run all query select
	function runQuery($sql){
		$con = mysqli_connect("localhost","root","","cim");
		$result = mysqli_query($con,$sql);
		mysqli_close($con);
		return $result;
	}
	// function selectLang(){
	// 	$con = mysqli_connect("localhost","root","","cim");
	// 	$sql = "set character_set_results='utf8'";
	// 	$selcetlang = mysqli_query($con,$sql);
	// 	return $selcetlang;
	// }
	//can run all delete,insert,update statment
	function runNonQuery($sql){
		$con = mysqli_connect("localhost","root","","cim");
		$st = mysqli_prepare($con,$sql);
		$i=0;
		if(mysqli_stmt_execute($st)){
			$i=1;
		}
		@mysqli_stmt_close($st);
		@mysqli_close($con);
		return $i;
		
	}
	//function to get all category form table category
	function getProducts(){
		return runQuery("select * from products");
	}

	function getProductImage($id){
		return runQuery("select * from products where pro_id = ".$id);
	}

	function getSunglass(){
		return runQuery("select * from products where cat_id = 2");
	}

	function getWatch(){
		return runQuery("select * from products where cat_id = 3");
	}

	function getSearch($result){
		$rows =  runQuery("select * from products where pro_name LIKE '%".$result."%' or pro_price LIKE '%".$result."%'");
		if(@mysqli_num_rows($rows)>0){
			return $rows;
		}else{
			return "No";
		}
	}

	function usersLogin($email,$password){
		return runQuery("select * from users where email=".$email. "AND password = ".$password);
	}

	function insertUsers($name,$company_name,$address,$email,$password,$code,$phone){
		return runNonQuery("INSERT INTO users (name,company_name,address,email,password,country_code,phone_number) values ('{$name}','{$company_name}','{$address}','{$email}','{$password}','{$code}', '{$phone}')");
	}

	//fucntion delete category by id
	function deleteCagetories($id){
		return runNonQuery("delete from category where catid=".$id);
	}
	

?>