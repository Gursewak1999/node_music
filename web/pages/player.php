<?php 
$name=urlencode("Khichi Rakh");
$cover=htmlentities("https://art.djyoungster.in/img/250x250/71420.jpg");
$page=htmlentities("https://djyoungster.org/music/khichi-rakh-harf-cheema-v71420.html");

$json = file_get_contents('http://localhost/music_api/getSongDetails.php?name='.$name.'&cover='.$cover.'&page='.$page);
$json = json_decode($json);
//var_dump($json);
$song_name = $json->name;
$song_cover = $json->cover;

$song_details = $json->details;
$song_artist = $song_details[0]->SINGERS;
$song_lyricist = $song_details[1]->LYRICIST;
$song_composer = $song_details[2]->COMPOSER;

$download_links = $json->download_links;
$download_48 = $download_links[0]->d48;
$download_128 = $download_links[1]->d128;
$download_192 = $download_links[2]->d192;
$download_320 = $download_links[3]->d320;

?>
<style>
body{
	margin:0;
}
.top{
	display: flex;
	background-color:black;
	height: 60%;
	border-radius:0 0 16px 16px
}
.right{
	left:0px;
	height:100%;
	width:50%
}
.left{
	right:0px;
	height:100%;
	width:50%
}
.card{
	display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: auto;
  margin-bottom: auto;
  
	border-radius:10px;
	margin:20px
}
</style>

<body>

<div class="top">
	<div class="right">
		<img class="card" height="200px" width="180px" src="https://djyoungster.org/music/thumb/71847.webp"/>
	</div>
	<div class="left"></div>
</div>
<div class="bottom">
</div>

</body>