<?php
 include("../../../../config.php");
 $call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();
if (isset($_GET['id'])) {
   $id=mysqli_escape_string($call_config->con,$_GET['id']);
   $subs=$call_config->get("SELECT * FROM `tbl_subscription_plans_master` WHERE `id`='".base64_decode($id)."'");
   $customer=$call_config->get("SELECT * FROM `tbl_user_master` WHERE `id`='".$user_sess_data['sess_user_id']."'");
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
                        <h6>Buy Subscription Plan</h6>
                     </div>
                  </div>
               </div>
               <hr>
              <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 card" style="text-align: center;">
  Hello,You are going to buy <b><?= $subs['name'] ?></b> worth of <?= $subs['price'] ?> Which will allow you to upload videos of MAX <strong><?= $subs['size'] ?> MB</strong> and MAX length of <b><?= $subs['length'] ?></b> for a duration of <b><?= $subs['duration'] ?> Months.</b>
  <hr>
  Please Choose a payment method to pay,
  <div class="row">
   <div class="col-md-6 mt-3">
      <center>
      <form method="POST" action="<?=$call_config->base_url()?>application/view/user/payment/pay.php">
   <input type="hidden" name="type" value="subs">
   <input type="hidden" name="purpose"  value="<?= $subs['name'] ?>">
     <input type="text" style="display: none;" name="cid"  value="<?=$user_sess_data['sess_user_id']?>">
     <input type="text" style="display: none;" name="cname"  value="<?=$user_sess_data['sess_user_name']?>">
      <input type="text" style="display: none;" name="cemail"  value="<?=$user_sess_data['sess_user_email']?>">
     <input type="text" style="display: none;" name="cmobile"  value="<?=$user_sess_data['sess_user_mobile']?>">
     <input type="text" style="display: none;" name="subs_id"  value="<?= $subs['id']?>">
     <input style="display: none;" type="text" name="plan_name" value="<?=$subs['name'];?>">
      <input type="hidden" name="price" id="cname" value="<?= $subs['price']?>">
     <button type="Submit" class="btn btn-outline-danger btn-sm" name="ctype" id="final"><strong>Other</strong></button>
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
            <div class="col-md-4"></div>
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
                    total: '<?php echo $subs['price']; ?>',
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
  window.location = "<?= $call_config->base_url(); ?>application/view/user/payment/paypal.php"+"?paymentID="+data.paymentID+"&token="+data.paymentToken+"&payerID="+data.payerID+"&pid=<?php echo $subs['id']; ?>&ptype=subs";
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