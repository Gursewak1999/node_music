<?php

include_once("../helper/helper_functions.php");
include_once('../helper/connect.php');


if($method="POST")
	$method = $_POST;
else
	$method = $_GET;

$page = $method["page"];
$page = $page-1;
$limit = 30;
$offset = $page*$limit;

function addUserInfo($conn, $row){

	global $USER_TABLE;

	$q = "SELECT full_name, profile_pic, username FROM `".$USER_TABLE."` WHERE user_id = '".$row['user_id']."'";
	$q = mysqli_query($conn, $q);
	if ($q){
		$r = mysqli_fetch_assoc($q);
		$row['full_name'] = $r['full_name'];
		$row['profile_pic'] = $r['profile_pic'];
		$row['username'] = $r['username'];
	}else echo(mysqli_error($conn));
	
	return $row;
}

$query = "SELECT `id`, `user_id`, `title`, `description`, `tags`, `mimetype`, `content_url`,
`points`, `feedbacks`, `created_date`, `updated_date` FROM `posts_data`
WHERE 1 ORDER BY points ASC, created_date DESC LIMIT ".$offset.", ".$limit."";
//secho($query);
$query = mysqli_query($conn, $query);
$posts = [];

if($query){
	while($row = mysqli_fetch_assoc($query))
	{	
		$row = addUserInfo($conn, $row);
		array_push($posts,$row);
	}

	echo('{"error":"false","msg":'.json_encode($posts).'}');
} else {
	echo('{"error":"true","msg":"Server Failure"}');
}



?>