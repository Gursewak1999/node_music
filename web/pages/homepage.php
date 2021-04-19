<head>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
</head>
<body>

<style>

body {
  background-color: #100e17;
  font-family: 'Open Sans', sans-serif;
}

.container {
	overflow: visible;
    /* position: absolute; */
    /* height: 300px; */
    margin-top: 2px;
    /* left: calc(50% - 300px); */
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}

.card {
  display: flex;
    height: 180px;
    width: 160px;
    margin: 10px;
    background-color: #17141d;
    border-radius: 10px;
    box-shadow: -1rem 0 3rem #000;
    /* margin-left: 20px; */
    transition: 0.4s ease-out;
    position: relative;
}

.card:not(:first-child) {
    margin-left: 20px;
}

.card:hover {
    transform: translateY(-12px);
    transition: 0.4s ease-out;
}


.title {
	overflow: hidden;
	border-radius: 0 0 10px 10px;
  color: white;
    font-weight: 300;
    position: absolute;
    padding: 10px;
    margin-bottom: 0px;
    left: 0px;
    right: 0px;
    bottom: -1px;
    height: 20%;
    background: linear-gradient(
0deg
, rgb(0 0 0) 0%, rgb(17 17 19) 60%, rgb(255 255 255 / 0%) 100%);
}

.bar {
  position: absolute;
  top: 0px;
  left: 0px;
  right: 0px;
  height: 100%;
  width: 100%;
}

.emptybar {
	border-radius: 10px 10px 0 0;
  background-color: #2e3033;
  width: 100%;
  height: 100%;
}

.filledbar {
	opacity: 0.6;
	border-radius: 10px;
  position: absolute;
  top: 0px;
  z-index: 3;
  width: 0px;
  height: 100%;
  background: rgb(0,154,217);
  background: linear-gradient(45deg, rgba(0,154,217,1) 0%, rgba(217,147,0,1) 60%, rgba(255,186,0,1) 100%);
  transition: 0.4s ease-out;
}

.card:hover .filledbar {
	opacity: 0.3;
	border-radius: 10px;
  width: 100%;
  transition: 0.2s ease-out;
}

.card:hover .play_btn:hover {
    opacity: 1;
    visibility: visible;
}

.cover{
	width:100%;
	height:100%;
	border-radius: 10px;
	outline: 0!important;
}
.play_svg{
	    left: 50%;
    position: absolute;
    top: 50%;
    transform: translate(-50%,-50%) scale(.7);
    width: 45px;
    height: 45px;
    transition: transform .2s ease,-webkit-transform .2s ease;
}
.play_btn{
	    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    bottom: 0;
    /* background-color: rgba(53,67,74,.8); */
    color: #ffffff;
    transition: all .2s ease;
    overflow: hidden;
    border-radius: 4px;
    opacity: 0;
}
h2{
	color:white;
}

h2 ::before {
	border-left: 6px solid #00458b;
	content:" H! ";
}

</style>
<?php
$json = file_get_contents('http://localhost/music_api/getHomeData.php');
$json = json_decode($json);
function addCard($page_url, $cover, $name, $artist){

	echo('<a href="'.$page_url.'">
	<div class="card">
			<div class="bar">
			  <div class="emptybar"><img class="cover" src="'.$cover.'" 
			  alt="Ronna '.$name.' song by '.$artist.'"></div>
			  <div class="filledbar">
			  <div class="play_btn">
<svg class="play_svg" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="#000000" d="M10,16.5V7.5L16,12M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg>
</div>
</div>
			</div>
			<h5 class="title">'.$name.'<br>'.$artist.'</h5>
			
		  </div></a>');
}

?>

<div>
<?php echo("<h2>Editor's Choice</h2>"); ?>
<div class="container">
  <?php 
	foreach($json->editors_choice as $song){
		addCard($song->url,
		$song->cover,
		$song->name,
		$song->artist);
	}
  ?>
</div>
</div>
<div>
<?php echo("<h2>New Releases</h2>"); ?>
<div class="container">
  <?php 
	foreach($json->new_release as $song){
		addCard($song->url,
		$song->cover,
		$song->name,
		$song->artist);
	}
  ?>
</div>
</div>
</body>