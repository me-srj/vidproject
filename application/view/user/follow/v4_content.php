<div id="content-wrapper">
            <div class="container-fluid pb-0">
<div class="row">
<div class="col-md-12">
<center>
<button  id="show_followers" style="width: 42vw;" class="btn btn-outline-dark">Followers</button>
<button onclick="show_following()" id="show_following" style="width: 42vw;" class="btn btn-outline-dark">Following</button>
</center>
<hr>
<div id="followers_div" class="col-md-12 p-0">
<?php
$followers=$call_config->get_all("SELECT usertbl.* FROM `tbl_user_follow_master` as userflo RIGHT JOIN tbl_user_master as usertbl  ON userflo.uid=usertbl.id WHERE userflo.fuid='".$user_sess_data['sess_user_id']."'");
if (sizeof($followers)>0) {
?>
  <ul class="list-group">
<?php
foreach ($followers as $user) {
$userfollow=$call_config->get("SELECT COUNT(*) as total FROM tbl_user_follow_master WHERE `fuid`='".$user['id']."'");
$posts=$call_config->get("SELECT COUNT(*) as total FROM tbl_video_master WHERE `uid`='".$user['id']."' AND `publish`='publish'");
$followchech=$call_config->get("SELECT * FROM tbl_user_follow_master WHERE `uid`='".$user['id']."' AND `fuid`='".$user_sess_data['sess_user_id']."'");
if (sizeof($followchech)>0) {
$following='<span style="color:red;" class="float-right badge badge-warning p-2 mt-2" name="following" id="'.$user['id'].'" onclick=subscribe(this,this.id)>Following</span>';
}
else
{
$following='<span class="float-right text-black badge badge-warning p-2 mt-2" name="follow" id="'.$user['id'].'" onclick=subscribe(this,this.id)>Follow</span>';
}
?>
  <li class="list-group-item"><a href="<?= $call_config->base_url() ?>application/view/user/userchannel/index.php?id=<?= base64_encode($user['id']) ?>"><img class="img" style="border-radius: 50%;height: 30px;width: 30px;" src="<?= $call_config->base_url() ?>app-assets\user\user_image/<?= $user['photo'] ?>"> &nbsp; <b><?= $user['name'] ?></b></a>
  <?= $following ?>
  <br><span style="margin-left: 10vw;" class="badge float-left"><?= $call_config->get_subs($posts['total']) ?> Posts</span> <span class="badge float-left"> <?= $call_config->get_subs($userfollow['total']) ?> Followers</span></li>
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
<div style="display: none;" id="following_div" class="col-md-12 p-0">
  <?php
$followers=$call_config->get_all("SELECT usertbl.* FROM `tbl_user_follow_master` as userflo RIGHT JOIN tbl_user_master as usertbl  ON userflo.fuid=usertbl.id WHERE userflo.uid='".$user_sess_data['sess_user_id']."'");
if (sizeof($followers)>0) {
?>
  <ul class="list-group">
<?php
foreach ($followers as $user) {
$userfollow=$call_config->get("SELECT COUNT(*) as total FROM tbl_user_follow_master WHERE `fuid`='".$user['id']."'");
$posts=$call_config->get("SELECT COUNT(*) as total FROM tbl_video_master WHERE `uid`='".$user['id']."' AND `publish`='publish'");
$followchech=$call_config->get("SELECT * FROM tbl_user_follow_master WHERE `uid`='".$user['id']."' AND `fuid`='".$user_sess_data['sess_user_id']."'");
?>
  <li class="list-group-item"><a href="<?= $call_config->base_url() ?>application/view/user/userchannel/index.php?id=<?= base64_encode($user['id']) ?>"><img class="img" style="border-radius: 50%;height: 30px;width: 30px;" src="<?= $call_config->base_url() ?>app-assets\user\user_image/<?= $user['photo'] ?>"> &nbsp; <b><?= $user['name'] ?></b><span class="fas fa-angle-right float-right btn fa-2x"></span> </a>
  <br><span style="margin-left: 10vw;" class="badge float-left"><?= $call_config->get_subs($posts['total']) ?> Posts</span> <span class="badge float-left"> <?= $call_config->get_subs($userfollow['total']) ?> Followers</span></li>
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
            <!-- /.container-fluid -->
<script type="text/javascript">
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
  function show_following() {
    $("#followers_div").toggle(1000);
    $("#following_div").toggle(1000);
    $("#show_following").attr("onclick","");
    $("#show_followers").attr("onclick","show_followers()");
  }
  function show_followers() {
   $("#followers_div").toggle(1000);
   $("#following_div").toggle(1000);
   $("#show_following").attr("onclick","show_following()");
   $("#show_followers").attr("onclick","");
  }
</script>