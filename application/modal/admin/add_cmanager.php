<?php
include('../../../config.php');
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
 $name=mysqli_escape_string($call_config->con,$_POST['name']);
$email=mysqli_escape_string($call_config->con,$_POST['email']);
$Phone=mysqli_escape_string($call_config->con,$_POST['Phone']);
$address=mysqli_escape_string($call_config->con,$_POST['address']);

// generate account manager password

$today = date('YmdHi');
$startDate = date('YmdHi', strtotime('2012-03-14 09:06:00'));
$range = $today - $startDate;
$pas = rand(0, $range);
$password=md5($pas);

// generate account manager password end

 $fimg=$_FILES['image']['name']; 
if($fimg !=null){
//code to upload account manager image
$arr11=explode(".",$_FILES['image']['name']);
$lenarr11=count($arr11);
$file_name=uniqid().'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['image']['tmp_name'];
$final_path="../../../app-assets\c_manager/".$file_name;
 $fpath=$file_name;
if (move_uploaded_file($file_tmp,$final_path))
  	{	
  		// "file uploaded<br>";
 echo $image=$file_name;
 }
 else
 {
 	 "Failed to upload image.".$_FILES["image"]["error"];
}
}
else
{
	echo "failed to upload image";
}

// send password in the mail to the account manager




 $sql="INSERT INTO `tbl_content_manager_master`(`name`, `password`, `mobile`, `email`, `address`, `image`) VALUES ('".$name."','".$password."','".$Phone."','".$email."','".$address."','".$image."')";
if ($call_config->IDU($sql)) {
$call_config->msg('Saved!!',"Account Manager Added successfully!!",'success','admin/c_manager/','');
	}
	else
	{
		echo "Failed to insert".mysqli_error($call_config->con);
	}

?>
</body>
</html>