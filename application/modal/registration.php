<?php 
include('../../config.php');
$call_config = new config(); 
if(isset($_POST["submit"]))
{
	  $name=mysqli_escape_string($call_config->con,$_POST['name']);
	 $password=mysqli_escape_string($call_config->con,$_POST['password']);
	 $mobile=mysqli_escape_string($call_config->con,$_POST['mobile']);
	 $email=mysqli_escape_string($call_config->con,$_POST['email']);
	if ($_FILES["image"]["name"]!=null) {
//code to upload customer image
$arr11=explode(".",$_FILES['image']['name']);
$lenarr11=count($arr11);
$file_name=uniqid().'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['image']['tmp_name'];
$final_path="../../app-assets/user/user_image/".$file_name;
 $fpath=$file_name;
if (move_uploaded_file($file_tmp,$final_path))
  	{	
$image=$file_name;
$tbl_user_master="INSERT INTO `tbl_user_master` (`name`,`username`,`password`,`mobile`,`email`,`photo`,`cby`) VALUES ('".$name."','".$email."','".md5($password)."','".$mobile."','".$email."','".$image."','".$email."')";


if ($call_config->IDU($tbl_user_master))
 {
 	$call_config->msg("Success!!"," Successfull ","success","index.php","");
}
else{
	$call_config->msg("Success!!","Sorry","error","register.php"," ");

}
 }
 }
 else
 {
 	$image="";
 	echo "Failed to upload image.".$_FILES["image"]["error"];
}
}
?>