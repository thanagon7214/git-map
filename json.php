<?php

	header('Content-Type: application/json');
	$objConnect = mysqli_connect("localhost","root","","map");

	//mysqli_query("SET NAMES UTF8");
	
	$strSQL = "SELECT * FROM location ";

	$objQuery = mysqli_query($objConnect,$strSQL);
	$resultArray = array();
	while($obResult = mysqli_fetch_assoc($objQuery))
	{
		array_push($resultArray,$obResult);
	}
	

	
	echo json_encode($resultArray);
  



?>
