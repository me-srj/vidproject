<?php
include('../../../../config.php');
$call_config = new config();
$call_config->user_sess_checker();
$sess_data_get = $call_config->user_sess_data_bind();
$result = array('status' => false,'message'=>'');
if (isset($_POST['choice'])) {

       


    switch ($_POST['choice']) {
	case 'upvote':
		$uid=$sess_data_get['sess_user_id'];
		$vid=mysqli_escape_string($call_config->con,$_POST['vid']);
		$row=$row=$call_config->get("SELECT * FROM `tbl_contest_vote_master` WHERE `uid`='".$uid."' AND `vid`='".$vid."'");
		if ($row['id']==null||$row['id']=="") {
			$sql="INSERT INTO `tbl_contest_vote_master`(`uid`, `vid`, `vtype`, `con`) VALUES ('$uid','$vid','1','".date('Y-m-d H:i:s',time())."')";
		}
		else
		{
			$sql="UPDATE `tbl_contest_vote_master` SET `vtype`='1',`con`='".date('Y-m-d H:i:s',time())."' WHERE uid='".$uid."' and vid='".$vid."'";
		}
		

		if ($call_config->IDU($sql)) {
		$result['status']=true;
		$result['message']="vote";
		}
		else
		{
		$result['status']=false;
		$result['message']="failed to vote";	
		}
	print_r(json_encode($result));
		break;
		case 'devote':
		echo $uid=$sess_data_get['sess_user_id'];
		echo $vid=mysqli_escape_string($call_config->con,$_POST['vid']);
		$row=$row=$call_config->get("SELECT * FROM `tbl_contest_vote_master` WHERE `uid`='".$uid."' AND `vid`='".$vid."'");
		if ($row['id']==null||$row['id']=="") {
			$sql="INSERT INTO `tbl_contest_vote_master`(`uid`, `vid`, `vtype`, `con`) VALUES ('$uid','$vid','0','".date('Y-m-d H:i:s',time())."')";
		}
		else
		{
			$sql="UPDATE `tbl_contest_vote_master` SET `vtype`='0',`con`='".date('Y-m-d H:i:s',time())."' WHERE uid='".$uid."' and vid='".$vid."'";
		}
		



		if ($call_config->IDU($sql)) {
		$result['status']=true;
		$result['message']="devoted";
		}
		else
		{
		$result['status']=false;
		$result['message']="Failed to devote!!";	
		}
	print_r(json_encode($result));
		break;
		case 'delete':
		$uid=$sess_data_get['sess_user_id'];
		$vid=mysqli_escape_string($call_config->con,$_POST['vid']);
		if ($call_config->IDU("DELETE FROM `tbl_contest_vote_master` WHERE uid='$uid' and vid='$vid'")) 
		{
		$result['status']=true;
		$result['message']="Choice Deleted!";
		}
		else
		{
		$result['status']=false;
		$result['message']="Failed to Delete choice!!";	
		}
	print_r(json_encode($result));
		break;
	
	default:
		# code...
		break;
}
}

?>