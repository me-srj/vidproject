<?php
include('../../../config.php');
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
 $name=mysqli_escape_string($call_config->con,$_POST['name']);
$arr11=explode(".",$_FILES['img']['name']);
$lenarr11=count($arr11);
$file_name=uniqid().'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['img']['tmp_name'];
$final_path="../../../app-assets/admin/category_img/".$file_name;
 $fpath=$file_name;
if (move_uploaded_file($file_tmp,$final_path))
  	{	
 $img=$file_name;
 }
 else
 {
 	echo "Failed to upload image.".$_FILES["cimage"]["error"];
}

 $sql="INSERT INTO `tbl_category_master`(`cname`,`image`,`cby` ) VALUES ('".$name."','".$img."','".$sess_adm_data['sess_adm_email']."')";

if ($call_config->IDU($sql)) {
$call_config->msg('Saved!!',"Category Added successfully!!",'success','admin/category/','');
	}
	else
	{
		echo "Failed to insert".mysqli_error($call_config->con);
	}

?>