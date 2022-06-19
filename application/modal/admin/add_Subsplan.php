<?php
include('../../../config.php');
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
  $name=mysqli_escape_string($call_config->con,$_POST['name']);
 $price=mysqli_escape_string($call_config->con,$_POST['price']);
 $size=mysqli_escape_string($call_config->con,$_POST['size']);
 $length=mysqli_escape_string($call_config->con,$_POST['length']);
 $duration=mysqli_escape_string($call_config->con,$_POST['duration']);
 $cby=$sess_adm_data["sess_adm_email"];
 $sql="INSERT INTO `tbl_subscription_plans_master`( `name`, `price`, `size`, `length`, `duration`, `cby`) VALUES ('".$name."','".$price."','".$size."','".$length."','".$duration."','".$cby."');";
if ($call_config->IDU($sql)) {
$call_config->msg('Saved!!',"Plan Added successfully!!",'success','admin/Subscription_Plans/','');
	}
	else
	{
		echo "Failed to insert".mysqli_error($call_config->con);
	}

?>