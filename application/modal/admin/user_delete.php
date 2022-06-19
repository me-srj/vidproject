<?php 
include('../../../config.php');
$call_config = new config();
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
$id = $_POST['data'];
try{
	if($id != null || $id != ''){
		$q1="DELETE FROM `tbl_user_master`WHERE id='".$id."'";
		if($call_config->con->query($q1))
		{
			$qq="DELETE FROM `tbl_video_master` WHERE uid='".$id."'";
			if($call_config->con->query($qq))
			{
		$q2="DELETE FROM `tbl_user_follow_master` WHERE uid='".$id."' OR fuid='".$id."'";
			if($call_config->con->query($q2))
			{
		$q3="DELETE FROM `tbl_subscription_buy_master` WHERE `uid`='".$id."'";
		if($call_config->con->query($q3))
		{
			$q4="DELETE FROM `tbl_recent_view` WHERE `uid`='".$id."'";
			if($call_config->con->query($q4))
			{
			$q5="DELETE FROM `tbl_notification_master` WHERE `uid`='".$id."'";
			if($call_config->con->query($q5))
			{
				$q6="DELETE FROM `tbl_contest_video_master` WHERE `uid`='".$id."'";
				if($call_config->con->query($q6))
				{
					$q7="DELETE FROM `tbl_comment_master` WHERE `uid`='".$id."'";
					if($call_config->con->query($q7))
					{
						$q8="DELETE FROM `tbl_choice_master` WHERE `uid`='".$id."'";
						if($call_config->con->query($q8))
						{
					$q9="DELETE FROM `tbl_ads_video_list_master` WHERE `uid`='".$id."'";
					if($call_config->con->query($q9))
					{
						echo "success";
						}
					}
					}
				}
			}
			}
		}
		}
		}
	}
}
}catch(exception $e){
 		echo "failed";;
 	}
?>