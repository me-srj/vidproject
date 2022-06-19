<?php
include('../../../../config.php');
$call_config->user_sess_checker();
$sess_user_data=$call_config->user_sess_data_bind();
$id=$sess_user_data["sess_user_id"];
 $name=mysqli_escape_string($call_config->con,$_POST['name']);
 $bio=mysqli_escape_string($call_config->con,$_POST['bio']);
 $username=mysqli_escape_string($call_config->con,$_POST['username']);
 $nickname=mysqli_escape_string($call_config->con,$_POST['nickname']);
 $dob=mysqli_escape_string($call_config->con,$_POST['dob']);
 $gender=mysqli_escape_string($call_config->con,$_POST['gender']);
 $address=mysqli_escape_string($call_config->con,$_POST['address']);
 $city=mysqli_escape_string($call_config->con,$_POST['city']);
 $state=mysqli_escape_string($call_config->con,$_POST['state']);
 $country=mysqli_escape_string($call_config->con,$_POST['country']);
 $facebook=mysqli_escape_string($call_config->con,$_POST['facebook']);
 $twitter=mysqli_escape_string($call_config->con,$_POST['twitter']);
 $instagram=mysqli_escape_string($call_config->con,$_POST['instagram']);
 $linkedin=mysqli_escape_string($call_config->con,$_POST['linkedin']);
 $currentimg=mysqli_escape_string($call_config->con,$_POST['currentimg']);
 $fimg=$_FILES['image']['name']; 
if($fimg !=null){
//code to upload account manager image
$arr11=explode(".",$_FILES['image']['name']);
$lenarr11=count($arr11);
$file_name=uniqid().'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['image']['tmp_name'];
$final_path="../../../../app-assets\user\user_image/".$file_name;
 $fpath=$file_name;
if (move_uploaded_file($file_tmp,$final_path))
  	{	
//  		echo "file uploaded<br>";
 $image=$file_name;
 }
 else
 {
 	echo "Failed to upload image.".$_FILES["image"]["error"];
}
}
else
{
	$image=$currentimg;
}
$sql='UPDATE `tbl_user_master` SET `name`="'.$name.'",`bio`="'.$bio.'",`username`="'.$username.'",`photo`="'.$image.'",`nickname`="'.$nickname.'",`dob`="'.$dob.'",`gender`="'.$gender.'",`address`="'.$address.'",`city`="'.$city.'",`state`="'.$state.'",`country`="'.$country.'",`facebook`="'.$facebook.'",`twitter`="'.$twitter.'",`instagram`="'.$instagram.'",`linkedin`="'.$linkedin.'",`uby`="'.$id.'" WHERE `id`="'.$id.'"';
//echo $res;
if ($call_config->IDU($sql)) {
	echo "success";
	}
	else
	{
		echo "invalid";
	}

?>