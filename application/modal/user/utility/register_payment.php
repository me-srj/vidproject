<?php
include('../../../../config.php');
$call_config = new config();
$call_config->user_sess_checker();
$sess_data_get = $call_config->user_sess_data_bind();
$purpose_id=mysqli_escape_string($call_config->con,$_POST['purpose_id']);
$vid=mysqli_escape_string($call_config->con,$_POST['vid']);
$type=mysqli_escape_string($call_config->con,$_POST['type']);
$mobile=mysqli_escape_string($call_config->con,$_POST['mobile']);
$email=mysqli_escape_string($call_config->con,$_POST['email']);
$name=mysqli_escape_string($call_config->con,$_POST['name']);
$amount=mysqli_escape_string($call_config->con,$_POST['amount']);
$purpose=mysqli_escape_string($call_config->con,$_POST['purpose']);
$payment_id=mysqli_escape_string($call_config->con,$_POST['payment_id']);
$currency=mysqli_escape_string($call_config->con,$_POST['currency']);
$instrument=mysqli_escape_string($call_config->con,$_POST['instrument']);

?>