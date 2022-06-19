<?php
include('../../../../config.php');
$call_config = new config();
$call_config->user_sess_checker();
$sess_data_get = $call_config->user_sess_data_bind();
$result = array('status' => false,'message'=>'');
$vid=mysqli_escape_string($call_config->con,$_POST['vid']);
$type=mysqli_escape_string($call_config->con,$_POST['type']);
if (isset($_POST['type'])) {
switch ($_POST['type']) {
	case 'normal':
		 $uid=$sess_data_get['sess_user_id'];
$sql="INSERT INTO `tbl_video_impression_master`(`uid`, `vid`, `con`) VALUES ('".$uid."','".$vid."','".date('Y-m-d H:i:s',time())."')";	
if ($call_config->IDU($sql))
 {
$crecent=$call_config->get_all("SELECT * FROM `tbl_recent_view` WHERE `uid`='".$sess_data_get['sess_user_id']."'");
$crsize=sizeof($crecent);
if ($crsize>30) {
for ($i=30; $i<$crsize;$i++) { 
 $call_config->IDU("DELETE FROM `tbl_recent_view` WHERE `id`='".$crecent[$i]['id']."'");
}
}
$recent=$call_config->get_all("SELECT * FROM `tbl_recent_view` WHERE `uid`='".$sess_data_get['sess_user_id']."' and `vid`='".$vid."'");
$total=sizeof($recent);
if ($total>0) 
{
  $call_config->IDU("DELETE FROM `tbl_recent_view` WHERE `uid`='".$sess_data_get['sess_user_id']."' and `vid`='".$vid."'");
  $call_config->IDU("INSERT INTO `tbl_recent_view`(`uid`, `vid`) VALUES ('".$sess_data_get['sess_user_id']."','".$vid."')");
}
else
{
 $call_config->IDU("INSERT INTO `tbl_recent_view`(`uid`, `vid`) VALUES ('".$sess_data_get['sess_user_id']."','".$vid."')"); 
}
		$result['status']=true;
		$result['message']="view added";
		}
		else
		{
		$result['status']=false;
		$result['message']="Failed to normal impression";	
		}
	print_r(json_encode($result));
		break;
		case 'ads':
	    $uid=$sess_data_get['sess_user_id'];
		if ($call_config->IDU("INSERT INTO `tbl_video_impression_master`(`uid`, `vid`,`type`, `con`) VALUES ('".$uid."','".$vid."','ads','".date('Y-m-d H:i:s',time())."')")) 
		{
		$result['status']=true;
		$result['message']="Add impression added";
		}
		else
		{
		$result['status']=false;
		$result['message']="Failed to ads impression";	
		}
	print_r(json_encode($result));
		break;
	default:
		# code...
		break;
}
$sub=$call_config->get("SELECT COUNT(*) as total FROM `tbl_video_impression_master` WHERE `vid`='".$vid."' and `type`='ads'");
$plans=$call_config->get_all("SELECT * FROM `tbl_ads_video_list_master` WHERE `vid`='".$vid."'");
$extra_imp=0;
foreach ($plans as $plan) {
$adsplan=$call_config->get("SELECT * FROM `tbl_ads_plan_master` WHERE `id`='".$plan['plan_id']."'");
	$extra_imp=$extra_imp+$adsplan['impressions'];
}
if ($sub['total']>=$extra_imp) {
$call_config->IDU("UPDATE `tbl_ads_video_list_master` SET `status`='deactive' WHERE `vid`='".$vid."'");
}
}

?>