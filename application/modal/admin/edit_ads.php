<?php
include('../../../config.php');
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
 $id=mysqli_escape_string($call_config->con,$_POST['id']);
 $uby=$sess_adm_data["sess_adm_id"];
 $name=mysqli_escape_string($call_config->con,$_POST['name']);
 $imp=mysqli_escape_string($call_config->con,$_POST['imp']);
 $price=mysqli_escape_string($call_config->con,$_POST['price']);

$sql="UPDATE `tbl_ads_plan_master` SET `name`='".$name."',`impressions`='".$imp."',`price`='".$price."',`uby`='".$sess_adm_data["sess_adm_id"]."' WHERE `id`='".$id."'";
// $res;
if ($call_config->IDU($sql)) {
$call_config->msg('Success!!',"Ads updated successfully!!",'success','admin/manage_ads/','');
	}
	else
	{
		echo "Failed to update".mysqli_error($call_config->con);
	}

?>
</body>
</html>