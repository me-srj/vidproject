  <?php
   // error_reporting(0);
   include("../../../../config.php");
   $call_config->user_sess_checker();
  $user_sess_data=$call_config->user_sess_data_bind();
  $customer=$call_config->get("SELECT * FROM `tbl_user_master` WHERE `id`='".$user_sess_data['sess_user_id']."'");
   include('../../../../public/user/v1_HeadPart.php');
  // include('../../../../public/user/v2_TopNavBar.php');
   ?>
   <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>8 IN Play</title>
  <script type="text/javascript" src="fullpage.js"></script>
<script type="text/javascript" src="examples.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="fullpage.css" />
  <link rel="stylesheet" type="text/css" href="examples.css" />
  <link href="<?php echo $call_config->base_url() ?>app-assets/user/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <style>

  /* Style for our header texts
  * --------------------------------------- */
  h1{
    font-size: 5em;
    font-family: arial,helvetica;
    color: #fff;
    margin:0;
    padding:0;
  }

  /* Centered texts in each section
  * --------------------------------------- */
  .section{
    text-align:center;
    overflow: hidden;
  }

  #myVideo{
    /*position: absolute;*/
    right: 0;
    /*bottom: 0;*/
    /*top:0;*/
    left:0;
    width: 100%;
    height: auto;
    text-align: center;
    /*background-size: 100% 100%;*/
    background-color: transparent; /* in case the video doesn't fit the whole page*/
      background-image: /* our video */;
      background-position: center center;
      background-size: contain;
      object-fit: cover; /*cover video background */
      z-index:3;
  }


  /* Layer with position absolute in order to have it over the video
  * --------------------------------------- */
   .layer{
    position: absolute;
    z-index: 4;
    width: 100%;
    left: 0;
    top: 43%;

    /*
    * Preventing flicker on some browsers
    * See http://stackoverflow.com/a/36671466/1081396  or issue #183
    */
    -webkit-transform: translate3d(0,0,0);
    -ms-transform: translate3d(0,0,0);
    transform: translate3d(0,0,0);
  }

  /*solves problem with overflowing video in Mac with Chrome */
  #section0{
    overflow: hidden;
  }

  /* Bottom menu
  * --------------------------------------- */
  #infoMenu li a {
    color: #fff;
  }

  /* Hiding video controls
  * See: https://css-tricks.com/custom-controls-in-html5-video-full-screen/
  * --------------------------------------- */
  video::-webkit-media-controls {
    display:none !important;
  }
.user_details_div{
    position: absolute;
    z-index: 4;

    width: 100%;
    left:1%;
    top:60%;
    text-align:left;

    /*
    * Preventing flicker on some browsers
    * See http://stackoverflow.com/a/36671466/1081396  or issue #183
    */
    -webkit-transform: translate3d(0,0,0);
    -ms-transform: translate3d(0,0,0);
    transform: translate3d(0,0,0);
  }
  .user_details_div ul li{
     font-size:12px;
  }
#user_img{
width: 30px;border-radius: 50%;height: 30px;border: 2.5px solid whitesmoke;
}
ul{
  list-style-type: none;
}
#heart_icon
{
margin-left: 0vw;
}
body{
    background:#000;
}
/* The snackbar - position it at the bottom and in the middle of the screen */
#snackbar {
  visibility: hidden; /* Hidden by default. Visible on click */
  min-width: 250px; /* Set a default minimum width */
  margin-left: -125px; /* Divide value of min-width by 2 */
  /*background-color: #333; /* Black background color */
  color: #fff; /* White text color */
  text-align: center; /* Centered text */
  border-radius: 2px; /* Rounded borders */
  padding: 16px; /* Padding */
  position: fixed; /* Sit on top of the screen */
  z-index: 1; /* Add a z-index if needed */
  left: 50%; /* Center the snackbar */
  bottom: 70px; /* 30px from the bottom */
  border-radius: 30px;
  background-image: linear-gradient(to right, rgb(61 188 247 / 75%), rgb(8 36 59 / 68%));
}

