<?php

include_once("../helper/helper_functions.php");
include_once('../helper/connect.php');


if($method="POST")
	$method = $_POST;
else
	$method = $_GET;

$username = $method[USER::USERNAME];
$old_password = $method["old_password"];
$new_password = $method["new_password"];

$query = "UPDATE `users` SET `password`='".$new_password."' WHERE `username`='".$username."' AND `password`='".$old_password."'";
$query = mysqli_query($conn, $query);

if($query){
	echo('{"error":"false","msg":"Password Changed"}');
} else {
	echo('{"error":"true","msg":"Server Failure"}');
}

?>