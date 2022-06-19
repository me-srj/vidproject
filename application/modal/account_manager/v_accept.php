<?php 
include('../../../config.php');
$call_config = new config();
$call_config->amg_sess_checker();
$amg_sess_data=$call_config->amg_sess_data_bind();
$a_id=$amg_sess_data['sess_amg_email'];
if($_POST['data']){
$data= $_POST['data'];
 $sql="UPDATE `tbl_user_master` SET `verification`='1',`vby`='".$a_id."' WHERE `id`='".$data."' ";
if($call_config->IDU($sql)){
 $call_config->add_noti($data,"Accepted!","Your's Welcome in Our Plateform");
//echo	mysqli_error($call_config->con);
	echo "success";
}
else{
	echo "false";
}
}
?>