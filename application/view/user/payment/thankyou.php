<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../favicon.ico">-->
    <title>Thank You, Mojo</title>
  </head>

  <body>
<?php
include("../../../../config.php");

 $call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();

if (isset($_SESSION['type'])) {
  $type=$_SESSION['type'];
  include 'src/instamojo.php';

$api = new Instamojo\Instamojo('test_f38254aa7e08669ff16710fe8f9', 'test_eaf007efd6eef28fe7e34bd2a05','https://test.instamojo.com/api/1.1/');

$payid = $_GET["payment_request_id"];


try {
    $response = $api->paymentRequestStatus($payid);

  switch ($type) {
      case 'contest':
       $buy_sql="INSERT INTO `tbl_contest_video_master`(`uid`, `vid`, `contestid`, `contestpayment`, `con`) VALUES ('".$_SESSION['user_id']."','".$_SESSION['video_id']."','".$_SESSION['contest_id']."','paid','".date('Y-m-d H:i:s',time())."')";
       $txn_sql="INSERT INTO `tbl_txn_master`(`uid`,`mobile`, `email`, `buyer_name`, `amount`, `purpose`, `payment_id`, `currency`, `instrument_type`, `con`) VALUES ('".$user_sess_data['sess_user_id']."','".$response['payments'][0]['buyer_phone']."','".$response['payments'][0]['buyer_email']."','".$response['payments'][0]['buyer_name']."','".$response['payments'][0]['amount']."','contest','".$response['payments'][0]['payment_id']."','".$response['payments'][0]['currency']."','other','".date('Y-m-d H:i:s',time())."')";
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
     $ads_id= $_SESSION['ads_id'];
     $vid=$_SESSION['vid'];
     $type=$_SESSION['type'];
     $buy_sql="INSERT INTO `tbl_ads_video_list_master`(`uid`, `vid`, `plan_id`, `p_status`, `con`) VALUES ('".$user_sess_data['sess_user_id']."','".$_SESSION['vid']."','".$ads_id."','paid','".date('Y-m-d H:i:s',time())."')";
       $txn_sql="INSERT INTO `tbl_txn_master`(`uid`,`mobile`, `email`, `buyer_name`, `amount`, `purpose`, `payment_id`, `currency`, `instrument_type`, `con`) VALUES ('".$user_sess_data['sess_user_id']."','".$response['payments'][0]['buyer_phone']."','".$response['payments'][0]['buyer_email']."','".$response['payments'][0]['buyer_name']."','".$response['payments'][0]['amount']."','ads','".$response['payments'][0]['payment_id']."','".$response['payments'][0]['currency']."','other','".date('Y-m-d H:i:s',time())."')";
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
          case 'subs':
     $subs_id= $_SESSION['subs_id'];
     $type=$_SESSION['type']; 
$plan=$call_config->get("SELECT * FROM tbl_subscription_plans_master WHERE `id`='".$subs_id."'");
$bon=strtotime(date('Y-m-d H:i:s',time()));
$nextd=$bon+(2592000*$plan['duration']);
$von=date("Y/m/d H:i:s",$nextd);
     $buy_sql="INSERT INTO `tbl_subscription_buy_master`(`sid`, `uid`, `bon`, `von`, `pstatus`, `astatus`) VALUES ('".$subs_id."','".$user_sess_data['sess_user_id']."','".$bon."','".$von."','paid','active')";
       $txn_sql="INSERT INTO `tbl_txn_master`(`uid`,`mobile`, `email`, `buyer_name`, `amount`, `purpose`, `payment_id`, `currency`, `instrument_type`, `con`) VALUES ('".$user_sess_data['sess_user_id']."','".$response['payments'][0]['buyer_phone']."','".$response['payments'][0]['buyer_email']."','".$response['payments'][0]['buyer_name']."','".$response['payments'][0]['amount']."','subs','".$response['payments'][0]['payment_id']."','".$response['payments'][0]['currency']."','other','".date('Y-m-d H:i:s',time())."')";
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
          # code...
          break;
}
    //echo "<h4>Payment ID: " . $response['payments'][0]['payment_id'] . "</h4>" ;
    //echo "<h4>Payment Name: " . $response['payments'][0]['buyer_name'] . "</h4>" ;
    //echo "<h4>Payment Email: " . $response['payments'][0]['buyer_email'] . "</h4>" ;

  //echo "<pre>";
 //  print_r($response);
//echo "</pre>";
    ?>


    <?php
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
}
?>
  </body>
</html>
