<?php
	// can run all query select
	function runQuery($sql){
		$con = mysqli_connect("localhost","root","","cim");
		$result = mysqli_query($con,$sql);
		mysqli_close($con);
		return $result;
	}

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
?>