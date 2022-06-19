<div id="content-wrapper">
            <div class="container-fluid pb-0">
          <div class="video-block section-padding">
                  <div class="row">
<?php 
$videos=$call_config->get_all("SELECT * FROM tbl_video_master where name LIKE '%".$search."%' or description LIKE '%".$search."%' or hashtag LIKE '%".$search."%'");
require_once('../../../../files_dependencies/getid3/getid3.php');
 $getID3 = new getID3();
 foreach ($videos as $vid) {
 $ThisFileInfo = $getID3->analyze('../../../../videos/'.$vid['file']);
$views=$call_config->get("SELECT COUNT(*) as total FROM `tbl_video_impression_master` WHERE `vid`='".$vid['id']."'");
 $category=$call_config->get("SELECT sub_category FROM `tbl_scategory_master` WHERE `id`='".$vid['cat_id']."'");
 ?>
  <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a class="play-icon" href="<?= $call_config->base_url() ?>application/view/user/vedio_page/?id=<?= base64_encode($vid['id'])?>"><i class="fas fa-play-circle"></i></a>
                              <a href="#"><img class="img-fluid" src="<?= $call_config->base_url() ?>thumbnail/<?= $vid['thumbnail'] ?>" alt="" style="height: 150px;width: 100%;"></a>
                              <div class="time"><?= $call_config->get_time(number_format($ThisFileInfo['playtime_seconds'],2))  ?></div>
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
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div class="btn-group float-right right-action">
                              <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right">
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                              </div>
                           </div>
                           <h6>Popular Channels</h6>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><img class="img-fluid" src="<?= $call_config->base_url() ?>img/s1.png" alt=""></a>
                              <div class="channels-card-image-btn"><button type="button" class="btn btn-outline-danger btn-sm">Subscribe <strong>1.4M</strong></button></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">Channels Name</a>
                              </div>
                              <div class="channels-view">
                                 382,323 subscribers
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><img class="img-fluid" src="<?= $call_config->base_url() ?>img/s2.png" alt=""></a>
                              <div class="channels-card-image-btn"><button type="button" class="btn btn-outline-danger btn-sm">Subscribe <strong>1.4M</strong></button></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">Channels Name</a>
                              </div>
                              <div class="channels-view">
                                 382,323 subscribers
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><img class="img-fluid" src="<?= $call_config->base_url() ?>img/s3.png" alt=""></a>
                              <div class="channels-card-image-btn"><button type="button" class="btn btn-outline-secondary btn-sm">Subscribed <strong>1.4M</strong></button></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">Channels Name <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle"></i></span></a>
                              </div>
                              <div class="channels-view">
                                 382,323 subscribers
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><img class="img-fluid" src="<?= $call_config->base_url() ?>img/s4.png" alt=""></a>
                              <div class="channels-card-image-btn"><button type="button" class="btn btn-outline-danger btn-sm">Subscribe <strong>1.4M</strong></button></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">Channels Name</a>
                              </div>
                              <div class="channels-view">
                                 382,323 subscribers
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->