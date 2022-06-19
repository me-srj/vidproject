<?php
 // error_reporting(0);
 include("../../../../config.php");
 $call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();
$customer=$call_config->get("SELECT * FROM `tbl_user_master` WHERE `id`='".$user_sess_data['sess_user_id']."'");
$vid=base64_decode($_GET['id']);
$vedios=$call_config->get_all("SELECT * FROM `tbl_video_master` WHERE `id`='".$vid."'");
 include('../../../../public/user/v1_HeadPart.php');
 include('../../../../public/user/v2_TopNavBar.php');
 include('../../../../public/user/v3_sidebar.php');
include('v4_content.php');
include('../../../../public/user/v5_Footer.php');

?>