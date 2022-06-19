<style type="text/css">
  /* The snackbar - position it at the bottom and in the middle of the screen */
#snackbar {
  visibility: hidden; /* Hidden by default. Visible on click */
  min-width: 250px; /* Set a default minimum width */
  margin-left: -125px; /* Divide value of min-width by 2 */
  background-color: #333; /* Black background color */
  color: #fff; /* White text color */
  text-align: center; /* Centered text */
  border-radius: 2px; /* Rounded borders */
  padding: 16px; /* Padding */
  position: fixed; /* Sit on top of the screen */
  z-index: 1; /* Add a z-index if needed */
  left: 50%; /* Center the snackbar */
  bottom: 40vh; /* 30px from the bottom */
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
<div id="content-wrapper">
            <div class="container-fluid pb-0">
<div class="row">
<div class="col-md-12">
<center>

<input type="text" onkeyup="myFunction()" id="myInput" class="form-control" placeholder="Search here" name=""></center>
<hr>
<div id="followers_div" class="col-md-12 p-0">
<?php
$followers=$call_config->get_all("SELECT tblvid.* FROM `tbl_choice_master` as tblchoice right join tbl_video_master as tblvid on tblchoice.vid=tblvid.id WHERE tblchoice.uid='".$user_sess_data['sess_user_id']."'");
if (sizeof($followers)>0) {
?>
  <ul id="myUL" class="list-group">
<?php
foreach ($followers as $video) {
?>
  <li class="list-group-item"><img style="height: 30px;width: 30px;" src="<?= $call_config->base_url() ?>thumbnail/<?= $video['thumbnail'] ?>"> <a data-meta="<?= $video['name'] ?>" href="<?= $call_config->base_url() ?>application/view/user/vedio_page/?id=<?= base64_encode($video['id']) ?>"><?= $video['name'] ?></a></li>
<?php
}
?>
</ul>
<?php
}
else
{?>
<div class="row alert alert-info">It's Empty here....</div>
  <?php
}

 ?>
</div>
</div>
</div>
            </div>
<div id="snackbar">Some text some message..</div>
            <!-- /.container-fluid -->
<script type="text/javascript">
  function show_snack(message) {
  var x = document.getElementById("snackbar");
  x.className = "show";
  x.innerHTML=message;
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
show_snack("No video Found!!");
            li[i].style.display = "none";
        }
    }
}
  function subscribe(ele,uid)
     {
type=      ele.getAttribute("name");
          if(type=='follow')
                    {
                                       var fuid=uid;
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
ele.setAttribute("style","color:red;");
ele.setAttribute("name","following");
ele.innerHTML="Following";
                                       }    
                                      else
                                      {
                                      alert(res['message']);
                                      
                                      }
                                          
                                      }
                                      });   
                                     }
                                     else
                                     {
                                var fuid=uid;
                                  var choice='unsubscribe';
                                  $.ajax({
                                      url:'<?php echo $call_config->base_url().'application/modal/user/utility/subscribe.php'?>',
                                      type:'POST',
                                      data:{fuid:fuid,choice:choice},
                                     
                                      success:function(data){
                                      var res=JSON.parse(data);
                                      if (res['status']==true) 
                                       {
ele.setAttribute("style","color:black;");
ele.setAttribute("name","follow");
ele.innerHTML="Follow";
                                       }    
                                      else
                                      {
                                      alert(res['message']);
                                      }
                                    }
                                      });
                                     }
  }
</script>