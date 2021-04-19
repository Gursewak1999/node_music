<?php

include_once("../helper/helper_functions.php");
include_once('../helper/connect.php');


if($method="POST")
	$method = $_POST;
else
	$method = $_GET;

$user_id = $method[User::USER_ID];

$query = "SELECT p.`id`, u.`user_id`,
				u.`full_name`, u.`username`,
				p.`title`, p.`descrition`,
				p.`tags`, p.`mimetype`,
				p.`content_url`, p.`points`,
				p.`feedbacks`, p.`created_date`, p.`updated_date` 
FROM `posts_data` as p JOIN users as u ON p.user_id = u.user_id AND u.user_id = '".$user_id."'";

$query = mysqli_query($conn, $query);
$posts = [];

if($query){
	while($row = mysqli_fetch_assoc($query))
	array_push($posts,$row);
	echo('{"error":"false","msg":"'.json_encode($posts).'"}');
} else {
	echo('{"error":"true","msg":"Server Failure"}');
}

?>