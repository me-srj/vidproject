<div  class="container-fluid upload-details pb-0" id="upload_page">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="main-title">
                        <h6>Boost Your Video</h6>
                     </div>
                  </div>
                  <div class="col-lg-4">
<div class="video-card">
<video style="width: 100%;height: 100%;" src="<?= $call_config->base_url() ?>videos/<?= $video['file'] ?>" id="video_tag" controls>
</video>
                           </div>
                                        </div>
                  <div class="col-lg-8">
                     <div class="osahan-title" id="file_name"><?= $video['name'] ?></div>
                     <div class="osahan-size" id="video_details"><?= $video['description'] ?></div>
                     <div class="osahan-size text-info"><?= $video['hashtag'] ?></div>
                     <div class="osahan-size"> <?= $category['sub_category'] ?></div>
                     <div class="alert alert-info" id="video_message">Please choose a ads Plan to boost your video.</div>
                  </div>
               </div>
               <hr>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="osahan-form">
            
                           <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>ads Plans</h6>
                        </div>
                     </div>
<?php
$plans=$call_config->get_all("SELECT * FROM `tbl_ads_plan_master` WHERE `status`='1'");
foreach ($plans as $plan) {
 ?>

                     <div class="col-xl-4 col-sm-6 mb-4">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="<?= $call_config->base_url() ?>application/view/user/boost/buyads.php?id=<?= base64_encode($plan['id']) ?>&vid=<?= base64_encode($video['id']) ?>" class="text-info btn btn-outline-info btn-sm">Buy @ <?= $plan['price'] ?></a>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#"><h2><?= $plan['name'] ?></h2></a>
                              </div>
                              <div class="channels-card-image-btn"><button type="button" class="btn btn-outline-danger btn-sm"><?= $plan['impressions'] ?> <strong><i class="fas fa-eye"></i></strong></button></div>
                           </div>
                        </div>
                     </div>
 <?php
}
?>
                     </div>                          
                     </div>
                       <div class="osahan-area text-center mt-3">
                        

                     </div>
                     <hr>
                     <div class="terms text-center">
                        <p class="mb-0">There are many variations of passages of Lorem Ipsum available, but the majority <a href="#">Terms of Service</a> and <a href="#">Community Guidelines</a>.</p>
                        <p class="hidden-xs mb-0">Ipsum is therefore always free from repetition, injected humour, or non</p>
                     </div>
                  </div>
               </div>
            </div>    