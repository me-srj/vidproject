<?php include('../../../../config.php');
$call_config = new config(); 
$call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();
$id=$_POST['id'];
  $vid=$call_config->get("SELECT id,file,thumbnail FROM `tbl_video_master` where  id >= '".$id."'");
$vid['file']=$call_config->base_url()."videos/".$vid['file'];
$vid['thumbnail']=$call_config->base_url()."thumbnail/".$vid['thumbnail'];
$_SESSION['vid']=$vid['id'];
echo json_encode($vid);
?>
                 
                   