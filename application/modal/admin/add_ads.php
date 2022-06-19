<?php
include('../../../config.php');
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
 $name=mysqli_escape_string($call_config->con,$_POST['name']);
$impression=mysqli_escape_string($call_config->con,$_POST['impression']);
$price=mysqli_escape_string($call_config->con,$_POST['price']);
 $cby=$sess_adm_data["sess_adm_id"];




// send password in the mail to the account manager




 $sql="INSERT INTO `tbl_ads_plan_master`(`name`, `impressions`, `price`,`cby`) VALUES ('".$name."','".$impression."','".$price."','".$cby."')";
if ($call_config->IDU($sql)) {
$call_config->msg('Saved!!',"Ads Saved successfully!!",'success','admin/manage_ads/','');
	}
	else
	{
		echo "Failed to insert".mysqli_error($call_config->con);
	}

?>
</body>
</html>