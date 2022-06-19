<?php
include('../../../../config.php');
$call_config = new config();
$call_config->user_sess_checker();
$sess_data_get = $call_config->user_sess_data_bind();
$result = array('status' => false,'message'=>'');
if (isset($_POST['ch'])) {
switch ($_POST['ch']) {
	case 'devote':
	 $vid=mysqli_escape_string($call_config->con,$_POST['vid']);
	 $comment=mysqli_escape_string($call_config->con,$_POST['comment']);
	 $uid=$sess_data_get['sess_user_id'];
	 $sql="INSERT INTO `tbl_comment_master`(`uid`, `vid`, `comment`, `con`) VALUES ('".$uid."','".$vid."','".$comment."','".date('Y-m-d H:i:s',time())."')";
		
		
		

		if ($call_config->IDU($sql)) {
		$result['status']=true;
		$result['message']="Commented";
		}
		else
		{
		$result['status']=false;
		$result['message']="failed to Comment";	
		}
	print_r(json_encode($result));
		break;
		case 'getcomment':
		
	 $vid=mysqli_escape_string($call_config->con,$_POST['vid']);
	 $uid=$sess_data_get['sess_user_id'];
	   
	  $sql="SELECT c.*,u.photo,u.name FROM `tbl_comment_master` as c 
       left join tbl_user_master as u on c.uid = u.id where c.vid ='".$vid."' order by c.uon DESC";
	 $row=$call_config->get_all($sql);

		 print_r($row);  

	   
		break;

		case 'delete':
	    $vid=mysqli_escape_string($call_config->con,$_POST['vid']);
		$uid=$sess_data_get['sess_user_id'];
		$id=mysqli_escape_string($call_config->con,$_POST['id']);
		if ($call_config->IDU("DELETE FROM `tbl_comment_master` WHERE uid='$uid' and vid='$vid' and id='$id'")) 
		{
		$result['status']=true;
		$result['message']="Deleted!";
		}
		else
		{
		$result['status']=false;
		$result['message']="Failed to Delete!!";	
		}
	print_r(json_encode($result));
		break;
	default:
		echo "default";
		break;
}
}

?>