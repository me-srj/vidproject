<?php
include('../../../../config.php');
$call_config = new config();
$call_config->user_sess_checker();
$sess_data_get = $call_config->user_sess_data_bind();
$result = array('status' => false,'message'=>'');

        $uid=$sess_data_get['sess_user_id'];
	     $vid=mysqli_escape_string($call_config->con,$_POST['vid']);
		 $row=$row=$call_config->get("SELECT * FROM `tbl_choice_master` WHERE `uid`='".$uid."' AND `vid`='".$vid."'");
		if ($row['uid']== $uid && $row['vid']== $vid) 
			{
				echo $row['ctype'];
			}
			else
			{
				echo "not";
			}

      

?>