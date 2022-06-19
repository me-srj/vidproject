<?php
session_start(); 
if (isset($_POST['type'])) {
  switch ($_POST['type']) {
      case 'contest':
     $_SESSION['contest_id']=$_POST['contest_id'];
      $_SESSION['video_id']=$_POST['vid'];
      $_SESSION['type']=$_POST['type'];
      $_SESSION['user_id']=$_POST['cid'];
      $product_name = $_POST["coname"];
          break;
          case 'ads':
          $product_name = $_POST["purpose"];
     $_SESSION['ads_id']=$_POST['ads_id'];
     $_SESSION['vid']=$_POST['vid'];
     $_SESSION['type']=$_POST['type'];
          break;
            case 'subs':
          $product_name = $_POST["purpose"];
     $_SESSION['subs_id']=$_POST['subs_id'];
     $_SESSION['type']=$_POST['type'];
          break;
      
      default:
         echo "default";
         die;
          break;
  }
$price = $_POST["price"];
$name = $_POST["cname"];
$phone = $_POST["cmobile"];
$email = $_POST["cemail"];
include 'src/instamojo.php';

$api = new Instamojo\Instamojo('test_f38254aa7e08669ff16710fe8f9', 'test_eaf007efd6eef28fe7e34bd2a05','https://test.instamojo.com/api/1.1/');


try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $product_name,
        "amount" => $price,
        "buyer_name" => $name,
        "phone" => $phone,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        'allow_repeated_payments' => false,
        "redirect_url" => "http://test3.pvwebsolution.com/vidproject/application/view/user/payment/thankyou.php",
        "webhook" => "http://test3.pvwebsolution.com/vidproject/application/view/user/payment/webhook.php"
        ));
    //print_r($response);

    $pay_ulr = $response['longurl'];
    
    //Redirect($response['longurl'],302); //Go to Payment page

    header("Location: $pay_ulr");
    exit();

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
}
     
  ?>
