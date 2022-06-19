<?php
 include("../../../../config.php");
 $call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();
if (isset($_GET['id']) && isset($_GET['vid'])) {
   $id=mysqli_escape_string($call_config->con,$_GET['id']);
   $vid=mysqli_escape_string($call_config->con,$_GET['vid']);
   $plan=$call_config->get("SELECT * FROM `tbl_ads_plan_master` WHERE `id`='".base64_decode($id)."'");
   $video=$call_config->get("SELECT * FROM `tbl_video_master` WHERE `id`='".base64_decode($vid)."'");
   $category=$call_config->get("SELECT * FROM `tbl_scategory_master` WHERE `status`='1' AND `id`='".$video['cat_id']."'");
   $customer=$call_config->get("SELECT * FROM `tbl_user_master` WHERE `id`='".$video['uid']."'");
   include_once 'paypal.class.php';
  $paypal = new PaypalExpress; 
 include('../../../../public/user/v1_HeadPart.php');
 include('../../../../public/user/v2_TopNavBar.php');
 include('../../../../public/user/v3_sidebar.php');
?>
<div  class="container-fluid upload-details" id="upload_page">
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
                     <div class="alert alert-info" id="video_message">Please choose a payment method to boost your video.</div>
                  </div>
               </div>
               <hr>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="osahan-form">
            
                           <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Choosed Plan</h6>
                        </div>
                     </div>
<div class="col-md-12">
   Hy,You have choosed ads plan <b><?= $plan['name'] ?></b> Where your will video will get <b class="text-danger"><?= $plan['impressions'] ?></b> Views at a price of <b class="text-info"> <?= $plan['price'] ?></b>.
</div>
<div class="col-md-12">
      <div id="card">
<br>
<h6>Pay With</h6>
<div class="row">
   <div class="col-md-6 mt-3">
      <center>
        <form method="POST" action="<?=$call_config->base_url()?>application/view/user/payment/pay.php">
   <input type="hidden" name="type" value="ads">
   <input type="hidden" name="purpose"  value="<?= $plan['name'] ?>">
     <input type="text" style="display: none;" name="cid"  value="<?=$user_sess_data['sess_user_id']?>">
     <input type="text" style="display: none;" name="cname"  value="<?=$user_sess_data['sess_user_name']?>">
      <input type="text" style="display: none;" name="cemail"  value="<?=$user_sess_data['sess_user_email']?>">
     <input type="text" style="display: none;" name="cmobile"  value="<?=$user_sess_data['sess_user_mobile']?>">
     <input type="text" style="display: none;" name="ads_id"  value="<?= $plan['id']?>">
     <input style="display: none;" type="text" name="vid"  value="<?= $video['id']?>">
     <input style="display: none;" type="text" name="plan_name" value="<?=$plan['name'];?>">
      <input type="hidden" name="price" id="cname" value="<?= $plan['price']?>">
     <button type="Submit" class="btn btn-outline-danger btn-sm" name="ctype" id="final">Other <strong>Payment Methods</strong></button>
</form>
      </center>
   </div>
   <div class="col-md-6 mt-3">
      <center>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<div id="paypal-button"></div>
</center>
   </div>
</div>
                                </div>
</div>
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
                    total: '<?php echo $plan['price']; ?>',
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
            window.location = "<?= $call_config->base_url(); ?>application/view/user/payment/paypal.php"+"?paymentID="+data.paymentID+"&token="+data.paymentToken+"&payerID="+data.payerID+"&pid=<?php echo $plan['id']; ?>&ptype=ads&vid=<?= $video['id'] ?>&ads_id=<?php echo $plan['id']; ?>";
        });
    }
}, '#paypal-button');
</script>
<?php
include('../../../../public/user/v5_Footer.php');
}
else
{
   $call_config->msg("Error!!","Invalid page!!","info","user/dashboard/","");
}
?>