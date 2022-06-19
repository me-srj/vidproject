<?php 
include('../../../config.php');
$call_config = new config();
$call_config->cmg_sess_checker();
$cmg_sess_data=$call_config->cmg_sess_data_bind();
$a_id=$cmg_sess_data['sess_cmg_email'];
if(isset($_GET['id'])){
 $id=base64_decode(mysqli_escape_string($call_config->con,$_GET['id']));
 $sql="DELETE FROM `tbl_audio_master` WHERE `id`='".$id."'";
 if ($call_config->IDU($sql)) 
 {
 	$call_config->msg("Deleted!!","Audio Deleted successfully!!.","success","content_manager/","audio/");
 }
 else
 {
 	$call_config->msg("Failed!!","Failed to delete data.","error","content_manager/","audio/");
 }
}
?>  