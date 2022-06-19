<?php
include('../../../config.php');
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
 $name=mysqli_escape_string($call_config->con,$_POST['name']);
  $id=mysqli_escape_string($call_config->con,$_POST['id']);

 $arr11=explode(".",$_FILES['image']['name']);
$lenarr11=count($arr11);
$file_name=uniqid().'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['image']['tmp_name'];
$final_path="../../../app-assets/admin/category_img/".$file_name;
 $fpath=$file_name;
if (move_uploaded_file($file_tmp,$final_path))
  	{	
  $img=$file_name;
 }
 else
 {
 	echo "Failed to upload image.".$_FILES["image"]["error"];
}
$sql="UPDATE `tbl_category_master` SET `cname`='".$name."',`image`='".$img."',`uby`='".$sess_adm_data['sess_adm_email']."' WHERE id='".$id."'";
if ($call_config->IDU($sql)) 
{
$call_config->msg('Saved!!',"Category Updated successfully!!",'success','admin/category/','');
	}
	else
	{
		$call_config->msg('No Change',"You Have made no changes to Save!!",'info','admin/category/','');
	}

?>