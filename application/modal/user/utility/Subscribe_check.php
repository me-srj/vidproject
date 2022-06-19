<?php
include('../../../../config.php');
$call_config = new config();
$call_config->user_sess_checker();
$sess_data_get = $call_config->user_sess_data_bind();
$result = array('status' => false,'message'=>'');

        $uid=$sess_data_get['sess_user_id'];
	     $fuid=mysqli_escape_string($call_config->con,$_POST['fuid']);
		 $row=$row=$call_config->get("SELECT * FROM `tbl_user_follow_master` WHERE `uid`='".$uid."' AND `fuid`='".$fuid."'");
		if ($row['uid']== $uid && $row['fuid']== $fuid) 
			{
				echo 'Subscribed';
			}
			else
			{
				echo "Not Subscribed";
			}

      

?>