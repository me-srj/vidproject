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
  include_once 'paypal.class.php';
  $paypal = new PaypalExpress; 
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

                      $contest=$call_config->get("SELECT * FROM `tbl_contest_master` where  id >= '".$contest_id."'");
                      $contest_img=$call_config->get("SELECT img FROM `tbl_scategory_master` where  id >= '".$contest['scat']."'");
                        $user=$call_config->get("SELECT c.*,u.name FROM `tbl_contest_video_master` as c join tbl_user_master as u on c.uid=u.id order by c.id DESC");
                         $count=$call_config->get("SELECT count(*) FROM `tbl_contest_video_master`");
                          $ct=implode(' ',$count);
                      $vedios=$call_config->get_all("SELECT * FROM `tbl_video_master` where  cat_id = '".$contest['scat']."' and uid='".$user_sess_data['sess_user_id']."'");
                       $s=$contest['con'];
                       $c=$contest['closeon'];

                      $time_left=$call_config->get_diff($s,$c,'s');
                      //print_r($contest);
                    
                     ?>
                 
                  <div class="row pt-2">
                  	 <div class="container">
                <div class="row full-photocontest-area">
					<div class="col-lg-6 col-md-12 col-sm-12 mb-2">
						<div class="single-section">
							<div class="section-img">
								<img src="<?= $call_config->base_url() ?>app-assets/admin/scat_img/<?=$contest_img['img'];?>" alt="single Images" />
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12">
						<h3 class="headding-title"><?=$contest['name'];?></h3>
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
                          	<video width="100%" class=" img-thumbnail" height="70" height="415" src="<?= $call_config->base_url() ?>videos/default.mp4" controls frameborder="0" allow="autoplay"  allowfullscreen id="v"></video>
                          </div>
                           <div class="col-md-12">	
                           	<img class=" img-thumbnail" src="<?= $call_config->base_url() ?>thumbnail/default.jpg" id="t" style="height:70px;width:100%;">
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
									<div class="form-group">
									<label class="control-label">Title</label>
									<?print_r($vedios['name']) ?>
									<select class="form-control"onchange="vedios()" id="vid">
									<option value="" selected>Select Vedio</option>
										<?php
										foreach ($vedios as $vid)


										{?>
										<option value="<?= $vid['id']?>"><?= $vid['name']?></option>
										<?php
										}
										?>
									</select>
                  <br/>
                  <span class="null_error" style="color:red;font-size:13px;font-weight:bolder;"></span>
                   <div class="alert alert-success alert-dismissible" id="msg">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Paricipated Sucessfully</strong>
                  </div>
									</div>	
								</div>
							</div>
						</div>
						<div class="join-details">
							<p>Last Join : <?= $user['name']?> </p>
							<p>Total Join : <?= $ct;?></p>
						</div>
         
						<div class="link-section text-center mb-4">
							<?php if($contest['ctype']=='0')
							{?>
							<button type="button" class="btn btn-outline-danger btn-sm" onclick="save_free_contest()">Join <strong>Now</strong></button>
							<?php
                            }else
                            {?>
<div class="row alert-info alert">Please Select a video first and then pay&nbsp;<strong> Rs <?= $contest['ctype']?> </strong>&nbsp;to Join</div>


                          <?php  }
							?>

                                <div id="card">
                                  <br>
                                  <h6>Pay With</h6>
<div class="row">
  <div class="col-md-6 mt-3">
  <form method="POST" action="<?=$call_config->base_url()?>application/view/user/payment/pay.php">
                                     <input type="hidden" name="type" value="contest">
                                    <input style="display: none;" type="text" name="cid" id="cname" value="<?=$user_sess_data['sess_user_id']?>">
                                     <input style="display: none;" type="text" name="cname" id="cid" value="<?=$user_sess_data['sess_user_name']?>">
                                  <input style="display: none;" type="text" name="cemail" id="cemail" value="<?=$user_sess_data['sess_user_email']?>">
                                  <input style="display: none;" type="text" name="cmobile" id="cmobile" value="<?=$user_sess_data['sess_user_mobile']?>">
                                    <input type="text" style="display: none;" name="contest_id" id="conid" value="<?= $contest_id?>">
                                   <input type="text" style="display: none;" name="vid" id="conid" value="<?= $vid['id']?>">
                                    <input type="text" style="display: none;" name="coname" id="conname" value="<?=$contest['name'];?>">
                                    <input type="hidden" style="display: none;" name="price" id="cname" value="<?= $contest['ctype']?>">
      <button type="Submit" class="btn btn-outline-danger btn-sm" name="ctype" id="final">Other <strong>Payment</strong></button>
                                   
                                </form>
  </div>
    <div class="col-md-6 mt-3">
      
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<div id="paypal-button"></div>
    </div>
</div> 
                                </div>



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
<script type="">
  $(document).ready(function()
  {
$("#vid").change(function(){
if ( $(this).children(":selected").val() === "" ) {
$("#card").hide();
}
else
{
  $("#card").show();
}
});
    $('#msg').hide();
    $('#card').hide();

    $('#pay').click(function(){
       $('#card').show(100);
       $('#pay').hide();


    })

    $('#confirm').click(function(){
    if ($("#debitcard").prop("checked")) {
       $('#confirm').hide();
      $('#final').show();      
  
     }

    });
      


  })

	function vedios()
	{
		var id=$('#vid').val();
	//	alert(id);


     $.ajax({
             url:'<?php echo $call_config->base_url()?>application/modal/user/contest/load_vedios.php',
             type:'POST',
             data:{id:id},
             success:function(data){
             var res = JSON.parse(data);
           $("#pay").show();
           //alert(res['file']+res['thumbnail']);
          $("#v").attr("src",res['file']);
          $("#t").attr("src",res['thumbnail']);
          }
      });

        
         
	}
  function save_free_contest()
        {
          var uid=<?php echo $user_sess_data['sess_user_id']?>;
          var vid=$('#vid').val();
          var contest_id=<?= $contest['id']?>;
          if(vid==null || vid=='')
          {
            $('.null_error').html('Please Chhose Vedio');
            vid.focus();
          }
          else
          {
             $('.null_error').hide();
             $.ajax({
             url:'<?php echo $call_config->base_url()?>application/modal/user/contest/save_free_contest.php',
             type:'POST',
             data:{uid:uid,vid:vid,cid:contest_id},
             success:function(data){
            $('#msg').show();
            setTimeout(function(){
            $('#msg').hide();
              },3000)
          }
      });

          }
        }  
</script>
<script>
paypal.Button.render({
    // Configure environment
    env: '<?php echo $paypal->paypalEnv; ?>',
    client: {
        sandbox: '<?php echo $paypal->paypalClientID; ?>',
        production: '<?php echo $paypal->paypalClientID; ?>'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
        size: 'small',
        color: 'gold',
        shape: 'pill',
    },
    // Set up a payment
    payment: function (data, actions) {
        return actions.payment.create({
            transactions: [{
                amount: {
                    total: '<?php echo $contest['ctype']; ?>',
                    currency: 'INR'
                }
            }]
      });
    },
    // Execute the payment
    onAuthorize: function (data, actions) {
        return actions.payment.execute()
        .then(function () {
            // Show a confirmation message to the buyer
            //window.alert('Thank you for your purchase!');
            
            // Redirect to the payment process page
            window.location = "<?= $call_config->base_url(); ?>application/view/user/payment/paypal.php"+"?paymentID="+data.paymentID+"&token="+data.paymentToken+"&payerID="+data.payerID+"&pid=<?php echo $contest['id']; ?>&ptype=contest";
        });
    }
}, '#paypal-button');
</script>