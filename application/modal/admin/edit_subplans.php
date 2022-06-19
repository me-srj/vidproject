<?php
include('../../../config.php');
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
if(isset($_POST["submit"]))
{
	$id= $_POST['id'];
	$name= $_POST['name'];
	$price= $_POST['price'];
	 $size= $_POST['size'];
	 $duration= $_POST['duration'];
	 $length= $_POST['length'];
	$uby=$sess_adm_data["sess_adm_email"];
	// $closeon= $_POST['closeon'];
	if( $name != ''   || $name != null )
	{
			$sql = "UPDATE `tbl_subscription_plans_master` SET `name`='".$name."',`price`='".$price."',`size`='".$size."',`length`='".$length."',`duration`='".$duration."',`uby`='".$uby."' WHERE `id`='".$id."'";
     if ($call_config->IDU($sql)) {
	 	$call_config->msg("Updated Successfully!!","Details has been updated","success","admin/","Subscription_Plans");
	 }
	 else
	 {
	 $call_config->msg("Failed!!","a row has been update","warning","admin/","Subscription_Plans");	
	 }
}
else
 	{
 	$call_config->msg("Failed!!","Invalid action","error","","Subscription_Plans");	
 	}
}
?>