/* Show the snackbar when clicking on a button (class added with JavaScript) */
#snackbar.show {
  visibility: visible; /* Show the snackbar */
  /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
  However, delay the fade out process for 2.5 seconds */
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

/* Animations to fade the snackbar in and out */
@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
  </style>

  <!--[if IE]>
    <script type="text/javascript">
       var console = { log: function() {} };
    </script>
  <![endif]-->
</head>
<body>
  <i data-toggle="modal" data-target="#search_modal" href="#" style="color: white;position: absolute;margin-left: 10%;top: 5%;z-index: 1" class="fa fa-2x fa-search"></i>
<?php
$v=$call_config->dash_videos();
?>
<div class="mobile-menu">
         <ul class="bottom-navbar-nav">
            <li class="bottom-nav-item active">
               <a href="<?= $call_config->base_url() ?>application/view/user/dashboard/" class="bottom-nav-link">
               <i class="fas fa-fw fa-home"></i>
               <span>Home</span>
               </a>
            </li>
            <li class="bottom-nav-item">
               <a href="#" onclick="alert('Coming soon...')" class="bottom-nav-link">
               <i class="fas fa-fw fa-users"></i>
               <span>Memes</span>
               </a>
            </li>
            <li class="bottom-nav-item">
               <a href="<?= $call_config->base_url() ?>application/view/user/contest/" class="bottom-nav-link">
               <i class="fas fa-fw fa-user-alt"></i>
               <span>Contest</span>
               </a>
            </li>
            <li class="bottom-nav-item">
               <a href="<?= $call_config->base_url() ?>application/view/user/my_subscription/" class="bottom-nav-link">
               <i class="fas fa-fw fa-video"></i>
               <span>Premium</span>
               </a>
            </li>
            <li class="bottom-nav-item">
               <a href="<?= $call_config->base_url() ?>application/view/user/my_account/" class="bottom-nav-link">
               <i class="fas fa-fw fa-cloud-upload-alt"></i>
               <span>More</span>
               </a>
            </li>
         </ul>
      </div>
