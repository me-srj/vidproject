<?php
include('../../../../config.php');
$call_config = new config();
$call_config->user_sess_checker();
$sess_data_get = $call_config->user_sess_data_bind();
$uid=$sess_data_get['sess_user_id'];
 $row=$call_config->get("DELETE FROM `tbl_notification_master` WHERE uid='".$uid."'");
 if($row)
 {
 	echo "success";
 }
 else{
 	echo "failed";
 }
?>