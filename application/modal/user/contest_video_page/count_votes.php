<?php
include('../../../../config.php');
$call_config = new config();
$call_config->user_sess_checker();
$sess_data_get = $call_config->user_sess_data_bind();
 
  $vid=mysqli_escape_string($call_config->con,$_POST['vid']);
 $row=$call_config->get("SELECT COUNT(*) FROM tbl_contest_vote_master WHERE vtype='1' AND vid='".$vid."'");
 if($row)
 {
 	$count=implode('',$row);
 	echo $count;
 }
 else{
 	echo "0";
 }
?>