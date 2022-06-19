<?php 
include('../../../config.php');
$call_config = new config();
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
$a_id=$sess_adm_data['sess_amg_email'];
if($_POST['data']){
$data= $_POST['data'];
 $sql="UPDATE `tbl_subscription_plans_master` SET `status`='1' WHERE `id`='".$data."' ";
if($call_config->IDU($sql)){
	echo "success";
}
else{
	echo "false";
}
}
?>