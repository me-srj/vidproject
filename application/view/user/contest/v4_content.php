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
               <div class="video-block section-padding">
                 
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Participate Now</h6>
                        </div>
                     </div>
                     
                     <?php
                    
                    $contets=$call_config->get_all("SELECT * FROM `tbl_contest_master` where  `closeon` >= '".date('Y-m-d H:i:s',time())."'");
                  
                     foreach($contets as $contest)
                     {
                      $check_user=$call_config->get("SELECT * FROM `tbl_contest_video_master` where  `contestid` >= '".$contest['id']."'");
                       $contest_img=$call_config->get("SELECT img FROM `tbl_scategory_master` where  id >= '".$contest['scat']."'");
                     
                        $s=$contest['con'];
                       $c=$contest['closeon'];
                      

                      $time_left=$call_config->get_diff($s,$c,'s');
                      ?>
                      
                     
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><img class="img-fluid" src="<?= $call_config->base_url() ?>app-assets/admin/scat_img/<?=$contest_img['img'];?>" alt=""></a>
                              
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#"><?=$contest['name'];?></a>
                              </div>
                              <div class="channels-view">
                                 <div class="countdown-section mb-3">
                            
                            
                            <a href="#" class="btn btn-block">Contest Ends In</a>
                            <div class="CountDownTimer ml-3 " data-timer="<?= $time_left?>"></div>
                            
                            
                            </div>
                            <div class="channels-card-image-btn">
                              <?php if($check_user['uid']==$user_sess_data['sess_user_id']){?>
                                <a type="button" href="<?= $call_config->base_url() ?>application/view/user/contest/contest_analytics.php?id=<?=base64_encode($contest['id']);?>" class="btn btn-outline-danger btn-sm">Participated <strong></strong></a>
                              <?php }
                              else{?>
                                <a type="button" href="<?= $call_config->base_url() ?>application/view/user/contest/single_contest.php?id=<?=base64_encode($contest['id']);?>" class="btn btn-outline-danger btn-sm">Participate <strong>Now</strong></a>
                                <?php };?></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php
                  }
                  ?>
                 
                    
                
                  </div>
              
               </div>
                <hr class="mb-3">
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
        <script>
           $(document).ready(function(){
            setTimeout(function(){
        load_contest()
        },2000)
        });
           // function load_contest()
           // {

           //   $.ajax({
           //           url:'<?php echo $call_config->base_url()?>application/modal/user/contest/load_contest.php',
           //           type:'POST',
           //           data:{vid:"vid"},
           //           success:function(data){
                   
           //         // alert(data);
           //         $("#contest_div").html(data);
                      
           //           }
           //        })

           // }
        </script>