<html lang="en" class="wf-fontawesome-n4-active wf-active"><head>
  
<style>
@charset "UTF-8";
@import 'https://fonts.googleapis.com/css?family=Open+Sans:300,400';
.player .timeline .controllers .back, .player .timeline .controllers .play, .player .timeline .controllers .forward, .player .timeline .controllers, .player .timeline .volume, .player .head .infos, .player .head .front, body {
  display: flex;
  justify-content: center;
  align-items: center;
}

html {
  height: 100%;
}

body {
  margin: 0;
  font-family: "Open Sans", sans-serif;
  width: 100%;
  min-height: 100%;
  background: linear-gradient(141deg, #0C5B5F 0%, rgba(0, 212, 153, 0.77) 75%);
}

*, *:before, *:after {
  box-sizing: border-box;
}

.player {
  /* border-radius: 6px; */
  background-color: white;
  width: 100%;
  height: 100px;
  box-shadow: 0px 5px 20px 2px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  display: flex;
}

.player .head {
  padding: 15px;
  color: white;
  text-shadow: 0px 0px 2px rgba(0, 0, 0, 0.3);
  height: auto;
  width: 30%;
  position: relative;
  overflow: hidden;
}
.player .head .front {
  position: relative;
  height: 100%;
  justify-content: space-around;
}
.player .head .back {
  height: 110%;
  width: 110%;
  top: -10px;
  left: -10px;
  position: absolute;
  background-position: center;
  background-size: cover;
  background-image: url("https://images.unsplash.com/photo-1471623817296-aa07ae5c9f47");
  -webkit-filter: blur(5px);
  filter: blur(5px);
}
.player .head .avatar {
  width: 70px;
  height: 70px;
  overflow: hidden;
  border-radius: 50%;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
}
.player .head .avatar img {
  width: 100%;
  height: 100%;
}
.player .head .infos {
  padding-left: 10px;
  justify-content: space-around;
  flex-direction: column;
  height: inherit;
  align-items: baseline;
}
.player .head .title_song {
  font-size: 16px;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.75);
}
.player .head .artist_song {
  font-size: 15px;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.75);
}
.player .head .duracao_song {
  font-size: 12px;
  color: white;
  margin-bottom: 8px;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.75);
}
.player .timeline {
  height: auto;
  width: 70%;
  position: relative;
  display: flex;
  justify-content: center;
  flex-direction: column;
}
.player .timeline .volume {
  flex-direction: row;
}
.player .timeline .controllers.active .play {
  box-shadow: 0px 0px 10px 2px rgba(30, 177, 150, 0.1);
  animation: 3s pulseshadowplay infinite both;
}
.player .timeline .controllers .back, .player .timeline .controllers .play, .player .timeline .controllers .forward {
  font-size: 16px;
  margin: 10px;
  color: #4A4A4A;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 1px solid transparent;
}
.player .timeline .controllers .play {
  transition: all 0.3s ease-in-out;
}
.player .timeline .controllers .play:hover {
  box-shadow: 0px 0px 10px 2px rgba(30, 177, 150, 0.38);
  border: 2px solid rgba(143, 208, 196, 0.54) !important;
}
.player .timeline .controllers #back {
  content: "";
  font-family: "FontAwesome";
  margin-right: 5px;
}
.player .timeline .controllers #play {
  content: "";
  font-family: "FontAwesome";
  margin-left: 5px;
}
.player .timeline .controllers #forward {
  content: "";
  font-family: "FontAwesome";
  margin-left: 5px;
}
.player .timeline .soundline {
  width: 100%;
  height: 6px;
  position: relative;
  background: #F3F3F3;
  border-radius: 2px;
  overflow: hidden;
}
.player .timeline #soundline_color {
  display: block;
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 0%;
  height: 100%;
  background: #6CE59C;
  box-shadow: 0px 0px 9px #94FFBF;
  transition: all 0.4s cubic-bezier(0.07, 0.82, 0.11, 1.02);
 /* animation: 20s soundline infinite both linear;*/
}

@keyframes pulseshadowplay {
  0% {
    box-shadow: 0px 0px 10px 2px rgba(30, 177, 150, 0.1);
  }
  50% {
    box-shadow: 0px 0px 50px 2px rgba(30, 177, 150, 0.38);
  }
}
@keyframes soundline {
  0% {
    width: 0%;
  }
  100% {
    width: 100%;
  }
}
@keyframes girandomt {
  0% {
    box-shadow: 0px 0px 0px 0px rgba(255, 255, 255, 0.8);
  }
  100% {
    box-shadow: 0px 0px 30px 40px rgba(255, 255, 255, 0);
  }
}
</style>

<link rel="stylesheet" href="https://use.fontawesome.com/b4a35c5382.css" media="all">

</head>

<body>
  <div class="player">
  <div class="head">
    <div class="back"></div>
    <div class="front">
      <div class="avatar">
	   </div>
      <div class="infos">
        <div class="title_song">Old School</div>
		<div class="artist_song">Prem Dhillon</div>
      </div>
    </div>
  </div>
  <div class="timeline">
    <div class="soundline">
	<div id="soundline_color"></div>
	</div>
    <div class="controllers active">
		<p class="currenttime">00:00</p>
		  <div class="back" id="back" onclick="prevTrack()">
		  <i class="fa fa-backward" aria-hidden="true"></i>
		  </div>
		  <div class="play" id="play" onclick="playpauseTrack()">
		  <i class="fa fa-play" aria-hidden="true"></i>
		  </div>
		  <div class="forward" id="forward" onclick="nextTrack()">
		  <i class="fa fa-forward" aria-hidden="true"></i>
		  </div>
		<p class="totalduration">02:19</p>
    </div>
  </div>
