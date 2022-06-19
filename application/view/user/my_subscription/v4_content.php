<div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Current Subscription Plan</h6>
                        </div>
                     </div>
                     <div class="col-md-12">
<?php
$user=$call_config->get("SELECT * FROM `tbl_user_master` WHERE `id`='".$user_sess_data['sess_user_id']."'");
$subs=$call_config->get("SELECT * FROM `tbl_subscription_plans_master` WHERE `id`='".$user['subscription']."'");
$current_subs=$call_config->get("SELECT * FROM `tbl_subscription_buy_master` WHERE `sid`='".$user['subscription']."' AND `uid`='".$_SESSION['sess_user_id']."' AND `astatus`='active'");
if ($current_subs['id']!=null||$current_subs['id']!="") {
  ?>
Hello there, your current plan is <b><?= $subs['name'] ?></b> Where you can upload a video of <b><?= $call_config->get_time($subs['length']) ?></b> of size <b><?= $subs['size'] ?> MB</b> 
and your plan validity is of <b><?= $subs['duration'] ?> Months. Which is From <?= date("Y-M-D H:i:s",strtotime($current_subs['bon'])) ?> To <?= date("Y-M-D H:i:s",strtotime($current_subs['von'])) ?></b> 
                     </div>
<div class="alert col-md-12 alert-info">You can buy another subscription when the current subscription ends.</div>
                  </div>
<div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Our Plans</h6>
                        </div>
                     </div>
<?php
$plans=$call_config->get_all("SELECT * FROM `tbl_subscription_plans_master` WHERE `price`>0");
foreach ($plans as $plan) {
 ?>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><h3><?= $plan['name'] ?></h3></a>
<div class="channels-card-image-btn">
<a type="button" href="#" onclick="alert('Your curent subscription is active.')" class="btn btn-outline-danger btn-sm"> @<strong><?= $plan['price'] ?></strong></a></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">For <?= $plan['duration'] ?> Months</a>
                              </div>
                              <div class="channels-view">
                              Get <?= $plan['size'] ?> MB Video Upload Length <br>&<br> <?= $call_config->get_time($plan['length']) ?> video Duration
                              </div>
                           </div>
                        </div>
                     </div>
 <?php
}
?>

  <?php
}
else
{
?>
Hello there, your current plan is <b><?= $subs['name'] ?></b> Where you can upload a video of <b><?= $call_config->get_time($subs['length']) ?></b> of size <b><?= $subs['size'] ?> MB.You can Buy a subscription to full-fill your requirements.</b>                     </div>
                  </div>
<div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Our Plans</h6>
                        </div>
                     </div>
<?php
$plans=$call_config->get_all("SELECT * FROM `tbl_subscription_plans_master` WHERE `price`>0");
foreach ($plans as $plan) {
 ?>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><h3><?= $plan['name'] ?></h3></a>
                              <div class="channels-card-image-btn"><a type="button" href="<?= $call_config->base_url() ?>application/view/user/my_subscription/buy_subs.php?id=<?= base64_encode($plan['id']) ?>" class="btn btn-outline-danger btn-sm">Buy @<strong><?= $plan['price'] ?></strong></a></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">For <?= $plan['duration'] ?> Months</a>
                              </div>
                              <div class="channels-view">
                              Get <?= $plan['size'] ?> MB Video Upload Length <br>&<br> <?= $call_config->get_time($plan['length']) ?> video Duration
                              </div>
                           </div>
                        </div>
                     </div>
 <?php
}
?>

<?php
}
?>
                                    </div>
          <div class="video-block section-padding">
            <div class="row">
                <div class="col-md-12">
                        <div class="main-title">
                           <h6>Recomendations</h6>
                       </div>
                     </div>
            </div>
                  <div class="row">
<?php 
$videos=$call_config->get_all("SELECT * FROM tbl_video_master");
require_once('../../../../files_dependencies/getid3/getid3.php');
 $getID3 = new getID3();
 foreach ($videos as $vid) 
 {
 $ThisFileInfo = $getID3->analyze('../../../../videos/'.$vid['file']);
$views=$call_config->get("SELECT COUNT(*) as total FROM `tbl_video_impression_master` WHERE `vid`='".$vid['id']."'");
 $category=$call_config->get("SELECT sub_category FROM `tbl_scategory_master` WHERE `id`='".$vid['cat_id']."'");
 ?>
  <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a class="play-icon" href="<?= $call_config->base_url() ?>application/view/user/vedio_page/?id=<?= base64_encode($vid['id'])?>"><i class="fas fa-play-circle"></i></a>
                              <a href="#"><img class="img-fluid" src="<?= $call_config->base_url() ?>thumbnail/<?= $vid['thumbnail'] ?>" alt="" style="height: 150px;width: 100%;"></a>
                              <div class="time"><?= $call_config->get_time($ThisFileInfo['playtime_seconds']) ?></div>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#"><?= $vid['name'] ?></a>
                              </div>
                              <div class="video-page text-success">
                                 <?= $category['sub_category'] ?>  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                              </div>
                              <div class="video-view">
                                 <?=$views['total'] ?> &nbsp;<i class="fas fa-calendar-alt"></i> <?= $call_config->get_time_difference("now",$vid['con']) ?>
                              </div>
                           </div>
                        </div>
                     </div>
 <?php
 }
?>
                  </div>
               </div>
               <hr class="mt-0">
               <div class="video-block section-padding">
               </div>
            </div>
            <!-- /.container-fluid -->