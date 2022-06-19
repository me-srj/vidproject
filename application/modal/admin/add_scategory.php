<?php
include('../../../config.php');
$call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
 $result = array('status' => false,"message"=>"" );
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
 $sql="INSERT INTO `tbl_scategory_master`(`sub_category`,`img`, `category_id`, `cby` ) VALUES ('".$name."','".$fname."','".$category."','".$sess_adm_data['sess_adm_email']."')";
if ($call_config->IDU($sql)) {
$result['status']=true;
$result['message']="Added successfully!!"; 
	}
	else
	{
	$result['status']=false;
$result['message']="Failed to add subcategory!!";
	}
}
else
{
		$result['status']=false;
$result['message']="Failed to get image!!";
}

echo json_encode($result);

?> 