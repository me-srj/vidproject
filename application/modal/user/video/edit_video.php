<?php
include('../../../../config.php');
$call_config = new config(); 
$call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();
if (isset($_POST['video_id'])) 
{
$title=mysqli_escape_string($call_config->con,$_POST['title']);
$description=mysqli_escape_string($call_config->con,$_POST['description']);
$video_tags=mysqli_escape_string($call_config->con,$_POST['video_tags']);
$video_id=mysqli_escape_string($call_config->con,$_POST['video_id']);
$cat=$call_config->get("SELECT * FROM `tbl_scategory_master` ORDER by id DESC");
$videorow=$call_config->get("SELECT * FROM `tbl_video_master` WHERE `id`='".$video_id."'");
$categories=mysqli_escape_string($call_config->con,$_POST["subcategory"]);
 if ($call_config->IDU("UPDATE `tbl_video_master` SET `name`='".$title."',`cat_id`='".$categories."',`description`='".$description."',`hashtag`='".$video_tags."' WHERE `id`='".$video_id."'")) 
 {
	$call_config->msg("Success!!","Video Edited Successfully!!","success","user/","my_account/");
 }
 else
 {
 		$call_config->msg("Server Error!!","Error saving video!!","info","user/","my_account/");
 }
}
else
{
	$call_config->msg("Error!!","error recieving data","error","user/","my_account/");
}
?>