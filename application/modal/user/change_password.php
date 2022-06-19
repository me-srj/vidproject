<?php 
include('../../../config.php');
$call_config = new config();
$call_config->user_sess_checker();
$sess_data_get = $call_config->user_sess_data_bind();
?>

<?php
if(isset($_POST["submit"]))
{
	   $oldpassword = mysqli_escape_string($call_config->con,$_POST['old']);
	   $newpassword = mysqli_escape_string($call_config->con,$_POST['new']);
	  $session = $sess_data_get["sess_user_id"];
	
		if ($oldpassword==$newpassword) {
$call_config->msg("Failed!!","Old and New Password are Same!!","error","user/change_password/","");	

		}
				$str = "SELECT `password` FROM `tbl_user_master` WHERE `id`='".$session."' ";
				$res = $call_config->get($str);
				if(md5($oldpassword) == $res['password'])
				{		
$update = "UPDATE `tbl_user_master` SET `password`='".md5($newpassword)."' WHERE `id`='".$session."'";	
					if($call_config->IDU($update))
					{
$call_config->msg("Success!!","Password Updated Successfully.","success","user/dashboard/","");
					}
					else
					{
$call_config->msg("Failed!!","Old and New Password are Same!!","info","user/change_password/","");	
					}			
				}
				else{
$call_config->msg("Failed!!","Old Password is Wrong!!","error","user/change_password/","");	
				}				
		
		


}

?>