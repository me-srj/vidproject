<?php
include('../../../config.php');
$call_config = new config();
$call_config->user_sess_checker();
$sess_data_get = $call_config->user_sess_data_bind();
$result = array('status' => false,'message'=>'');
if (isset($_POST['choice'])) {
switch ($_POST['choice']) {
	case 'upvote':
		$cid=$sess_data_get['sess_user_id'];
		$vid=mysqli_escape_string($call_config->con,$_POST['vid']);
		if ($call_config->IDU("UPDATE `tbl_contest_vote_master` SET `vtype`='1',`uon`='date('Y-m-d H:i:s', time())') where uid='$uid' and vid='$vid' IF @@ROWCOUNT=0 INSERT INTO `tbl_contest_vote_master`(`uid`, `vid`, `vtype`, `con`) VALUES ('$uid','$vid','1','date('Y-m-d H:i:s',time())')")) {
		$result['status']=true;
		$result['message']="Voted";
		}
		else
		{
		$result['status']=false;
		$result['message']="Failed to delete!!";	
		}
	print_r(json_encode($result));
		break;
		case 'devote':
		$cid=mysqli_escape_string($call_config->con,$_POST['cid']);
		$vid=mysqli_escape_string($call_config->con,$_POST['vid']);
		if ($call_config->IDU("UPDATE `tbl_contest_vote_master` SET `vtype`='0',`uon`='date('Y-m-d H:i:s', time())') where uid='$uid' and vid='$vid' IF @@ROWCOUNT=0 INSERT INTO `tbl_contest_vote_master`(`uid`, `vid`, `vtype`, `con`) VALUES ('$uid','$vid','0','date('Y-m-d H:i:s',time())')")) {
		$result['status']=true;
		$result['message']="Devoted";
		}
		else
		{
		$result['status']=false;
		$result['message']="Failed to delete!!";	
		}
	print_r(json_encode($result));
		break;
		case 'delete':
		$cid=mysqli_escape_string($call_config->con,$_POST['cid']);
		$vid=mysqli_escape_string($call_config->con,$_POST['vid']);
		if ($call_config->IDU("DELETE FROM `tbl_contest_vote_master` WHERE uid='$uid' and vid='$vid'")) 
		{
		$result['status']=true;
		$result['message']="Vote Deleted!";
		}
		else
		{
		$result['status']=false;
		$result['message']="Failed to Delete!!";	
		}
	print_r(json_encode($result));
		break;
	
	default:
		# code...
		break;
}
}

?>