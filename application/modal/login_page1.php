<?php 
include('../../config.php');
$call_config = new config(); 
if(isset($_POST["submit"]))
{
	 $param1 = mysqli_escape_string($call_config->con,$_POST['_email']);
	 $password = mysqli_escape_string($call_config->con,$_POST['_password']);
	 $key = mysqli_escape_string($call_config->con,$_POST['_key']);
	if( $param1 != ''   || $param1 != null    || 
		$password != '' || $password != null  ||
		$key != ''      || $key != null       		
		)
	{
		switch($key)
		{
			case 1: // admin

				$str = "select * from tbl_admin_master where  email = '".$param1."' ";
				$res = $call_config->get($str);
				if($password == $res['password'])
				{
					// session_start();					
					$_SESSION['sess_adm_id']    = $res["id"];
					$_SESSION['sess_adm_name']  = $res["name"];
					$_SESSION['sess_adm_mobile']= $res["mobile"];
					$_SESSION['sess_adm_email']=$res['email'];
					$_SESSION['sess_adm_img'] = $res["image"];
			$call_config->msg("Success!!","Login Successfull as ADMIN!!","success","admin/","dashboard/");
				}else{
					?>

					<script>alert("Invalid email or password admin...!")</script>

					<?php
					$res = $call_config->slient_session_flash();
				}
				break;				
			case 2: // account manager login code

				$str = "SELECT * FROM `tbl_account_manager_master` WHERE email = '".$param1."' and status = 1 ";
				$res = $call_config->get($str);
				if($password == $res['password'])
				{
					// session_start();					
					$_SESSION['sess_amg_id']    = $res["id"];
					$_SESSION['sess_amg_name']  = $res["name"];
					$_SESSION['sess_amg_email']= $res["email"];
					$_SESSION['sess_amg_img'] = $res["image"];
			$call_config->msg("Success!!","Login Successfull as Account manager!!","success","account_manager/","dashboard/");					
				}else{	

					?>
					<script>alert("Invalid email or password account...!")</script>
					<?php
					$res = $call_config->slient_session_flash();
				}				
				break;
				case 3: // content manager

				$str = "SELECT * FROM `tbl_content_manager_master` WHERE email = '".$param1."' and status = 1 ";
				$res = $call_config->get($str);
				if($password == $res['password'])
				{
					// session_start();					
					$_SESSION['sess_cmg_id']    = $res["id"];
					$_SESSION['sess_cmg_name']  = $res["name"];
					$_SESSION['sess_cmg_email']= $res["email"];
					$_SESSION['sess_cmg_img'] = $res["image"];
			$call_config->msg("Success!!","Login Successfull as Content Manager!!","success","content_manager/","dashboard/");					
				}else{	

					?>
					<script>alert("Invalid email or password content...!")</script>
					<?php
					$res = $call_config->slient_session_flash();
				}				
				break;
			case 4: //user login code
			    $str = "SELECT * FROM `tbl_user_master` WHERE email = '".$param1."' and status = '1'";
				$res = $call_config->get($str);
				if($password == $res['password'])
				{
					// session_start();					
					$_SESSION['sess_user_id']    = $res["id"];
					$_SESSION['sess_user_name']  = $res["name"];
					$_SESSION['sess_user_email']= $res["email"];
					$_SESSION['sess_user_img']=$res['photo'];
					$call_config->user_subs_check();
			$call_config->msg("Success!!","Login Successfull!!","success","user/","dashboard/");
					
				}else{
					?><script>alert("Invalid email or password...!")</script><?php
					$res = $call_config->slient_session_flash();
				}				
			break;
			default: 
					$res = $call_config->slient_session_flash();
					$call_config->msg("Failed!!","Invalid URL!!","info","","");
		}

	}else{

	}



}else{
	?><script>alert("not submited...!")window.location = "<?php echo $call_config->base_url(); ?>application/view/";</script><?php
}


?>