	<?php 
include('../../../config.php');
 $call_config->cmg_sess_checker();
$cmg_sess_data=$call_config->cmg_sess_data_bind();
?>

<?php
if(isset($_POST["submit"]))
{
	  $oldpassword = mysqli_escape_string($call_config->con,$_POST['oldpassword']);
	  $newpassword = mysqli_escape_string($call_config->con,$_POST['newpassword']);
	  $repassword = mysqli_escape_string($call_config->con,$_POST['repassword']);
	  $session = $cmg_sess_data["sess_cmg_id"];
	if($newpassword == $repassword)
	{
		if ($oldpassword==$newpassword) {
$call_config->msg("Failed!!","Old and New Password are Same!!","error","content_manager/change_password/","");	

		}
				$str = "SELECT `password` FROM `tbl_content_manager_master` WHERE `id`='".$session."' ";
				$res = $call_config->get($str);
				if(md5($oldpassword) == $res['password'])
				{		
$update = "UPDATE `tbl_content_manager_master` SET `password`='".md5($newpassword)."' WHERE `id`='".$session."'";	
					if($call_config->IDU($update))
					{
$call_config->msg("Success!!","Password Updated Successfully.","success","content_manager/change_password/","");
					}
					else
					{
$call_config->msg("Failed!!","Updated Failed.","error","content_manager/change_password/","");	
					}			
				}
				else{
$call_config->msg("Failed!!","Old Password did not matched!!","error","content_manager/change_password/","");	
				}				
		}
		else{
$call_config->msg("Failed!!","Re-Enter Password match Failed!!","error","content_manager/change_password/","");	
		}



}

?>