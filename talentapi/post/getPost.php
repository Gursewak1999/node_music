<?php

include_once("../helper/helper_functions.php");
include_once('../helper/connect.php');


if($method="POST")
	$method = $_POST;
else
	$method = $_GET;

$post_id = $method[Post::ID];

$query = "SELECT `id`,
`user_id`,
`title`,
`descrition`,
`tags`,
`mimetype`,
`content_url`,
`points`,
`feedbacks`,
`created_date`,
`updated_date` FROM `posts_data` WHERE id = '".$post_id."'";

$query = mysqli_query($conn, $query);

if($query){
	echo('{"error":"false","msg":"'.json_encode($mysqli_fetch_assoc($query)).'"}');
} else {
	echo('{"error":"true","msg":"Server Failure"}');
}


?>