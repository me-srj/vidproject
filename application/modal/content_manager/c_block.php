<?php 
include('../../../config.php');
$call_config = new config();
$call_config->cmg_sess_checker();
$cmg_sess_data=$call_config->cmg_sess_data_bind();
$a_id=$cmg_sess_data['sess_cmg_email'];
if($_POST['data']){
$data= $_POST['data'];
 $sql="UPDATE `tbl_user_master` SET `status`='0',`uby`='".$a_id."' WHERE `id`='".$data."' ";
if($call_config->IDU($sql)){
	echo "success";
}
else{
	echo "false";
}
}
?>  