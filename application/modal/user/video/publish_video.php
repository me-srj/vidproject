<?php
include('../../../../config.php');
$call_config = new config(); 
$call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();
if (isset($_GET['id'])) {
$vid=base64_decode(mysqli_escape_string($call_config->con,$_GET['id']));
if ($call_config->IDU("UPDATE `tbl_video_master` SET `publish`='verify' WHERE `id`='".$vid."'")) {
		$call_config->msg("Success!!","Video sended for verification!!","success","user/","my_account/");
}
else
{
		$call_config->msg("Error!!","error updating database!!","info","user/","my_account/");

}
}
else
{
		$call_config->msg("Error!!","error recieving data","error","user/","my_account/");
}
?>