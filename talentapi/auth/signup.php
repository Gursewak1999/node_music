<?php

include_once('../helper/connect.php');
include_once('../helper/helper_functions.php');

if($method="POST")
	$method = $_POST;
else 
	$method = $_GET;


$password = $method[User::PASSWORD];
$fname = $method[User::FNAME];
$lname = $method[User::LNAME];
$phone = $method[User::PHONE];
$email = $method[User::EMAIL];
$profile_pic = $method[User::PROFILE_PIC];

$username = $fname.generateRandomNumbers(6);
$user_id = "user_".generateRandomString(59);

function checkUsername(){
	global $username, $user_id, $conn,$USER_TABLE;
	$query = mysqli_query($conn, "SELECT count(`".User::USERNAME."`) FROM `$USER_TABLE` WHERE `".User::USERNAME."` = '".$username."' OR `".USER::USER_ID."` = '".$user_id."'");
	$row = mysqli_fetch_row($query);
	if ($row[0]>0) {

		//repeat
		$username = lname.generateRandomString(6);
		$user_id = "user_".generateRandomString(59);
		checkUsername();
	}
}
checkUsername();

$full_name = $fname." ".$lname;
$created_date = getCurrentTimestamp();
$updated_date = getCurrentTimestamp();




$query = "INSERT INTO `users`
			(`".User::USER_ID."`,
			`".User::USERNAME."`,
			`".User::PASSWORD."`,
			`".User::FNAME."`, `".User::LNAME."`,
			`".User::FULL_NAME."`,
			`".User::PROFILE_PIC."`,
			`".User::PHONE."`,
			`".User::EMAIL."`,
			`".User::CREATED_DATE."`,
			`".User::UPDATED_DATE."`) 
		VALUES 
			('".$user_id."',
			'".$username."',
			'".$password."',
			'".$fname."',
			'".$lname."',
			'".$full_name."',
			'".$profile_pic."',
			'".$phone."',
			'".$email."',
			'".$created_date."',
			'".$updated_date."'
			)";

$query = mysqli_query($conn, $query);


if($query){
	
	$token = generateRandomString();
	$query = "INSERT INTO `authentication_token`(`user_id`, `token`, `creation_date`) VALUES ('".$user_id."','".$token."','".$created_date."')";
	$query = mysqli_query($conn, $query);

	$query = "SELECT * FROM `$USER_TABLE` WHERE `user_id` = '$user_id'";
	$query = mysqli_query($conn, $query);
	if(!$query)
		echo(mysqli_error($conn));
	$row = mysqli_fetch_assoc($query);
	$row['token'] = $token;
	$json = json_encode($row);
	$json = strval($json);
	echo('{"error":"false","msg":'.$json.'}');
}else {
	echo('{"error":"true","msg":"'.mysqli_error($conn).'"}');
}



?>

