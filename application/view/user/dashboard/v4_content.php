<div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Top Categories</h6>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="owl-carousel owl-carousel-category">


                           <?php
                           $category=$call_config->get_all("SELECT * FROM tbl_category_master");
                           foreach ($category as $key => $value) {
                              ?>

                                <div class="item">
                              <div class="category-item">
                                 <a href="<?php echo $call_config->base_url()?>application/view/user/cat_vedios/?id=<?= base64_encode($value['id'])?>">
                                    <img class="img-fluid" src="<?= $call_config->base_url() ?>app-assets/admin/category_img/<?= $value['image'];?>" alt="">
                                    <h6><?= $value['cname'];?></h6>
                                 </a>
                              </div>
                           </div>
                           <?php
                              
                           }
                          ?>

                         
                           
                         
                           
                       
                        
                          
                        </div>
                     </div>
                  </div>
<hr class="mt-0">
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
$videos=$call_config->dash_videos();
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
                              <a href="#"><img class="img-fluid" src="<?= $call_config->base_url() ?>thumbnail/<?= $vid['thumbnail'] ?>" alt="" style="height: 196px;width: 100%;"></a>
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
                                 <?=$views['total'] ?> Views &nbsp;<i class="fas fa-calendar-alt"></i> <?= $call_config->get_time_difference("now",$vid['con']) ?>
                              </div>
                           </div>
                        </div>
                     </div>
 <?php
 }
?>
                  </div>
               </div>
<?php
$acontest=$call_config->get_all("SELECT * FROM `tbl_contest_master` where  closeon >= '".date('Y-m-d H:i:s',time())."'");
if (sizeof($acontest)>0) {
  ?>
<hr class="mt-0">
  <div class="video-block section-padding hide_on_mobile">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Active Contest</h6>
                        </div>
                     </div>
<?php
foreach ($acontest as $contest ) {
  ?>
  <div class="col-xl-4 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
      <a href="<?= $call_config->base_url() ?>application/view/user/contest_page/?id=<?= base64_encode($contest['id']) ?>"><img class="img-fluid" src="<?= $call_config->base_url() ?>app-assets/admin\contest_banner/<?= $contest['banner'] ?>" alt=""></a>
                              <div class="channels-card-image-btn"><button type="button" class="btn btn-outline-danger btn-sm">Join @<strong><?php
if ($contest['ctype']==0) {
  echo "Free";
}
else
{
   echo $contest['ctype']." "."₹";
}
                               ?></strong></button></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#"><?= $contest['name'] ?></a>
                              </div>
                              <div class="channels-view">
                               <?= $contest['cdescription'] ?>
                              </div>
                           </div>
                        </div>
                     </div>
  <?php
}

?>                  
                  </div>
               </div>
  <?php
}
?>
               <hr class="mt-0">
            </div>
            <!-- /.container-fluid -->