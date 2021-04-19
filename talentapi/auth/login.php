<?php

include_once('../helper/connect.php');
include_once('../helper/helper_functions.php');

if($method="POST")
	$method = $_POST;
else
	$method = $_GET;

$username = $method[User::USERNAME];
$password = $method[User::PASSWORD];

$query = "SELECT COUNT(`".USER::USER_ID."`), user_id as count FROM `$USER_TABLE` WHERE 
						(	`".USER::PHONE."` = '".$username."'
						OR	`".USER::EMAIL."` = '".$username."'
						OR	`".USER::USERNAME."` = '".$username."'
						) AND `".USER::PASSWORD."` = '".$password."'
						";
//echo($query);
$query = mysqli_query($conn, $query);
$row = mysqli_fetch_row($query);

if($row[0]==0){
	//user found
	//get and authenticate token
	echo('{"error":"true","msg":"User not Found."}');

}else{
	$user_id = $row[1];
	include("generateAuthToken.php");
	$query = "SELECT * FROM `$USER_TABLE` WHERE `user_id` = '$user_id'";
	$query = mysqli_query($conn, $query);
	if(!$query)
		echo(mysqli_error($conn));
	$row = mysqli_fetch_assoc($query);
	$row['token'] = $token;
	$json = json_encode($row);
	$json = strval($json);
	echo('{"error":"false","msg":'.$json.'}');
}

?>