<?php
include("../../../../config.php");

 $call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();
//$call_config->paypal();
if(!empty($_GET['paymentID']) && !empty($_GET['token']) && !empty($_GET['payerID']) && !empty($_GET['pid']) && !empty($_GET['ptype']) ){ 
    
 
    // Include and initialize paypal class 
    include_once 'paypal.class.php'; 
    $paypal = new PaypalExpress; 
     
    // Get payment info from URL 
    $paymentID = $_GET['paymentID']; 
    $token = $_GET['token']; 
    $payerID = $_GET['payerID']; 
    $productID = $_GET['pid']; 
    $type=$_GET['ptype'];
    // Validate transaction via PayPal API 
    $paymentCheck = $paypal->validate($paymentID, $token, $payerID, $productID); 
     
    // If the payment is valid and approved 
    if($paymentCheck && $paymentCheck->state == 'approved'){ 
 
        // Get the transaction data 
        $id = $paymentCheck->id; 
        $state = $paymentCheck->state; 
        $payerFirstName = $paymentCheck->payer->payer_info->first_name; 
        $payerLastName = $paymentCheck->payer->payer_info->last_name; 
        $payerName = $payerFirstName.' '.$payerLastName; 
        $payerEmail = $paymentCheck->payer->payer_info->email; 
        $payerID = $paymentCheck->payer->payer_info->payer_id; 
        $payerCountryCode = $paymentCheck->payer->payer_info->country_code; 
        $paidAmount = $paymentCheck->transactions[0]->amount->details->subtotal; 
        $currency = $paymentCheck->transactions[0]->amount->currency; 
         
        switch ($type) {
      case 'contest': 
       $buy_sql="INSERT INTO `tbl_contest_video_master`(`uid`, `vid`, `contestid`, `contestpayment`, `con`) VALUES ('".$user_sess_data['sess_user_id']."','".$_SESSION['vid']."','".$_GET['contest_id']."','paid','".date('Y-m-d H:i:s',time())."')";
       $txn_sql="INSERT INTO `tbl_txn_master`(`uid`,`email`, `buyer_name`, `amount`, `purpose`, `payment_id`, `currency`, `instrument_type`, `con`) VALUES ('".$user_sess_data['sess_user_id']."','".$payerEmail."','".$payerName."','".$paidAmount."','contest','".$id."','".$currency."','paypal','".date('Y-m-d H:i:s',time())."')";
         // $call_config->IDU($buy_sql);
          //$call_config-IDU($txn_sql);
        $buy = mysqli_query($call_config->con,$buy_sql);
        $txn = mysqli_query($call_config->con,$txn_sql);
        if($buy&&$txn)
        {
         $call_config->msg("success","Payment success!","sucess","user/","dashboard/");   
        }
        else
        {
            echo "nai kiya";
        }
          break;
          case 'ads':
     $ads_id= $_GET['ads_id'];
     $vid=$_GET['vid'];
     $buy_sql="INSERT INTO `tbl_ads_video_list_master`(`uid`, `vid`, `plan_id`, `p_status`, `con`) VALUES ('".$user_sess_data['sess_user_id']."','".$vid."','".$ads_id."','paid','".date('Y-m-d H:i:s',time())."')";
       $txn_sql="INSERT INTO `tbl_txn_master`(`uid`,`email`, `buyer_name`, `amount`, `purpose`, `payment_id`, `currency`, `instrument_type`, `con`) VALUES ('".$user_sess_data['sess_user_id']."','".$payerEmail."','".$payerName."','".$paidAmount."','ads','".$id."','".$currency."','paypal','".date('Y-m-d H:i:s',time())."')";
         // $call_config->IDU($buy_sql);
          //$call_config-IDU($txn_sql);
        $buy = mysqli_query($call_config->con,$buy_sql);
        $txn = mysqli_query($call_config->con,$txn_sql);
        if($buy&&$txn)
        {
         $call_config->msg("success","Payment success!","sucess","user/","dashboard/");   
        }
        else
        {
            echo mysqli_error($call_config->con);
        }
          break;
          case 'subs':
          $subs_id= $_GET['pid'];
     $type=$_GET['ptype'];
$plan=$call_config->get("SELECT * FROM tbl_subscription_plans_master WHERE `id`='".$subs_id."'");
$bon=strtotime(date('Y-m-d H:i:s',time()));
$nextd=$bon+(2592000*$plan['duration']);
$von=date("Y/m/d H:i:s",$nextd);
     $buy_sql="INSERT INTO `tbl_subscription_buy_master`(`sid`, `uid`, `bon`, `von`, `pstatus`, `astatus`) VALUES ('".$subs_id."','".$user_sess_data['sess_user_id']."','".$bon."','".$von."','paid','active')";
       $txn_sql="INSERT INTO `tbl_txn_master`(`uid`,`email`, `buyer_name`, `amount`, `purpose`, `payment_id`, `currency`, `instrument_type`, `con`) VALUES ('".$user_sess_data['sess_user_id']."','".$payerEmail."','".$payerName."','".$paidAmount."','subs','".$id."','".$currency."','paypal','".date('Y-m-d H:i:s',time())."')";
         // $call_config->IDU($buy_sql);
          //$call_config-IDU($txn_sql);
        $buy = mysqli_query($call_config->con,$buy_sql);
        $txn = mysqli_query($call_config->con,$txn_sql);
        $update=mysqli_query($call_config->con,"UPDATE `tbl_user_master` SET `subscription`='".$subs_id."' WHERE `id`='".$user_sess_data['sess_user_id']."'");
        if($buy&&$txn&&$update)
        {
         $call_config->msg("success","Payment success!","sucess","user/","dashboard/");   
        }
        else
        {
            echo "nai kiya";
        }
          break;
      
      default:
       echo "string";
          break;
}
        
    }  
}

?>