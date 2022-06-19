<?php
include('../../../../config.php');
$call_config = new config();
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
if(isset($_GET["id"]))
{
	$id=base64_decode(mysqli_escape_string($call_config->con,$_GET["id"]));
	$ql="UPDATE `tbl_contest_master` SET `uby`='".$sess_adm_data['sess_adm_id']."',`uon`='".date('Y-m-d H:i:s',time())."',`closeon`='".date('Y-m-d H:i:s',time())."' WHERE id='".$id."'";
    if ($call_config->IDU($ql)) {
    	$call_config->msg("Success!!","Contest Closed!!.","success","admin/contest/","");
    }
    else
    {
$call_config->msg("Failed!!",mysqli_error($call_config->con),"error","admin/contest/","");	
    }
}
?>