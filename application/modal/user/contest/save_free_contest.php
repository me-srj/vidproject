<?php include('../../../../config.php');
$call_config = new config(); 
$call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();
  $uid=mysqli_escape_string($call_config->con,$_POST['uid']);
  $vid=mysqli_escape_string($call_config->con,$_POST['vid']);
  $contest_id=mysqli_escape_string($call_config->con,$_POST['cid']);
 $payment="free";
 $sql="INSERT INTO `tbl_contest_video_master`(`uid`,`vid`,`contestid`,`contestpayment`) VALUES ('".$uid."','".$vid."','".$contest_id."','".$payment."')";
if ($call_config->IDU($sql)) {
$call_config->msg('Saved!!',"Category Added successfully!!",'success','admin/category/','');
	}
	else
	{
		echo "Failed to insert".mysqli_error($call_config->con);
	}

?>