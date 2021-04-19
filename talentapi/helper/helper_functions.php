<?php
	//error_reporting(0);
	include_once("constants.php");

	$method = "POST";

	function contains($str, $sub){
		if (strpos($str, $sub) !== false) {
			return true;
		}else return false;
	}
	
	function notExists($method, $str){
		
		if(!isset($method[$str]) || $method[$str]!="")
		return true;
		
		return false;
	}
	
	function getCurrentTimestamp(){
		return time();
	}

	function generateRandomString($length = 64) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function generateRandomNumbers($length = 64) {
		$characters = '0123456789';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}


function isUserAuthenticated($conn, $user_id, $token){

	$query = "SELECT COUNT(*) FROM `authentication_token` WHERE `user_id`='".$user_id."' AND `token`='".$token."'";

	$query = mysqli_query($conn, $query);

	if($query){
		$row = mysqli_fetch_row($query);
		if($row[0]==1){
			//user authenticated
			return true;
			
		}else {
	
			return false;
			
		}
	}
	return false;
}
?>