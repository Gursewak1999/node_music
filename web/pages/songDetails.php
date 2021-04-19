<?php 
$name=urlencode("Khichi Rakh");
$cover=htmlentities("https://art.djyoungster.in/img/250x250/71420.jpg");
$page=htmlentities("https://djyoungster.org/music/khichi-rakh-harf-cheema-v71420.html");

$json = file_get_contents('http://localhost/music_api/getSongDetails.php?name='.$name.'&cover='.$cover.'&page='.$page);
$json = json_decode($json);

var_dump($json);
?>
<body>

</body>