<?php
include('../../../../config.php');
$call_config = new config(); 
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
$cby=$sess_adm_data["sess_adm_id"];
if(isset($_POST["submit"]))
{ 
	$name= $_POST['name'];
	$cdescription= $_POST['cdescription'];
	$ctype= $_POST['ctype'];
	$scat= $_POST['scat'];
	// $closeon= $_POST['closeon'];
	$closeon=date("Y-m-d H:i:s", strtotime($_POST['closeon']));
	if( $name != ''   || $name != null )
	{
		$arr11=explode(".",$_FILES['banner']['name']);
$lenarr11=count($arr11);
$file_name=uniqid().'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['banner']['tmp_name'];
$final_path="../../../../app-assets/admin/contest_banner/".$file_name;
 $fpath=$file_name;
if (move_uploaded_file($file_tmp,$final_path))
  	{	
//  		echo "file uploaded<br>";
 $image=$file_name;
 $sql = "INSERT INTO `tbl_contest_master`(`name`, `cdescription`, `ctype`,`banner`, `scat`, `cby`, `closeon`) VALUES ('".$name."','".$cdescription."','".$ctype."','".$image."','".$scat."','".$cby."','".$closeon."')";
     if ($call_config->IDU($sql)) {
	 	$call_config->msg("Added Successfully!!","a Contest has been added","success","admin/","contest");
	 }
	 else
	 {
	 $call_config->msg("Failed!!","a row has been added","error","admin/","contest");	
	 }
 }
 else
 {
 	echo "Failed to upload image.".$_FILES["banner"]["error"];
}
}
else
 	{
 	$call_config->msg("Failed!!","Invalid action","error","","contest");	
 	}
}
?>