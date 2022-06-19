<?php
 // error_reporting(0);
 include("../../../../config.php");
 $call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();
$customer=$call_config->get("SELECT * FROM `tbl_user_master` WHERE `id`='".$user_sess_data['sess_user_id']."'");
$vid=base64_decode($_GET['id']);
$vedios=$call_config->get_all("SELECT a.*,b.contestid FROM `tbl_video_master` as a JOIN tbl_contest_video_master as b ON a.id=b.vid WHERE a.`id`='".$vid."'");
if(isset($user_sess_data)) 
{
$crecent=$call_config->get_all("SELECT * FROM `tbl_recent_view` WHERE `uid`='".$user_sess_data['sess_user_id']."'");
$crsize=sizeof($crecent);
if ($crsize>30) {
for ($i=30; $i<$crsize;$i++) { 
 $call_config->IDU("DELETE FROM `tbl_recent_view` WHERE `id`='".$crecent[$i]['id']."'");
}
}
$recent=$call_config->get_all("SELECT * FROM `tbl_recent_view` WHERE `uid`='".$user_sess_data['sess_user_id']."' and `vid`='".$vid."'");
$total=sizeof($recent);
if ($total>0) 
{
  $call_config->IDU("DELETE FROM `tbl_recent_view` WHERE `uid`='".$user_sess_data['sess_user_id']."' and `vid`='".$vid."'");
  $call_config->IDU("INSERT INTO `tbl_recent_view`(`uid`, `vid`) VALUES ('".$user_sess_data['sess_user_id']."','".$vid."')");
}
else
{
 $call_config->IDU("INSERT INTO `tbl_recent_view`(`uid`, `vid`) VALUES ('".$user_sess_data['sess_user_id']."','".$vid."')"); 
}
}
 include('../../../../public/user/v1_HeadPart.php');
 include('../../../../public/user/v2_TopNavBar.php');
 include('../../../../public/user/v3_sidebar.php');
include('v4_content.php');
include('../../../../public/user/v5_Footer.php');

?>