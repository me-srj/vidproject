<?php 
include("config.php");
try {
	$call_config->IDU("UPDATE `tbl_user_master` SET `cookie`=null,`cookie_pass`=null WHERE `cookie`='".$_COOKIE['vidpro_cookie']."'");
	  setcookie("vidpro_cookie", "", time() - 3600);
  setcookie("cookie_pass", "", time() - 3600);
} catch (Exception $e) {
	
}
  session_destroy();
 $call_config->msg("Logout!!","Logout Successfull!!","success","","");
?>