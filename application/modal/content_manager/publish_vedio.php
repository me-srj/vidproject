<?php 
include('../../../config.php');
$call_config = new config();
$call_config->cmg_sess_checker();
$cmg_sess_data=$call_config->cmg_sess_data_bind();
if($_POST['data']){
   $data= $_POST['data'];
 $sql="UPDATE `tbl_video_master` SET `publish`='publish',`verification`='1' WHERE `id`='".$data."' ";
 $user=$call_config->get("SELECT * FROM `tbl_video_master` WHERE id='".$data."'");
if($call_config->IDU($sql)){
	$call_config->add_noti($user['id'],'Video Published!!','you video has been accepted by our team.');
	echo "success";
}
else{
	echo "false";
}
}
?>