</div>
<script>

//var now_playing = document.querySelector(".now-playing");
var track_art = document.querySelector(".avatar");
var track_name = document.querySelector(".title_song");
var track_artist = document.querySelector(".artist_song");

var playpause_btn = document.querySelector("#play");
var next_btn = document.querySelector("#forward");
var prev_btn = document.querySelector("#back");

var seek_slider = document.querySelector('div#soundline_color')
//var volume_slider = document.querySelector(".volume_slider");

var total_duration = document.querySelector(".totalduration");
var current_time = document.querySelector(".currenttime");

var track_index = 0;
var isPlaying = false;
var updateTimer;

// Create new audio element
var curr_track = document.createElement('audio');

// Define the tracks that have to be played
var track_list = [
  {
    name: "Night Owl",
    artist: "Broke For Free",
    image: "https://images.pexels.com/photos/2264753/pexels-photo-2264753.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=250&w=250",
    path: "https://files.freemusicarchive.org/storage-freemusicarchive-org/music/WFMU/Broke_For_Free/Directionless_EP/Broke_For_Free_-_01_-_Night_Owl.mp3"
  },
  {
    name: "Enthusiast",
    artist: "Tours",
    image: "https://images.pexels.com/photos/3100835/pexels-photo-3100835.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=250&w=250",
    path: "https://files.freemusicarchive.org/storage-freemusicarchive-org/music/no_curator/Tours/Enthusiast/Tours_-_01_-_Enthusiast.mp3"
  },
  {
    name: "Shipping Lanes",
    artist: "Chad Crouch",
    image: "https://images.pexels.com/photos/1717969/pexels-photo-1717969.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=250&w=250",
    path: "https://files.freemusicarchive.org/storage-freemusicarchive-org/music/ccCommunity/Chad_Crouch/Arps/Chad_Crouch_-_Shipping_Lanes.mp3",
  },
];

function random_bg_color() {

  // Get a number between 64 to 256 (for getting lighter colors)
  var red = Math.floor(Math.random() * 256) + 64;
  var green = Math.floor(Math.random() * 256) + 64;
  var blue = Math.floor(Math.random() * 256) + 64;

  // Construct a color withe the given values
  var bgColor = "rgb(" + red + "," + green + "," + blue + ")";

  // Set the background to that color
  document.body.style.background = bgColor;
}

function loadTrack(track_index) {
  clearInterval(updateTimer);
  resetValues();
  curr_track.src = track_list[track_index].path;
  curr_track.load();

  track_art.style.backgroundImage = "url(" + track_list[track_index].image + ")";
  track_name.textContent = track_list[track_index].name;
  track_artist.textContent = track_list[track_index].artist;
 // now_playing.textContent = "PLAYING " + (track_index + 1) + " OF " + track_list.length;

  updateTimer = setInterval(seekUpdate, 1000);
  curr_track.addEventListener("ended", nextTrack);
  random_bg_color();
}

function resetValues() {
  current_time.textContent = "00:00";
  total_duration.textContent = "00:00";
  seek_slider.style.width = 0;
}

// Load the first track in the tracklist
loadTrack(track_index);

function playpauseTrack() {
  if (!isPlaying) playTrack();
  else pauseTrack();
}

function playTrack() {
  curr_track.play();
  isPlaying = true;
  playpause_btn.innerHTML = '<i class="fa fa-pause" aria-hidden="true"></i>';
}

function pauseTrack() {
  curr_track.pause();
  isPlaying = false;
  playpause_btn.innerHTML = '<i class="fa fa-play" aria-hidden="true"></i>';;
}

function nextTrack() {
  if (track_index < track_list.length - 1)
    track_index += 1;
  else track_index = 0;
  loadTrack(track_index);
  playTrack();
}

function prevTrack() {
  if (track_index > 0)
    track_index -= 1;
  else track_index = track_list.length;
  loadTrack(track_index);
  playTrack();
}

function seekTo() {
  var seekto = curr_track.duration * (seek_slider.style.width / 100);
  curr_track.currentTime = seekto+"%";
}

function setVolume() {
 // curr_track.volume = volume_slider.value / 100;
}

function seekUpdate() {
  var seekPosition = 0;

  if (!isNaN(curr_track.duration)) {
    seekPosition = curr_track.currentTime * (100 / curr_track.duration);

    seek_slider.style.width = seekPosition+"%";

    var currentMinutes = Math.floor(curr_track.currentTime / 60);
    var currentSeconds = Math.floor(curr_track.currentTime - currentMinutes * 60);
    var durationMinutes = Math.floor(curr_track.duration / 60);
    var durationSeconds = Math.floor(curr_track.duration - durationMinutes * 60);

    if (currentSeconds < 10) { currentSeconds = "0" + currentSeconds; }
    if (durationSeconds < 10) { durationSeconds = "0" + durationSeconds; }
    if (currentMinutes < 10) { currentMinutes = "0" + currentMinutes; }
    if (durationMinutes < 10) { durationMinutes = "0" + durationMinutes; }

    current_time.textContent = currentMinutes + ":" + currentSeconds;
    total_duration.textContent = durationMinutes + ":" + durationSeconds;
  }
}
</script>

</body></html>