<?php
 include("../../../../config.php");
 $call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();
$call_config->user_subs_check();
if (isset($_GET['id'])) {
	$id=mysqli_escape_string($call_config->con,$_GET['id']);
	$video=$call_config->get("SELECT * FROM `tbl_video_master` WHERE `id`='".base64_decode($id)."'");
	$customer=$call_config->get("SELECT * FROM `tbl_user_master` WHERE `id`='".$user_sess_data['sess_user_id']."'");
	$category=$call_config->get("SELECT * FROM `tbl_scategory_master` WHERE `status`='1' AND `id`='".$video['cat_id']."'");
 include('../../../../public/user/v1_HeadPart.php');
 include('../../../../public/user/v2_TopNavBar.php');
 include('../../../../public/user/v3_sidebar.php');
include('v4_content.php');
include('../../../../public/user/v5_Footer.php');
}
else
{
	$call_config->msg("Error!!","Invalid page!!","info","user/dashboard/","");
}
?>