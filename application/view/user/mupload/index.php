<?php
 // error_reporting(0);
 include("../../../../config.php");
 $call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();
$customer=$call_config->get("SELECT * FROM `tbl_user_master` WHERE `id`='".$user_sess_data['sess_user_id']."'");
$subsc=$call_config->get("SELECT * FROM `tbl_subscription_plans_master` WHERE `id`='".$customer['subscription']."'");
// include('../../../../public/user/v1_HeadPart.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right:  0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}



.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.audiooverlay {
  height: 0%;
  width: 100%;
  position: fixed;
  z-index: 1;
  bottom: 0;
  left: 0;
  background-color: #ffffff;
  overflow-y: hidden;
  transition: 0.5s;
}

.audiooverlay-content {
  position: relative;
  top: 0%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}



.audiooverlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .audiooverlay {overflow-y: auto;}
  .audiooverlay a {font-size: 20px}
  .audiooverlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}



.filteroverlay {
  height: 0%;
  width: 100%;
  position: fixed;
  z-index: 1;
  bottom:0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-y: hidden;
  transition: 0.5s;
}

.filteroverlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}


.filteroverlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .filteroverlay {overflow-y: auto;}
  .filteroverlay a {font-size: 20px}
  .filteroverlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" style="position: absolute;" class="closebtn" onclick="closeNav()">&times;</a>
  <video controls="" style="top: 0;left: 0;"  autoplay="" id="show_video"></video>
</div>

<div id="main">
<!-- for audio div -->
<div id="myNav" class="audiooverlay">
  <a href="javascript:void(0)" style="font-size: 20px;top: 0;" class="closebtn" onclick="closeNavaudio()">&times;</a>
  <div class="audiooverlay-content">
     <div class="container">
    <div id="accordion" style="max-height: 300px;overflow-y: auto;">
<?php
$getaudio=$call_config->get_all("SELECT * FROM `tbl_audio_master`");
foreach ($getaudio as $aud) {
  ?>
<div class="card collapsed" data-toggle="collapse" data-target="#collapse<?= $aud['id'] ?>" aria-expanded="false" aria-controls="collapse<?= $aud['id'] ?>">
            <div class="card-header" id="headingOne">
 <img src="a.jpg" alt="" style="height: 20px;width: 20px;" class="rounded-circle mt-3" id="musicimg<?= $aud['id'] ?>"><h6 class="mb-0 d-inline"> <i class="glyphicon glyphicon-music"></i>&nbsp;&nbsp;<?= $aud['title'] ?></h6>  
<a href="#paused" style="margin-left: 10%;" onclick="soundplay('<?= $call_config->base_url()."audio/".$aud['afile'] ?>',<?= $aud['id'] ?>,this)"  class="btn btn-primary btn-sm my-2"><span class="fa fa-play"></span></a>
<a href="#" onclick="$('#corpaudiodiv').slideDown()" class="btn btn-sm btn-primary my-2 ml-2"><span class="fa fa-scissors" style="-webkit-transform: rotate(-90deg);"></span></a>
            </div>
            <div id="collapse<?= $aud['id'] ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <center><input type="button" name="" class="btn btn-sm btn-primary btn-block" name="Use Track" value="Use track" onclick="usetrack('sound','limited_sound')"></center>
                </div>
            </div>
        </div>
  <?php
}
?>
    </div>
    <div id="corpaudiodiv" style="display: none;">
<br>
  <audio name="sound" src="" controlsList="nodownload" id="sound"></audio>
  <input class="btn btn-primary btn-sm" type="button" name="start_time" value="Start Time" onclick="startbtn('sound','select_start_time','limited_sound')"> → 
<label name="select_start_time"></label> 
<input class="btn btn-primary btn-sm" type="button" name="end_time" value="End Time" onclick="endbtn('sound','select_end_time','limited_sound')"> → 
<label name="select_end_time"></label>
<input type="button btn btn-sm" name="limited_sound" id="limited_sound" data-start_time="" data-end_time="" style="display: none;">
<br>
</div>
</div>
  </div>
</div>
<!-- for filter -->
<div id="filterNav" class="filteroverlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNavfilter()">&times;</a>
  <div class="filteroverlay-content">
    <a href="#">filter part will be here</a>
  </div>
</div>
<!-- code for video content -->
<canvas style="width: 100vw;height: 100%;position: absolute;top: 0;left: 0;"  id="canvas"></canvas>


<!-- icons code starts -->
<span class="fa fa-paint-brush fa-2x" style="position: absolute;top: 88%;" onclick="openNavfilter()"></span>
<span style="position: absolute;top: 50%;right: 10%;" onclick="openNavaudio()"  class="fa fa-music fa-2x"></span>
<p id="btnChangeCamera" style="position: absolute;top: 40%;right: 10%;">
<span class="fa fa-refresh fa-2x"></span>
<span class="fa fa-camera" style="position: absolute;top: 34%;font-size: 7px;left: 32%;"></span>
</p>
<span style="position: absolute;top:86%;left: 42%;color: #ffffff;background-color: #ffd700;padding: 10px;border-radius: 50%;border: 1px solid black;" class="fa fa-camera fa-2x" onclick="recordermaster(this)" id="camerabtn"></span>
  <span style="cursor:pointer;position: absolute;top: 88%;left: 80%;display: none;" id="nextpage" class="fa fa-arrow-circle-right fa-2x" onclick="openNav()"></span>
