<?php

include_once("../helper/helper_functions.php");
include_once('../helper/connect.php');


if($method="POST")
	$method = $_POST;
else
	$method = $_GET;

$post_id = $method[Comments::POST_ID];

functipn getComments($conn, $post_id){

	$query = "SELECT `comment_id`, `post_id`, `user_id`, `text`,
	`created_on`, `updated_on`, `sub_comments`, `tags` 
	FROM `comments` WHERE `post_id`='".$post_id."'";

	$query = mysqli_query($conn, $query);
	if($query){
		$comments = [];
		while($row = mysqli_fetch_assoc($query))
			array_push($comments, $row);

		return $comments;
	} else return "";
}

$comms = getComments($conn, $post_id);

//if sub_comments is empty return 
//go through each sub Comment untill


if(Count($comms)>0){
	echo('{"error":"false","msg":'.json_encode($comms).'}');
} else {
	echo('{"error":"true","msg":"Server Failure"}');
}


?>