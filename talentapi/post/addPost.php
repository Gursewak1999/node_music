<?php

include_once("../helper/helper_functions.php");
include_once('../helper/connect.php');


if($method="POST")
	$method = $_POST;
else
	$method = $_GET;

$post_id = "post_".generateRandomString(59);

$user_id = $method[Post::USER_ID];
$post_title = $method[Post::TITLE];
$post_description = $method[Post::DESCRIPTION];
$post_tags = $method[Post::TAGS];
$post_mimetype = $method[Post::MIMETYPE];
$post_content_url = $method[Post::CONTENT_URL];
$post_points = $method[Post::POINTS];
$post_feedbacks = $method[Post::FEEDBACKS];

$created_date = getCurrentTimestamp();
$updated_date = getCurrentTimestamp();

function checkPostId(){
	global $post_id,$conn,$POSTS_TABLE;
	$query = mysqli_query($conn, "SELECT count(`".Post::ID."`) FROM `$POSTS_TABLE` WHERE `".Post::ID."` = '".$post_id."' ");
	$row = mysqli_fetch_row($query);
	if ($row[0]>0) {

		//repeat
		$post_id = "post_".generateRandomString(59);
		checkPostId();
	}
}
checkPostId();

$query = "INSERT INTO `posts_data`(`".Post::ID."`,
						`".Post::USER_ID."`,
						`".Post::TITLE."`,
						`".Post::DESCRIPTION."`,
						`".Post::TAGS."`,
						`".Post::MIMETYPE."`,
						`".Post::CONTENT_URL."`,
						`".Post::POINTS."`,
						`".Post::FEEDBACKS."`,
						`".Post::CREATED_DATE."`,
						`".Post::UPDATED_DATE."`
						) VALUES (
						'".$post_id."',
						'".$user_id."',
						'".$post_title."',
						'".$post_description."',
						'".$post_tags."',
						'".$post_mimetype."',
						'".$post_content_url."',
						".$post_points.",
						'".$post_feedbacks."',
						'".$created_date."',
						'".$updated_date."'
						)";
//echo("<br>".$query."<br>");
$query = mysqli_query($conn, $query);

if($query){
	echo('{"error":"false","msg":"'.$post_id.'"}');
} else {
	echo('{"error":"true","msg":"Server Failure. - '.mysqli_error($conn).'"}');
}



?>