</div>
<video muted="" style="width: 0px;width: 0px;" autoplay id="video"></video>
  <audio src="" id="recordedAudio"></audio>
<script>
 var lastplayed="";
  var usingaudio=false;
  var media;
var song;
    var filters='';
  // get page elements
  let recordedAudio=document.querySelector("#recordedAudio");
  let video = document.querySelector("#video");
  const btnPlay = document.querySelector("#btnPlay");
  const btnPause = document.querySelector("#btnPause");
  const btnChangeCamera = document.querySelector("#btnChangeCamera");
  const canvas = document.querySelector("#canvas");
  const devicesSelect = document.querySelector("#devicesSelect");
  var canvasStream = canvas.captureStream(30);
  var audioStream;
  var chunks = [];
    // use front face camera
  let useFrontCamera = true;
  var isrecording=false;
  var isrecordingstarted=false;
  // var audioStream;
  // current video stream
  let videoStream;
  var constraints = {
    video: {
      width: {
        min: 1280,
        ideal: 1920,
        max: 2560,
      },
      height: {
        min: 720,
        ideal: 1080,
        max: 1440,
      },
      facingMode:"user",
    },
    audio:true,
  };
  // initialize
  async function initializeCamera() {
    stopVideoStream();
        constraints.video.facingMode = useFrontCamera ? "user" : "environment";
    try {
      videoStream = await navigator.mediaDevices.getUserMedia(constraints);
      video.srcObject = videoStream;
    } catch (err) {
      alert("Could not access the camera");
    }
  }
btnChangeCamera.addEventListener("click", function () {
    useFrontCamera = !useFrontCamera;

    initializeCamera();
  });

  initializeCamera();
  renderFrame();
  var audioStream = recordedAudio.captureStream(30);
  // stop video stream
  function stopVideoStream() {
    if (videoStream) {
      videoStream.getTracks().forEach((track) => {
        track.stop();
      });
    }
  }
   function renderFrame() {
  // re-register callback
  requestAnimationFrame(renderFrame);
  // set internal canvas size to match HTML element size
  canvas.width = canvas.scrollWidth;
  canvas.height = canvas.scrollHeight;
  if (video.readyState === video.HAVE_ENOUGH_DATA) {
    // scale and horizontally center the camera image
    var videoSize = { width: video.videoWidth, height: video.videoHeight };
    var canvasSize = { width: canvas.width, height: canvas.height };
    var renderSize = calculateSize(videoSize, canvasSize);
    var xOffset = (canvasSize.width - renderSize.width) / 2;
    var context = canvas.getContext('2d');
context.filter = filters;
 //var image=new Image();

   // image.src="image.JPG";
    context.drawImage(video, xOffset, 0, renderSize.width, renderSize.height);
    //context.drawImage(image,220, 90, 50, 50);
  }
}
function calculateSize(srcSize, dstSize) {
    var srcRatio = srcSize.width / srcSize.height;
    var dstRatio = dstSize.width / dstSize.height;
    if (dstRatio > srcRatio) {
      return {
        width:  dstSize.height * srcRatio,
        height: dstSize.height
      };
    } else {
      return {
        width:  dstSize.width,
        height: dstSize.width / srcRatio
      };
    }
  } 
  function recordermaster(e)
{
  console.log("record master called");
if (isrecording) 
{
 $(e).attr("class","fa fa-play"); 
 $(e).attr("style","position: absolute;top:86%;left: 42%;color: #ffffff;background-color: #ffd700;padding: 19px;border-radius: 50%;border: 1px solid black;");
 mediaRecorder.pause();
 isrecording=false;
}
else
{
  isrecording=true;
 $(e).attr("class","fa fa-pause");
$(e).attr("style","position: absolute;top:86%;left: 42%;color: #ffffff;background-color: #ffd700;padding: 19px;border-radius: 50%;border: 1px solid black;");
if (!isrecordingstarted) 
{
if(usingaudio)
{
  console.log("Recording started usingaudio.");
recordedAudio.play();
handlerFunction(audioStream,canvasStream);
}
else
{
  console.log("Recording started without usingaudio");
     navigator.mediaDevices.getUserMedia({audio:true})
      .then(stream => {handlerFunction(stream,canvasStream)});
}
isrecordingstarted=true;
}
else
{
  mediaRecorder.resume();
}
}
}
function openNav() {
  mediaRecorder.stop();
}

