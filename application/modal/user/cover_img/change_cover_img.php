<?php
include('../../../../config.php');
$call_config->user_sess_checker();
$sess_user_data=$call_config->user_sess_data_bind();
$id=$sess_user_data["sess_user_id"];

 echo$fimg=$_FILES['image']['name']; 
if($fimg !=null){
//code to upload account manager image
$arr11=explode(".",$_FILES['image']['name']);
$lenarr11=count($arr11);
$file_name=uniqid().'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['image']['tmp_name'];
$final_path="../../../../app-assets/user/cover_img/".$file_name;
 $fpath=$file_name;
if (move_uploaded_file($file_tmp,$final_path))
  	{	
  		echo "file uploaded<br>";
 $image=$file_name;
 }
 else
 {
 	echo "Failed to upload image.".$_FILES["image"]["error"];
}
}
$sql='UPDATE `tbl_user_master` SET `cover_photo`="'.$image.'" WHERE `id`="'.$id.'"';
//echo $res;
if ($call_config->IDU($sql)) {
	echo "success";
	}
	else
	{
		echo "invalid";
	}

?>