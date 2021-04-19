<?php

include_once('../helper/connect.php');
include_once('../helper/helper_functions.php');

if($method="POST")
	$method = $_POST;
else
	$method = $_GET;

$user_id = $method[User::USER_ID];
$token = $method[User::TOKEN];

if (isUserAuthenticated($conn, $user_id, $token)) {
	echo('{"error"="false","msg":"User Authenticated"}');
}else{
	echo('{"error"="true","msg":"User not Authenticated"}');
}


?>