function closeNav() {
if (confirm("The media will be discarded are you sure?")) {
  location.reload();
}
  // document.getElementById("mySidenav").style.width = "0";
  // document.getElementById("main").style.width= "100%";
  //   document.getElementById("main").style.display = "";
  // document.body.style.backgroundColor = "white";
}
function openNavaudio() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNavaudio() {
  document.getElementById("myNav").style.height = "0%";
}
function openNavfilter() {
  document.getElementById("filterNav").style.height = "30%";
}

function closeNavfilter() {
  document.getElementById("filterNav").style.height = "0%";
}
function handlerFunction(stream,canvasStream) {
  let combined = new MediaStream([...canvasStream.getTracks(), ...stream.getTracks()]);
            mediaRecorder = new MediaRecorder(combined);
mediaRecorder.start();
i=0;
$("#nextpage").show();
setInterval(function(){ 
  if(mediaRecorder.state === "recording") {
      i++;
      // recording paused
    } else if(mediaRecorder.state === "paused") {
    //  mediaRecorder.resume();
      // resume recording
    }
if (i>10) 
{
  console.log("Recorded for 10 seconds");
mediaRecorder.stop();
if(recordedAudio.src !== null){
recordedAudio.pause();
recordedAudio.load();
}
i=0;
}
 }, 1000);
mediaRecorder.ondataavailable = function(e) {
  chunks.push(e.data);
};
mediaRecorder.onstop = function(e) {
  var vblob = new Blob(chunks, { 'type' : 'video/mp4' });
  chunks = [];
  var videoURL = URL.createObjectURL(vblob);
  show_video.src = videoURL;
    console.log("Video Redording stopped");
      document.getElementById("mySidenav").style.width = "100%";
  document.getElementById("main").style.width = "0";
  document.getElementById("main").style.display = "none";
  document.body.style.backgroundColor = "rgba(0,0,0,0.1)";
};
mediaRecorder.ondataavailable = function(e) {
  chunks.push(e.data);
};
mediaRecorder.onpause = function(e) { 
mediaRecorder.pause();
if(recordedAudio.src !== null){
recordedAudio.pause();
}
console.log("paused");
 };
 mediaRecorder.onresume=function(e)
 {
  mediaRecorder.resume();
  if(recordedAudio.src !== null){
  recordedAudio.play();
}
  console.log("resumed");
 }
          }
function soundplay(src,id,ele) {
if($(ele).attr('href')=="#paused")
{
    $('#sound').attr('src',src);
    $('#sound')[0].play();
    $('#limited_sound').attr('data-start_time','');
        $('#limited_sound').attr('data-end_time','');
        $('[name=select_start_time]').text('');
        $('[name=select_end_time]').text('');
        $(lastplayed).attr("class","rounded-circle mt-3");
        $('#musicimg'+id).attr('class','rounded-circle mt-3 fa-spin');
        lastplayed="#musicimg"+id;
  $(ele).html("<span class='fa fa-pause'></span>");
  $(ele).attr("href","#playing");
}
else
{
$("#sound")[0].pause();
$(ele).html("<span class='fa fa-play'></span>");
$(ele).attr("href","#paused");
$('#musicimg'+id).attr('class','rounded-circle mt-3');
}
}
function startbtn(track,label,trim){
  var gettrack = '[name='+ track + ']';
  var gettrim = '[name='+ trim +']';
  var getlabel = '[name='+ label +']';
  var cur_time = $(gettrack).get(0).currentTime;
  $(gettrim).attr('data-start_time', cur_time);
  $(getlabel).text((cur_time/100).toFixed(2));
}
function endbtn(track,label,trim){
  var gettrack = '[name='+ track + ']';
  var gettrim = '[name='+ trim +']';
  var getlabel = '[name='+ label +']';
  var cur_time = $(gettrack).get(0).currentTime.toFixed(2);
  $(gettrim).attr('data-end_time', cur_time);
  $(getlabel).text((cur_time/100).toFixed(2));
}
function usetrack(track,name){
  blsrc();
  var gettrack = '[name='+ track + ']';
  var usetrack = '[name='+ name + ']';
  var starttime = $(usetrack).attr('data-start_time');
        var endtime = $(usetrack).attr('data-end_time');
        var $audio = $('#recordedAudio');
        var audio_src = $($audio).attr('src');
        var splt_audio_src = audio_src.split('#');
        // Playback time setting
        var realsrc = $(gettrack).attr('src');
        $($audio).prop('src', realsrc + splt_audio_src[0]+'#t='+starttime+','+endtime);
        media = $audio.get(0);
        $('#sound').attr('src','');
        usingaudio=true;
        closeNavaudio();
}
function recordplay(){
  media.load();
  media.play();
}
function blsrc(){
$('#recordedAudio').attr('src','');
}
function soundpause(track){
  var sound = $('[name='+ track + ']');
   song = sound[0];
  song.pause();
  song.currentTime = 0;
}
</script>
   
</body>
</html>