<div id="fullpage">
<?php
foreach ($v as $key => $video) 
{
  $category=$call_config->get("SELECT sub_category from tbl_scategory_master WHERE id='".$video['cat_id']."'");
$culike=$call_config->get("SELECT * from tbl_choice_master WHERE `uid`='".$user_sess_data['sess_user_id']."' AND `vid`='".$video['id']."'");
$likes=$call_config->get("SELECT COUNT(*) as total from tbl_choice_master WHERE `vid`='".$video['id']."'");
$user=$call_config->get("SELECT * FROM tbl_user_master WHERE id='".$video['uid']."'");
$check_subscriber=$call_config->get("select * from tbl_user_follow_master where uid='".$user_sess_data['sess_user_id']."' and fuid ='".$user['id']."'");
$comment=$call_config->get("SELECT COUNT(*) as total FROM tbl_comment_master WHERE `vid`='".$video['id']."'");
if ($culike['id']==null||$culike['id']=="") {
  $vliked=false;
}
else
{
  $vliked=true;
}
?>
<div class="section " id="section<?= $video['id'] ?>">
    <video onended="add_impression(<?= $video['id'] ?>,'normal')" id="myVideo" class="video" data-autoplay>
      <source src="<?= $call_config->base_url() ?>videos/<?= $video['file'] ?>" type="video/mp4">
    </video>
    <div class="layer" id="layer">
      <img src="play.png" class="rounded-circle" alt="Cinque Terre" width="100" height="100" >
    </div>
    <div  class="user_details_div row container">
<div class="col-md-12">
<label style="font-size: 15px;"><a id="user_link" href="<?= $call_config->base_url() ?>application/view/user/userchannel/?id=<?= base64_encode($user['id']) ?>"><img id="user_img" class="img" src="<?= $call_config->base_url() ?>app-assets/user/user_image/<?= $user['photo'] ?>">&nbsp;<strong style="color: white;"><?= $user['username'] ?></strong></a>
  <?php 
        if($check_subscriber['id']==null||$check_subscriber['id']=="")
{
  ?>
<i style="color: #8870efdb;" id="subsbtn" onclick="subscribe(this,<?=$user['id'];?>,'subscribe')" class="badge btn badge-warning subsbtn<?= $user['id'] ?>">Follow</i>
<?php
}
else
{
    ?>
<i style="color: red;" id="subsbtn" onclick="subscribe(this,<?=$user['id'];?>,'subscribed')" class="badge btn badge-warning subsbtn<?= $user['id'] ?>">Following</i>
    <?php    
}
?>
</label>
<div style="padding: 0;font-size: 12px;margin-left: 4%;"><strong><a href="<?= $call_config->base_url() ?>application/view/user/vedio_page/?id=<?= base64_encode($video['id']) ?>"> <?= $video['name'] ?></a></strong></div>
<label style="margin-left: 3%;color: white;">
  <?= $video['hashtag'] ?>
<i class="badge badge-success"><?= $category['sub_category'] ?></i>  
</label>
</div>
  <ul class="float-right" style="position: sticky;margin-left:70vw;margin-top:-50vh;">
    <li id="heart_icon">
<?php
if ($vliked) 
{
?>
<i id="choicebtn" onclick="choice(this)" value="liked" name="<?= $video['id'] ?>" style="color: red;" class="fas fa-3x fa-heart"></i>
<?php
}
else
{
  ?>
<i id="choicebtn" onclick="choice(this)" value="like" name="<?= $video['id'] ?>" style="color: whitesmoke;" class="fas fa-3x fa-heart"></i>
  <?php
}
?>
    </li>
    <li style="margin-left: 0vw;font-size: 12px;color:whitesmoke;" id="likes_count<?= $video['id'] ?>"><?= $call_config->get_subs($likes['total']) ?> Likes</li>
     <li><i style="color: whitesmoke;" onclick="send_id(<?= $video['id'] ?>)" data-toggle="modal" data-target="#exampleModal" class="pt-2 fa-3x fa fa-comment-dots"></i></li>
<li style="margin-left: 4vw;font-size: 10px;color:whitesmoke;"><?= $call_config->get_subs($comment['total']) ?></li>    
<li style="margin-left: 0vw;color: whitesmoke;"><i class="fas fa-3x fa-share"></i></li>    
  </ul>
</div>
  </div>
  

 <?php
}
?>
 <script type="text/javascript">
  function send_id(id) {
  $("#video_id").val(id);
  }
  function show_snack(message) {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");
  x.innerHTML=message;
  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
                                 function subscribe(element,$uid,type)
                                      
                                 {
                                  ele=$(".subsbtn"+$uid+"");
                                     if(type=='subscribe')
                                     {
                                       var fuid=$uid;
                                    // alert(fuid);
                                     var choice='subscribe';
                                       $.ajax({
                                      url:'<?php echo $call_config->base_url().'application/modal/user/utility/subscribe.php'?>',
                                      type:'POST',
                                      data:{fuid:fuid,choice:choice},
                                     
                                      success:function(data){
                                         // alert(data);
                            
                                      var res=JSON.parse(data);
                                       if (res['status']==true) 
                                       {
ele.attr("style","color:red;");
ele.attr("onclick","subscribe(this,"+fuid+",'subscribed')");
ele.html("Following");
                                       }    
                                    //   else
                                    //   {
                                    //   alert(res['message']);
                                      
                                    //   }
                                          
                                      }
                                      });   
                                     }
                                     else
                                     {
                                var fuid=$uid;
                                  var choice='unsubscribe';
                                 
                                  $.ajax({
                                      url:'<?php echo $call_config->base_url().'application/modal/user/utility/subscribe.php'?>',
                                      type:'POST',
                                      data:{fuid:fuid,choice:choice},
                                     
                                      success:function(data){
                                      var res=JSON.parse(data);
                                      if (res['status']==true) 
                                       {
ele.attr("style","color:#fff;");
ele.attr("onclick","subscribe(this,"+fuid+",'subscribe')");
ele.html("Follow");
                                       }    
                                    //   else
                                    //   {
                                    //   alert(res['message']);
                                    //   }
                                    }
                                      });
                                     }
                                 }
function post() {
  id=$("#video_id").val();
  message=$("#commentinput").val();
  if (message.length>0) 
  {
  $.ajax({
                     url:'<?php echo $call_config->base_url().'application/modal/user/utility/comment.php'?>',
                     type:'POST',
                     data:{vid:id,ch:"devote",comment:message},
                     success:function(data){
                      $("#video_id").val("");
                      $("#commentinput").val("");
                       show_snack("Commented.."); 
                      $("#exampleModal").modal('hide');  
                      $('body').removeClass('modal-open');
                      $('.modal-backdrop').remove();
                     }
                  });
  }
  else
  {
show_snack("Empty Comment!!");
$("#commentinput").focus();
  }
}
                               </script>
<div class="section" id="section13">
  <button onclick="location.reload()" style="height: 120px;width: 300px;border-radius: 100px;border: 2px solid #17a2b8;" class="btn btn-lg btn-outline-info">
    Load new videos!!
  </button>
  </div>
</div>
<div style="display: none;height: 100vh;" class="container-fluid" id="adds_div">
  <div class="row">
<video autoplay="" style="width: 100%;height: 100vh;" muted="" onclick="this.play()" id="ads_div_video" class="video" data-autoplay>
    </video>
<div id="ads_user_details" class="user_details_div row container">

</div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade p-3" style="top: 60%;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div style="padding: 0;background-color: transparent;" class="modal-content">
      <div style="padding: 0;background-color: transparent;" class="modal-body">
<div class="row">
<input type="hidden" id="video_id" name="">
<div class="input-group mb-3">
  <input type="text" id="commentinput" class="form-control bg-dark" placeholder="Enter your Comment..." aria-label="Enter your comment..." aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="btn-outline-info btn" style="border: 1px solid #17a2b8;color: #17a2b8;border-radius: 20%;" onclick="post()" id="basic-addon2"><i class="fas fa-comment-dots"></i></span>
  </div>
</div>
</div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="search_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: transparent;">
      <div class="modal-body">
        <!-- Navbar Search -->
         <form action="<?= $call_config->base_url() ?>application/view/user/search_video/" method="POST" class="form-inline row">
            <div class="input-group col-md-12">
               <input type="text" class="form-control" name="search" placeholder="Search for video...">
               <div class="input-group-append">
                  <button class="btn btn-outline-info" type="submit">
                  <i class="fas fa-search"></i> 
                  </button>
               </div>
            </div>
         </form>
      </div>
    </div>
  </div>
</div>
<div id="snackbar">Some text some message..</div>
<script type="text/javascript">
      var myFullpage = new fullpage('#fullpage', {
        verticalCentered: true,
        sectionsColor: ['#000','#000','#000','#000','#000','#000','#000','#000','#000','#000','#000','#000',]
    });
        function show_ads()
  {
    $("#adds_div").fadeIn();
    $("#fullpage").fadeOut();
    console.log("inside hidden the main div show_ads");
   $.ajax({
    url:'<?php echo $call_config->base_url().'application/modal/user/video/home.php' ?>',
    type:'POST',
    data:{choice:"getads"},
    success:function(data){
     // alert(data);
    res=JSON.parse(data);
      $("#ads_div_video").attr("src","<?= $call_config->base_url() ?>"+"videos/"+res['file']);
      $("#ads_user_details").html(res['user_div']);
      $("#ads_div_video").attr("onended","ads_ended("+res['v_id']+",'ads')");
      myvid.play();
      myvid.muted=!myvid.muted;
      console.log("ads showing div updated.");
    },error:function()
    {
      alert("failed to get data");
    }
  });
  }
function skipads(vid) {
  if (myvid.currentTime>=5) 
  {
add_impression(vid,'ads');
   ads=false;
   console.log("inside ads_ended");
   $("video")[0].play();
    $("#adds_div").fadeOut(2000);
    $("#fullpage").fadeIn(1000);
    $("#ads_div_video").attr("src","#");
    $("#ads_user_details").html("");
    $("#ads_div_video").attr("onended","");
  }
}

  function ads_ended(vid,type) {
   add_impression(vid,type);
   ads=false;
   console.log("inside ads_ended");
   $("video")[0].play();
    $("#adds_div").fadeOut(2000);
    $("#fullpage").fadeIn(1000);
    $("#ads_div_video").attr("src","#");
    $("#ads_user_details").html("");
    $("#ads_div_video").attr("onended","");
  }
  $(document).ready(function(){
      myvid=document.getElementById("ads_div_video");
    ads=false;
    addnum=Math.round(Math.random() * (+180 - +185) + +185);
    timer=1;
setInterval(function(){
timer=++timer;
if (timer%parseInt(addnum)==0 && !ads) 
{
ads=true;
console.log("Ads condition true will show ads");
$("video")[0].pause();
show_ads();
}
else
{
  console.log("Ads condition is false");
}
if (ads && parseInt(myvid.currentTime)>=5) 
{
//  alert("inside show skip");
$("#skipvideobtn").fadeIn();
}
  }, 1000);
    $("#layer").hide();
    if ($(".video").paused) {
      $(".layer").show();
    } else {
       $(".layer").hide();
      }
  $(document).on("click", "#myVideo", function (ev) {
      // alert();
      var v = $(this)[0];
      // alert(v);
    if (v.paused) {
      v.play();
      $(".layer").hide();
    } else {
      v.pause();
       $(".layer").show();
      }
  });
});
    function add_impression(vid,type) {
          $.ajax({
                     url:'<?php echo $call_config->base_url().'application/modal/user/utility/impression.php'?>',
                     type:'POST',
                     data:{vid:vid,type:type},
                     success:function(data){
                   //res=JSON.parse(data);
                   //alert(data);                 
                     }
                  })

  }
  function choice(element)
{
  status=element.getAttribute("value");
vid=element.getAttribute("name");
//alert(status+" "+vid);
if (status=="like") 
{
 // alert(vid);
$.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/utility/choice.php'?>',
  type:'POST',
  data:{vid:vid,choice:"like"},
  success:function(data){
   res=JSON.parse(data);
   if (res['status']) 
   {
    element.setAttribute("style","color:red;");
   element.setAttribute("value","liked");
   }
   else
   {
    alert("failed to delete");
   }
   }
  });
}
else
{
//    alert(vid);
  $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/utility/choice.php'?>',
  type:'POST',
  data:{vid:vid,choice:"deletelike"},
  success:function(data){
   res=JSON.parse(data);
   if (res['status']) 
   {
    element.setAttribute("style","color:whitesmoke;");
    element.setAttribute("value","like");
   }
   else
   {
    alert(data);
   }
   }
                  });
}
  $.ajax({
                     url:'<?php echo $call_config->base_url().'application/modal/user/utility/count_likes.php'?>',
                     type:'POST',
                     data:{vid:vid},
                     success:function(data){
                   
                     if(data=="failed")
                     {
                        alert('cant count');
                     }
                     else if(data==1){
                        
                         $("#likes_count"+vid).html(data + " "+ "Like")
                       
                     }
                     else{
                        
                        $("#likes_count"+vid).html(data + " "+ "Likes")
                     }
                    
                      
                     }
                  });
}
</script>

</body>
</html>