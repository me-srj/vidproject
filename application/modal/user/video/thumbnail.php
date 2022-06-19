<?php
include('../../../../config.php');
$call_config = new config(); 
$call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();
$result = array('status' => false,'message'=>'' );
if (isset($_POST['file'])&&isset($_POST['id'])) 
{
$id=mysqli_escape_string($call_config->con,$_POST['id']);
$img = $_POST['file'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$fileData = base64_decode($img);
$name=uniqid().".png";
$fileName = '../../../../thumbnail/'.$name;
//$fileName = $name;
file_put_contents($fileName, $fileData);
if ($call_config->IDU("UPDATE `tbl_video_master` SET `thumbnail`='".$name."' WHERE `id`='".$id."'")) {
$result['status']=true;
$result['message']="Thumbnail uploaded successfully!!";
echo json_encode($result);
}
else
{
$result['status']=false;
$result['message']="Thumbnail uploaded failed!!";
echo json_encode($result);
}
}
else
{
$result['status']=false;
$result['message']="Failed to get data!!";
echo json_encode($result);
}
?>