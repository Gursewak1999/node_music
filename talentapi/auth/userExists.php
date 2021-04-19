<?php

include_once('../helper/connect.php');
include_once('../helper/helper_functions.php');

if($method="POST")
	$method = $_POST;
else
	$method = $_GET;

$phone = $method[User::PHONE];
$email = $method[User::EMAIL];

$query = "SELECT COUNT(`".USER::USER_ID."`) as count FROM `$USER_TABLE` WHERE `".USER::PHONE."` = '".$phone."' OR `".USER::EMAIL."` = '".$email."'";

$query = mysqli_query($conn, $query);
$row = mysqli_fetch_row($query);
if($query){
	//Yes exists
	if($row[0]==0)
		echo('{"error":"false","msg":"No User Found."}');
	else
		echo('{"error":"false","msg":"'.$row[0].' Users Found."}');
}else {
	echo('{"error":"true","msg":"'.mysqli_error($conn).'"}');
}

?>