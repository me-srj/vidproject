	<?php 
include('../../../config.php');
$call_config = new config();
$call_config->admin_sess_checker();
$sess_data_get = $call_config->adm_sess_data_bind();
?>

<?php
if(isset($_POST["submit"]))
{
	  $oldpassword = mysqli_escape_string($call_config->con,$_POST['oldpassword']);
	  $newpassword = mysqli_escape_string($call_config->con,$_POST['newpassword']);
	  $repassword = mysqli_escape_string($call_config->con,$_POST['repassword']);
	  $session = $sess_data_get["sess_adm_id"];
	if($newpassword == $repassword)
	{
		if ($oldpassword==$newpassword) {
$call_config->msg("Failed!!","Old and New Password are Same!!","error","admin/change_password/","");	

		}
				$str = "SELECT `password` FROM `tbl_admin_master` WHERE `id`='".$session."' ";
				$res = $call_config->get($str);
				if(md5($oldpassword) == $res['password'])
				{		
$update = "UPDATE `tbl_admin_master` SET `password`='".md5($newpassword)."' WHERE `id`='".$session."'";	
					if($call_config->IDU($update))
					{
$call_config->msg("Success!!","Password Updated Successfully.","success","admin/change_password/","");
					}
					else
					{
$call_config->msg("Failed!!","Updated Failed.","error","admin/change_password/","");	
					}			
				}
				else{
$call_config->msg("Failed!!","Old Password did not matched!!","error","admin/change_password/","");	
				}				
		}
		else{
$call_config->msg("Failed!!","Re-Enter Password match Failed!!","error","admin/change_password/","");	
		}



}

?>