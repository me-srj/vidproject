<?php
 // error_reporting(0);
 include("../../../../config.php");
 $call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();
$customer=$call_config->get("SELECT * FROM `tbl_user_master` WHERE `id`='".$user_sess_data['sess_user_id']."'");
 include('../../../../public/user/v1_HeadPart.php');
 include('../../../../public/user/v2_TopNavBar.php');
 include('../../../../public/user/v3_sidebar.php');

  $contest_id=base64_decode($_GET['id']);
 ?>
         <style>


.top-left {
  position: absolute;
  top: 8px;
  left: 16px;
  color:white
}
.bottom-left {
  position: absolute;
  bottom:230px;
  left: 20px;
}
.section-img img {
	width:100%;
	height: 60vh;
}



</style>
 <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url() ?>app-assets/user/contest/style.css">
 <!-- TimeCircles css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url() ?>app-assets/user/contest/TimeCircles.css">
<!-- Photo Contests Liata Start Here -->
 <!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url() ?>app-assets/user/contest/bootstrap.min.css">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url() ?>app-assets/user/contest/font-awesome.min.css">

   <div class="container-fluid pb-0">        
               <hr class="mt-0">
               <div class="video-block section-padding">
               	 <?php

                      $contest=$call_config->get("SELECT  b.name,c.id as vid,c.file,c.thumbnail,c.name as v_name,d.name as contest_name,d.cdescription,d.banner,d.con,d.closeon FROM `tbl_contest_video_master` as a JOIN tbl_user_master as b on a.uid = b.id JOIN tbl_video_master as c ON a.vid=c.id JOIN tbl_contest_master as d ON d.id=a.contestid WHERE a.contestid='".$contest_id."' and a.uid='".$user_sess_data['sess_user_id']."' ");
                         $count=$call_config->get("SELECT count(*) FROM `tbl_contest_video_master`");
                          $ct=implode(' ',$count);
                       $s=$contest['con'];
                       $c=$contest['closeon'];

                      $time_left=$call_config->get_diff($s,$c,'s');
                      //print_r($contest);
                    // for vote and devote count
                      $vote=$call_config->get("SELECT COUNT(*) as vote FROM `tbl_contest_vote_master` WHERE vid='".$contest['vid']."' AND vtype='1' ");
                      $devote=$call_config->get("SELECT COUNT(*) as devote FROM `tbl_contest_vote_master` WHERE vid='".$contest['vid']."' AND vtype='0' ");
                     ?>
                 
                  <div class="row pt-2">
                  	 <div class="container">
                <div class="row full-photocontest-area">
					<div class="col-lg-6 col-md-12 col-sm-12 mb-2">
						<div class="single-section">
							<div class="section-img">
								<img src="<?= $call_config->base_url() ?>app-assets/admin/scat_img/<?=$contest['banner'];?>" alt="single Images" />
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12">
						<h3 class="headding-title"><?=$contest['contest_name'];?></h3>
						<div class="row">
						   <div class="col-md-6">
						    <p>
                                 <a  name="choice"> <i class="fas fa-calendar"></i><?php 
                                               $date=$contest['con'];
                							echo $newDate = date("d-m-Y", strtotime($date));
                							?></a>
                               <a class="date ml-2" name="choice"> <i class="fas fa-calendar-times-o" aria-hidden="true"></i> <?php 
                                
                                 $d=$contest['closeon'];
                								echo $n = date("d-m-Y", strtotime($d));
                								?></a> 
                  </p>
                          </div>
                          <div class="col-md-6">
                          	<div class="row">	
                          <div class="col-md-12">
                          	<video width="100%" class=" img-thumbnail" height="70" height="415" src="<?= $call_config->base_url() ?>videos/<?=$contest['file'];?>"" controls frameborder="0" allow="autoplay"  allowfullscreen id="v"></video>
                          </div>
                           <div class="col-md-12">	
                           	<img class=" img-thumbnail" src="<?= $call_config->base_url() ?>thumbnail/<?=$contest['thumbnail'];?>"" id="t" style="height:70px;width:100%;">
                          	</div>
                          </div>
                        </div>
                      </div>
					
						<p class="des"><?=$contest['cdescription'];?></p>
						<div class="countdown-section">
							<div class="row">
								<div class="col-md-6 pt-2">
								<div class="col-sm-11"><div class="CountDownTimer" data-timer="<?= $time_left?>"></div></div>
								</div>
								<div class="col-md-6">
									<div class="card">
									<label class="control-label">Title :</label>
									<b> &nbsp;<?=$contest['v_name'];?></b>
									</div>
                  <div class="card fas fa-bar-chart pt-3">
                    <label class="form-control"><span class="fas fa-thumbs-up">Vote : <?= $vote['vote'];?></span>
                      &nbsp;&nbsp;&nbsp;
                      <span class="fas fa-thumbs-down mr-6">Devote : <?= $devote['devote'];?></span></label>
                  </div>	
								</div>
							</div>
						</div>
						<div class="join-details">
							<p>Last Join : <?= $contest['name']?> </p>
							<p>Total Join : <?= $ct;?></p>
						</div>
					</div>
				</div>
            </div>
          </div>

                    
                
      </div>

    </div>
            <!-- /.container-fluid -->
 


            <!-- jquery latest version -->
        <script src="<?php echo $call_config->base_url() ?>app-assets/user/contest/js/vendor/jquery-1.12.0.min.js"></script>
        <!-- bootstrap js -->
        <script src="<?php echo $call_config->base_url() ?>app-assets/user/contest/js/bootstrap.min.js"></script>
        <!-- owl.carousel js -->
        <script src="<?php echo $call_config->base_url() ?>app-assets/user/contest/js/owl.carousel.min.js"></script>
        <!-- owl.carousel js -->
        <script src="<?php echo $call_config->base_url() ?>app-assets/user/contest/js/owl.carousel.min.js"></script>
        <!-- meanmenu js -->
        <script src="<?php echo $call_config->base_url() ?>app-assets/user/contest/js/jquery.meanmenu.js"></script>
        <!-- jquery-ui js -->
        <script src="<?php echo $call_config->base_url() ?>app-assets/user/contest/js/jquery-ui.min.js"></script>
        <!-- wow js -->
        <script src="<?php echo $call_config->base_url() ?>app-assets/user/contest/js/wow.min.js"></script>
        <!-- jquery.counterup js -->
        <script src="<?php echo $call_config->base_url() ?>app-assets/user/contest/js/jquery.counterup.min.js"></script>
    
       
       
        <!-- magnific popup -->
        <script src="<?php echo $call_config->base_url() ?>app-assets/user/contest/js/jquery.magnific-popup.min.js"></script>
        <!-- jQuery MixedIT Up -->
        <script src="<?php echo $call_config->base_url() ?>app-assets/user/contest/js/jquery.mixitup.min.js"></script>
        <!-- Counter Down js -->
        <script src="<?php echo $call_config->base_url() ?>app-assets/user/contest/js/simplyCountdown.min.js"></script>
      
        <!-- jquery.fancybox.pack js -->
        <script src="<?php echo $call_config->base_url() ?>app-assets/user/contest//fancybox/jquery.fancybox.pack.js"></script>
        <!-- plugins js -->
        <script src="<?php echo $call_config->base_url() ?>app-assets/user/contest/js/plugins.js"></script>
      
        <!-- TimeCircles js -->
        <script src="<?php echo $call_config->base_url() ?>app-assets/user/contest/js/TimeCircles.js"></script>
        <!-- main js -->
        <script src="<?php echo $call_config->base_url() ?>app-assets/user/contest/js/main.js"></script>
       <?php
include('../../../../public/user/v5_Footer.php');

?>