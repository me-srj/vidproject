<?php
include('../../../config.php');
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
 $result = array('status' => false,"message"=>"" );
 $id=mysqli_escape_string($call_config->con,$_POST['id']);
 $name=mysqli_escape_string($call_config->con,$_POST['scategory']);
  $category=mysqli_escape_string($call_config->con,$_POST['category']);
$img = $_POST['img'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$fileData = base64_decode($img);
$fname=uniqid().".png";
$fileName = '../../../app-assets/admin/scat_img/'.$fname;
//$fileName = $name;
if (file_put_contents($fileName, $fileData)) {
 $sql="UPDATE `tbl_scategory_master` SET `sub_category`='".$name."',`category_id`='".$category."',`img`='".$fname."',`uby`='".$sess_adm_data['sess_adm_email']."' WHERE `id`='$id'";
if ($call_config->IDU($sql)) {
$result['status']=true;
$result['message']="Edited successfully!!";
	}
	else
	{
	$result['status']=false;
$result['message']="Failed to edit subcategory!!";
	}
}
else
{
		$result['status']=false;
$result['message']="Failed to get image!!";
}

echo json_encode($result);

?> 