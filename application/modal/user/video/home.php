<?php
include('../../../../config.php');
$call_config = new config();  
$call_config->user_sess_checker();
$user_sess_data=$call_config->user_sess_data_bind();
$result = array('message' => '','status'=>false ,'id'=>"");
if (isset($_POST['choice'])) {
switch ($_POST['choice']) {
		case 'get':
$v=$call_config->get("SELECT * FROM `tbl_video_master` WHERE `publish`='publish' AND `status`='1' order by rand() limit 1");
$v['user_div']=$call_config->return_userdiv($v);
$videof=json_encode($v);
$call_config->mark_impression($v['id'],"normal");
print_r($videof);
		break;
			case 'pre':
$v=$call_config->get("SELECT * FROM `tbl_video_master` WHERE `publish`='publish' AND `status`='1' AND  id='".$_POST['id']."'");
$v['user_div']=$call_config->return_userdiv($v);
$videof=json_encode($v);
$call_config->mark_impression($_POST['id'],"normal");
print_r($videof);
		break;
case 'ads':
$v=$call_config->get("SELECT vtbl.*,vtbl.id as v_id,vtbl.thumbnail as thumbnail, vtbl.file as file,atbl.id as id FROM `tbl_video_master` as vtbl RIGHT join tbl_ads_video_list_master as atbl on vtbl.id = atbl.vid WHERE atbl.status='active' ORDER BY rand() LIMIT 1");
$v['user_div']=$call_config->return_userdiv($v);
$videof=json_encode($v);
$call_config->mark_impression($v['id'],"ads");
print_r($videof);
		break;
		case 'getads':
$video=$call_config->get("SELECT vtbl.*,vtbl.id as v_id,vtbl.thumbnail as thumbnail, vtbl.file as file,atbl.id as id FROM `tbl_video_master` as vtbl RIGHT join tbl_ads_video_list_master as atbl on vtbl.id = atbl.vid WHERE atbl.status='active' ORDER BY rand() LIMIT 1");
$category=$call_config->get("SELECT sub_category from tbl_scategory_master WHERE id='".$video['cat_id']."'");
$likes=$call_config->get("SELECT COUNT(*) as total from tbl_choice_master WHERE `vid`='".$video['v_id']."'");
$user=$call_config->get("SELECT * FROM tbl_user_master WHERE id='".$video['uid']."'");
$return_user_div='<ul class="float-left"><li style="margin-left: 10px;"><a id="user_link" href="'.$call_config->base_url().'application/view/user/userchannel/?id='.base64_encode($user['id']).'"><img id="user_img" class="img" src="'.$call_config->base_url().'app-assets/user/user_image/'.$user['photo'].'">&nbsp;<strong>'.$user['name'].'</strong></a></li><li style="margin-left: 25%;"><strong><a href="'.$call_config->base_url().'application/view/user/vedio_page/?id='.base64_encode($video['id']).'">'.$video['name'].'</a></strong></li><li style="margin-left: 25%;color: white;">'.$video['hashtag'].'</li><li style="margin-left: 25%;color: white;">'.$category['sub_category'].'</li></ul><ul class="float-right" style="position: absolute;margin-left: 70%;"><li><button id="skipvideobtn" onclick="skipads('.$video['v_id'].')" class="alert alert-info" style="display:none;position: absolute;">Skip!!</button></li></ul>';
$video['user_div']=$return_user_div;
echo json_encode($video);
		break;
	default:
$result['message']="default working.";
echo json_encode($result);
		break;
}
}
else
{
	$call_config->msg("Error!!","Error accessing url","error","","");
}
?>