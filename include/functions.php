<?php
	define("DB_SERVER", "localhost");
	define("DB_USERNAME", "root");
	define("DB_PASSWORD", "");
	define("DB_DATABASE", "cim");
	
	// can run all query select
	function runQuery($sql){
		$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$result = mysqli_query($con,$sql) or die(mysqli_error());
		mysqli_close($con);
		return $result;
	}

	//can run all delete,insert,update statment
	function runNonQuery($sql){
		$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$st = mysqli_prepare($con,$sql) or die(mysqli_error());
		$i=0;
		if(mysqli_stmt_execute($st)){
			$i=1;
		}
		@mysqli_stmt_close($st);
		@mysqli_close($con);
		return $i;
		
	}
	// function runNonQuery($sql){
	// 	$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	// 	if ($conn->connect_error) {
	// 	 	die("Connection failed: " . $conn->connect_error);
	// 	}else{
	// 		if ($conn->query($sql) === TRUE) {
	// 	      	echo "New record created successfully".$sql;
	// 	       	return true;
	// 	    } else {
	// 	       	echo "Error: " . $sql . "<br>" . $conn->error.'<br/>';
	// 	       	return false;
	// 	    }
	// 	}
	// }
?>