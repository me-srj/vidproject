<?php
include('../../../../config.php');
$call_config = new config(); 
$call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();
$result = array('message' => '','status'=>false ,'id'=>"");
if (isset($_POST['choice'])) {
switch ($_POST['choice']) {
	case 'add':
	$name=mysqli_escape_string($call_config->con,$_POST['fname']);
	$length=mysqli_escape_string($call_config->con,$_POST['length']);
// $_FILES['file']['name'];
$arr11=explode(".",$_FILES['file']['name']);
$lenarr11=count($arr11);
$file_name=uniqid().'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['file']['tmp_name'];
$final_path="../../../../videos/".$file_name;
if (move_uploaded_file($file_tmp,$final_path))
  	{	
if ($call_config->IDU("INSERT INTO `tbl_video_master`(`uid`, `file`, `file_name`,`con`,`length`) VALUES ('".$user_sess_data['sess_user_id']."','".$file_name."','".$name."','".date('Y-m-d H:i:s',time())."','".$length."')")) {
$video=$call_config->get("SELECT * FROM tbl_video_master where file='".$file_name."'");
$result['id']=$video['id'];
$result['message']="Uploaded Successfully!!";
$result['status']=true;
echo json_encode($result);
}
else
{
$result['message']="Failed to insert in database!!Please contact the admin!!";
$result['status']=false;
echo json_encode($result);
}
 }
 else
 {
 	$result['message']="Failed to Upload!!";
$result['status']=false;
echo json_encode($result);
 }
		break;
		case 'remove':
		$id=mysqli_escape_string($call_config->con,$_POST['id']);
		$video=$call_config->get("SELECT * FROM tbl_video_master where id='".$id."'");
		if ($call_config->IDU("UPDATE `tbl_video_master` SET `status`='0' WHERE id='".$id."'")) 
		{
$call_config->IDU("DELETE FROM `tbl_ads_video_list_master` WHERE `vid`='".$id."'");
$call_config->IDU("DELETE FROM `tbl_choice_master` WHERE `vid`='".$id."'");
$call_config->IDU("DELETE FROM `tbl_comment_master` WHERE `vid`='".$id."'");
$call_config->IDU("DELETE FROM `tbl_contest_video_master` WHERE `vid`='".$id."'");
$call_config->IDU("DELETE FROM `tbl_contest_vote_master` WHERE `vid`='".$id."'");
$call_config->IDU("DELETE FROM `tbl_video_impression_master` WHERE `vid`='".$id."'");
$result['message']="Video Deleted Successfully!!";
$result['status']=true;
echo json_encode($result);
		}
		else
		{
			$result['message']="Failed to delete file";
			$result['status']=false;
			echo json_encode($result);
		}
		break;
		case 'value':
		# code...
		break;
		
	
	default:
		echo "default working";
		break;
}
}
else
{
	$call_config->msg("Error!!","Error accessing url","error","","");
}
?>