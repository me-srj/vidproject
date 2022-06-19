<?php
include('../../../config.php');
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
$id=mysqli_escape_string($call_config->con,$_POST['id']);
$uby=$sess_adm_data["sess_adm_id"];
$name=mysqli_escape_string($call_config->con,$_POST['name']);
$email=mysqli_escape_string($call_config->con,$_POST['email']);
$mobile=mysqli_escape_string($call_config->con,$_POST['mobile']);
$address=mysqli_escape_string($call_config->con,$_POST['address']);

$sql="UPDATE `tbl_account_manager_master` SET `name`='".$name."',`mobile`='".$mobile."',`email`='".$email."',`address`='".$address."',`uby`='".$sess_adm_data["sess_adm_id"]."' WHERE `id`='".$id."'";
//echo $res;
if ($call_config->IDU($sql)) {
$call_config->msg('Success!!',"Details update successfully!!",'success','admin/a_manager/','');
	}
	else
	{
		echo "Failed to update".mysqli_error($call_config->con);
	}

?>
</body>
</html>