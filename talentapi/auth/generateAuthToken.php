<?php

include_once('../helper/connect.php');
include_once('../helper/helper_functions.php');

$broadcast = true;

if($method="POST")
	$method = $_POST;
else
	$method = $_GET;

if($user_id==""){
	$user_id = $method[User::USER_ID];
}else $broadcast = false;


$token = generateRandomString();
$creation_date = getCurrentTimestamp();

$query = 'UPDATE `authentication_token` SET `token`="'.$token.'",`creation_date`="'.$creation_date.'" WHERE `'.User::USER_ID.'`="'.$user_id.'"';

$query = mysqli_query($conn, $query);

if($broadcast)
if($query){
	echo('{"error":"false","token":"'.$token.'"}');
}else 
	echo('{"error":"true","token":"'.mysqli_error($conn).'"}');

?>