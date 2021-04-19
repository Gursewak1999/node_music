<?php

include_once('../helper/connect.php');
include_once('../helper/helper_functions.php');

if($method="POST")
	$method = $_POST;
else
	$method = $_GET;

$user_id = $method[User::USER_ID];
$token = $method[User::TOKEN];

if (!isUserAuthenticated($conn, $user_id, $token)) {
	echo('{"error"="true","msg":"User not Authenticated"}');
	return "";
}

 $query = "SELECT u.`user_id`, COUNT(p.id) as posts_count ,token, `username`, `fname`, `lname`, `phone`, `email`, `full_name`, `disabled`, u.`points`, `profile_pic`, u.`created_date`, u.`updated_date` 
FROM `users` as u JOIN authentication_token as a ON a.user_id = u.user_id 
LEFT JOIN posts_data as p ON a.user_id = p.user_id
WHERE a.user_id = '".$user_id."'";
 $query = mysqli_query($conn, $query);

 if($query){
	echo('{"error":"false", "msg":'.json_encode(mysqli_fetch_assoc($query)).'}');
 }else {
 	echo('{"error"="true","msg":"Server Error"}');
 }

?>