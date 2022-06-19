<?php
include('../../../config.php');
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
$id=$sess_adm_data["sess_adm_id"];
$name=mysqli_escape_string($call_config->con,$_POST['name']);
$currentimg=mysqli_escape_string($call_config->con,$_POST['currentimg']);
 $fimg=$_FILES['image']['name']; 
if($fimg !=null){
//code to upload account manager image
$arr11=explode(".",$_FILES['image']['name']);
$lenarr11=count($arr11);
$file_name=uniqid().'.'.$arr11[$lenarr11-1];
$file_tmp=$_FILES['image']['tmp_name'];
$final_path="../../../app-assets\admin\admin_image/".$file_name;
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
$sql="UPDATE `tbl_admin_master` SET `name`='".$name."',`image`='".$image."',`uby`='".$sess_adm_data["sess_adm_id"]."' WHERE `id`='".$sess_adm_data["sess_adm_id"]."'";
//echo $res;
if ($call_config->IDU($sql)) {
$call_config->msg('Success!!',"Admin update successfully!!",'success','admin/profile/','');
	}
	else
	{
		echo "Failed to update".mysqli_error($call_config->con);
	}

?>
</body>
</html>