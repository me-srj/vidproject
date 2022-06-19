<?php
include('../../../../config.php');
$call_config = new config(); 
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
$uby=$sess_adm_data["sess_adm_id"];
if(isset($_POST["submit"]))
{
	$id= $_POST['id']; 
	$name= $_POST['name'];
	$cdescription= $_POST['cdescription'];
	$ctype= $_POST['ctype'];
	$scat= $_POST['scat'];
if (isset($_FILES['banner']) && $_FILES['banner']['name']!=null && $_FILES['banner']['name']!="") {
		$arr11=explode(".",$_FILES['banner']['name']);
$lenarr11=count($arr11);
$file_name=uniqid().'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['banner']['tmp_name'];
$final_path="../../../../app-assets/admin/contest_banner/".$file_name;
 $fpath=$file_name;
if (move_uploaded_file($file_tmp,$final_path))
{
	$image=$file_name;
}
else
 {
 	echo "Failed to upload image.".$_FILES["banner"]["error"];
}
}
else
 {
 $image=mysqli_escape_string($call_config->con,$_POST['pbanner']);
}
	// $closeon= $_POST['closeon'];
	$closeon=date("Y-m-d H:i:s", strtotime($_POST['closeon']));
	if( $name != ''   || $name != null )
	{
			$sql = "UPDATE `tbl_contest_master` SET `banner`='".$image."',`name`='".$name."',`cdescription`='".$cdescription."',`ctype`='".$ctype."',`scat`='".$scat."',`uby`='".$uby."',`closeon`='".$closeon."' WHERE `id`='".$id."'";
     if ($call_config->IDU($sql)) {
	 	$call_config->msg("Updated Successfully!!","a country has been updated","success","admin/","contest");
	 }
	 else
	 {
	 $call_config->msg("Failed!!","a row has been update","warning","admin/","contest");	
	 }
}
else
 	{
 	$call_config->msg("Failed!!","Invalid action","error","","contest");	
 	}
}
?>