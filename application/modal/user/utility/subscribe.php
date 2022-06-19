<?php
include('../../../../config.php');
$call_config = new config();
$call_config->user_sess_checker();
$sess_data_get = $call_config->user_sess_data_bind();
$result = array('status' => false,'message'=>'');
if (isset($_POST['choice'])) {
switch ($_POST['choice']) {
	case 'subscribe':
		 $fuid=mysqli_escape_string($call_config->con,$_POST['fuid']);
		 $uid=$sess_data_get['sess_user_id'];
$sql="INSERT INTO `tbl_user_follow_master`(`uid`, `fuid`, `con`) VALUES ('".$uid."','".$fuid."','".date('Y-m-d H:i:s',time())."')";	
if ($call_config->IDU($sql))
 {
		$result['status']=true;
		$result['message']="Subscribed";
		}
		else
		{
		$result['status']=false;
		$result['message']="Failed to subscribe!!";	
		}
	print_r(json_encode($result));
		break;
		case 'unsubscribe':
	    $fuid=mysqli_escape_string($call_config->con,$_POST['fuid']);
		$uid=$sess_data_get['sess_user_id'];
		if ($call_config->IDU("DELETE FROM `tbl_user_follow_master` WHERE uid='$uid' and fuid='$fuid'")) 
		{
		$result['status']=true;
		$result['message']="unsubscribe!";
		}
		else
		{
		$result['status']=false;
		$result['message']="Failed to unsubscribe!!";	
		}
	print_r(json_encode($result));
		break;
	default:
		# code...
		break;
}
}

?>