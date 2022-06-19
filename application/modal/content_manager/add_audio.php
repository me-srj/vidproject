<?php 
include('../../../config.php');
$call_config = new config();
$call_config->cmg_sess_checker();
$cmg_sess_data=$call_config->cmg_sess_data_bind();
$a_id=$cmg_sess_data['sess_cmg_email'];
if(isset($_FILES['audio']) && isset($_POST['title'])){
$arr11=explode(".",$_FILES['audio']['name']);
$lenarr11=count($arr11);
$file_name=uniqid().'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['audio']['tmp_name'];
$final_path="../../../audio/".$file_name;
 $fpath=$file_name;
if (move_uploaded_file($file_tmp,$final_path))
  	{	
 $image=$file_name;
 $title=mysqli_escape_string($call_config->con,$_POST['title']);
 $sql="INSERT INTO `tbl_audio_master`(`afile`, `title`, `cby`) VALUES ('".$image."','".$title."','".$a_id."')";
 if ($call_config->IDU($sql)) {
 	$call_config->msg("Added!!","Audio uploaded successfully!!.","success","content_manager/","audio/");
 }
 else
 {
 	$call_config->msg("Failed!!","Failed to insert data.","error","content_manager/","audio/");
 }
 }
 else
 {
 	echo "Failed to upload image.".$_FILES["audio"]["error"];
}
}
?>  