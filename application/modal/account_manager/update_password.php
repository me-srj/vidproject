	<?php 
include('../../../config.php');
$call_config->amg_sess_checker();
$amg_sess_data=$call_config->amg_sess_data_bind();
?>

<?php
if(isset($_POST["submit"]))
{
	  $oldpassword = mysqli_escape_string($call_config->con,$_POST['oldpassword']);
	  $newpassword = mysqli_escape_string($call_config->con,$_POST['newpassword']);
	  $repassword = mysqli_escape_string($call_config->con,$_POST['repassword']);
	  $session = $amg_sess_data["sess_amg_id"];
	if($newpassword == $repassword)
	{
		if ($oldpassword==$newpassword) {
$call_config->msg("Failed!!","Old and New Password are Same!!","error","account_manager/change_password/","");	

		}
				$str = "SELECT `password` FROM `tbl_account_manager_master` WHERE `id`='".$session."' ";
				$res = $call_config->get($str);
				if(md5($oldpassword) == $res['password'])
				{		
$update = "UPDATE `tbl_account_manager_master` SET `password`='".md5($newpassword)."' WHERE `id`='".$session."'";	
					if($call_config->IDU($update))
					{
$call_config->msg("Success!!","Password Updated Successfully.","success","account_manager/change_password/","");
					}
					else
					{
$call_config->msg("Failed!!","Updated Failed.","error","account_manager/change_password/","");	
					}			
				}
				else{
$call_config->msg("Failed!!","Old Password did not matched!!","error","account_manager/change_password/","");	
				}				
		}
		else{
$call_config->msg("Failed!!","Re-Enter Password match Failed!!","error","account_manager/change_password/","");	
		}



}

?>