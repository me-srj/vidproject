<?php
include('../../../../config.php');
$call_config = new config();
$call_config->user_sess_checker();
$sess_data_get = $call_config->user_sess_data_bind();
$result = array('status' => false,'message'=>'');
if (isset($_POST['choice'])) {
switch ($_POST['choice']) {
	case 'contest':
		$_SESSION['vid']=$_POST['vid'];
		$result['status']=true;
		print_r(json_encode($result))
		break;
	
	default:
	print_r(json_encode($result));
		break;
}
}