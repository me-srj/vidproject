<?php 
session_start(); 
class config{

	  public  $localhost = "localhost";
      public  $user = "root";
	  public  $password = "";
	  public  $dbname = "vidproject";
	  public  $con;

	public function __construct()
	{
	   
	    //error_reporting(0);	
	    date_default_timezone_set('Asia/Kolkata');
	   $this->con =  mysqli_connect($this->localhost,$this->user,$this->password,$this->dbname); 
	   if($this->con != true)
		{
			echo "Database is not connected.";	
			exit();	
		}
	}
	public function base_url()
	{ 
		
		$set_base_url = "/vidproject/";                                           // set base url....
		$server_host = "http://".$_SERVER['HTTP_HOST']."";
		$final_base_url =  $server_host.$set_base_url;
		return $final_base_url;
	}
public function cookiecheck()
{ 
	$bool=false;
if(!isset($_COOKIE['vidpro_cookie'])) {
//  echo "Cookie is not set!";
} 
else 
{
$str="SELECT * FROM `tbl_user_master` WHERE `cookie`='".$_COOKIE['vidpro_cookie']."'";
				$res = $this->get($str);
				if($_COOKIE['cookie_pass'] == $res['cookie_pass'])
				{
					
					$_SESSION['sess_user_id']    = $res["id"];
					$_SESSION['sess_user_name']  = $res["name"];
					$_SESSION['sess_user_email']= $res["email"];
    				$_SESSION['sess_user_mobile']=$res['mobile'];
$bool=true;
echo "<script>window.location='".$this->base_url()."application/view/user/home/'</script>";
//$this->msg("Welcome!!","","success","user/","dashboard/");					
}
}
return $bool;
}
function mark_impression($vid,$type)
{
return $this->IDU("INSERT INTO `tbl_video_impression_master`(`uid`, `vid`, `type`, `con`) VALUES ('".$_SESSION['sess_user_id']."','".$vid."','".$type."','".date('Y-m-d H:i:s',time())."')");
}
function return_userdiv($video)
{
$category=$this->get("SELECT sub_category from tbl_scategory_master WHERE id='".$video['cat_id']."'");
$culike=$this->get("SELECT * from tbl_choice_master WHERE `uid`='".$_SESSION['sess_user_id']."' AND `vid`='".$video['id']."'");
$likes=$this->get("SELECT COUNT(*) as total from tbl_choice_master WHERE `vid`='".$video['id']."'");
$user=$this->get("SELECT * FROM tbl_user_master WHERE id='".$video['uid']."'");
if ($culike['id']==null||$culike['id']=="") {
  $liked=false;
}
else
{
  $liked=true;
}
$likes=$this->get("SELECT COUNT(*) as total from tbl_choice_master WHERE `vid`='".$video['id']."'");
$user=$this->get("SELECT * FROM tbl_user_master WHERE id='".$video['uid']."'");
if ($liked) 
{
$likedislikeli='<i id="choicebtn" onclick="choice()" value="liked" name="'.$video['id'].'" style="color: red;" class="fas fa-heart"></i>';
}
else
{
$likedislikeli='<i id="choicebtn" onclick="choice()" value="like" name="'.$video['id'].'" style="color: #a2a2a2a2;" class="fas fa-heart"></i>';
}

$output='<ul class="float-left" style="list-style-type: none;">
<li style="margin-left: -30px;"><a id="user_link" href="'.$this->base_url().'application/view/user/userchannel/?id='.base64_encode($user['id']).'"><img id="user_img" style="width: 40px;border-radius: 50%;height: 35px;border: 2.5px solid whitesmoke;" class="img" src="'.$this->base_url().'app-assets/user/user_image/'.$user['photo'].'">&nbsp;<strong>'.$user['name'].'</strong></a></li>
<li style="margin-left: 10%;"><strong><a href="'.$this->base_url().'application/view/user/vedio_page/?id='.base64_encode($video['id']).'">'.$video['name'].'</a></strong></li>
    <li style="margin-left: 10%;color:white;">'.$video['hashtag'].'</li>
    <li style="margin-left: 10%;color:white;">'.$category['sub_category'].'</li>
  </ul>
  <ul class="float-right" style="list-style-type: none;position: absolute;margin-left: 60%;">
    <li><button id="skipbtn" onclick="skipads()" class="alert alert-info" style="position: absolute;display: none;">Skip!!</button></li>
    <li style="margin-left: 5px;font-size: 250%;">
'.$likedislikeli.'
    </li>
    <li id="likes_count">'.$likes['total'].' Likes</li>
  </ul>';
  return $output;
}
public function get_vendor_id()
{
$status=false;
while ($status==false) {
	$generator = "A1B2C3D4E5F6G7H8I9J0KLMNPQRSTUVWXYZ"; 
    $result = date("Ymd")."-"; 
  
    for ($i = 1; $i <= 6; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    }  
    $sql="SELECT * FROM `tbl_supplier_master` where `vid`='".$result."'";
    $ans=mysqli_query($this->con,$sql);
    if (mysqli_affected_rows($this->con)>0) {
    	$status=false;
    }
    else
    {
$status=true;
    }
	}
return $result;
}
// alert type== success,error,warning,info,question
public function msg($alert,$msg,$type,$path,$path2)
{
	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<script src='<?php echo $this->base_url() ?>app-assets/admin/vendors/js/vendors.min.js' type='text/javascript'></script>
	<script src='<?php echo $this->base_url() ?>app-assets/admin/vendors/js/extensions/sweetalert2.all.js' type='text/javascript'></script>
	<script>
	swal('<?= $alert;?>','<?= $msg;?>','<?= $type;?>',{button: 'Okay',})
       .then((value)=>{
         window.location='<?= $this->base_url(); ?>application/view/<?= $path.$path2;?>';
       })
    </script>
</body>
</html>
    <?php 

}
public function get_time($time)
{
//time in seconds
	if ($time<60) {
return '00:'.str_pad(number_format($time), 2, '0', STR_PAD_LEFT);;
	}
	else if($time<3600)
	{
$minute=str_pad(number_format($time), 2, '0', STR_PAD_LEFT);
$remainder=str_pad(fmod($time,60), 2, '0', STR_PAD_LEFT);
return $minute.":".$remainder;
	}
	else
	{
$minute=str_pad(number_format($time/60), 2, '0', STR_PAD_LEFT);
$hour=str_pad(number_format($minute/60), 2, '0', STR_PAD_LEFT);
$mr=str_pad(fmod($minute, 60), 2, '0', STR_PAD_LEFT);
$remainder=str_pad(fmod($time, 60), 2, '0', STR_PAD_LEFT);
return $hour.":".$mr.":".$remainder;
	}
}
public function get_subs($number)
{
$length=strlen($number);
if ($number < 999) {
    // Anything less than a thousand
 echo   $format = number_format($number);
} 
else if ($number < 99999999) {
 echo   $format = number_format($number/1000,2)."K";
} 
else if ($number < 1000000000) 
{
  echo  $format = number_format($number / 1000000, 2) . 'M';
} 
else 
{
  echo  $format = number_format($number / 1000000000, 2) . 'B';
}	
}
public function get_diff($time1,$time2,$choice)
{
$difference=strtotime($time2)-strtotime($time1);
switch ($choice) 
{
	case 'm':
		return str_replace(",","", number_format($difference/60));
		break;
	case 'M':		
	return str_replace(",", "", number_format($difference/60));
		break;
	case 's':
		return $difference;
		break;
	case 'S':
		return $difference;
		break;
	default:
	//default will not return anything
		break;
}
}
public function get_time_difference($time1,$time2)
{
$datetime1 = new DateTime($time1);//start time
$datetime2 = new DateTime($time2);//end time
$interval = $datetime1->diff($datetime2);
//echo $diff=$interval->format('%Y years %m months %d days %H hours %i minutes %s seconds').'<br>';
$time= array('year' => $interval->format('%Y'),'month'=>$interval->format('%m'),'day'=>$interval->format('%d'),'hour'=>$interval->format('%H'),'minute'=>$interval->format('%i'),'second'=>$interval->format('%s'));
//print_r($time);
if ($time['year']!="00") {
	return $time['year']." Years ago";
}
else
{
if ($time['month']!="0") {
	return $time['month']." Months ago";
}
else
{
if ($time['day']!="0") {
	return $time['day']." Days ago";
}
else
{
if ($time['hour']!="00") {
	return $time['hour']." Hours ago";
}
else
{
if ($time['minute']!="0") {
	return $time['minute']." Minutes ago";
}
else
{
	return $time['second']." Seconds ago";	
}	
}	
}	
}	
}
}
 public function session_flash() 
 { 
    
 	session_destroy();
 	?>
 	<script>alert('Access Denied.d...!');
 	window.location = "<?php echo $this->base_url(); ?>index.html";
 	</script>
 	<?php
 }

 public function slient_session_flash()
 {
 	
 	session_destroy();
 	?><script>
 		window.location = "<?php echo $this->base_url(); ?>index.html";
 	</script>
 	<?php
 }
 

//============================================ SESSION CHECKER ===================================================================//
 //=> for admin
 public function adm_sess_data_bind()
 {
		// session_start(); 
			$sess_admin = array(
				        'sess_adm_id' =>$_SESSION['sess_adm_id'] ,
				        'sess_adm_name'=>$_SESSION['sess_adm_name'],
				        'sess_adm_mobile'=>$_SESSION['sess_adm_mobile'],
				        'sess_adm_email'=>$_SESSION['sess_adm_email'],
				        'sess_adm_img'=>$_SESSION['sess_adm_img']
			            );
			return $sess_admin;
				
 }
 public function admin_sess_checker()
 {
 	// session_start(); 
 	if($_SESSION['sess_adm_id'] != '' || $_SESSION['sess_adm_id'] != null)
 	{
 		$sql = "select * from tbl_admin_master where id = '".$_SESSION['sess_adm_id']."' ";
 		$res = $this->get($sql);
 		if($res['email'] != $_SESSION['sess_adm_email'] || $res['mobile'] != $_SESSION['sess_adm_mobile'])
 		{
 		   $this->session_flash();
 		   die;
 		}
 	}else{
 		$this->session_flash();
 		die;
 	}
 //	return true;;
 }

 //=>for account manager
 public function cmg_sess_data_bind()
 {
		// session_start(); 
			$sess_acc = array(
				        'sess_cmg_id' =>$_SESSION['sess_cmg_id'] ,
				        'sess_cmg_name'=>$_SESSION['sess_cmg_name'],
				        'sess_cmg_email'=>$_SESSION['sess_cmg_email'],
				        'sess_cmg_img'=>$_SESSION['sess_cmg_img']				        
			            );
			return $sess_acc;
				
 }
 public function cmg_sess_checker()
 {
 	// session_start(); 
 	if($_SESSION['sess_cmg_id'] != '' || $_SESSION['sess_cmg_id'] != null)
 	{
 		$sql = "SELECT * FROM `tbl_account_manager_master` where id = '".$_SESSION['sess_cmg_id']."' ";
 		$res = $this->get($sql);
 		if($res['email'] != $_SESSION['sess_cmg_email'])
 		{
 		   $this->session_flash();
 		   die;
 		}
 	}else{
 		$this->session_flash();
 		die;
 	}
 }
//=>for account manager
 public function amg_sess_data_bind()
 {
		// session_start(); 
			$sess_acc = array(
				        'sess_amg_id' =>$_SESSION['sess_amg_id'] ,
				        'sess_amg_name'=>$_SESSION['sess_amg_name'],
				        'sess_amg_email'=>$_SESSION['sess_amg_email'],
				        'sess_amg_img'=>$_SESSION['sess_amg_img']				        
			            );
			return $sess_acc;
				
 }
 public function amg_sess_checker()
 {
 	// session_start(); 
 	if($_SESSION['sess_amg_id'] != '' || $_SESSION['sess_amg_id'] != null)
 	{
 		$sql = "SELECT * FROM `tbl_account_manager_master` where id = '".$_SESSION['sess_amg_id']."' ";
 		$res = $this->get($sql);
 		if($res['email'] != $_SESSION['sess_amg_email'])
 		{
 		   $this->session_flash();
 		   die;
 		}
 	}else{
 		$this->session_flash();
 		die;
 	}
 }
 //=>for product manager
 public function user_sess_data_bind()
 {
		// session_start(); 
			$sess_acc = array(
				        'sess_user_id' =>$_SESSION['sess_user_id'] ,
				        'sess_user_name'=>$_SESSION['sess_user_name'],
				        'sess_user_email'=>$_SESSION['sess_user_email'],
				        'sess_user_mobile'=>$_SESSION['sess_user_mobile'],
			            );
			return $sess_acc;
				
 }
 public function user_sess_checker()
 {
 	// session_start(); 
 	if($_SESSION['sess_user_id'] != '' || $_SESSION['sess_user_id'] != null)
 	{
 		$sql = "SELECT * FROM `tbl_user_master` where id = '".$_SESSION['sess_user_id']."' ";
 		$res = $this->get($sql);
 		if($res['email'] != $_SESSION['sess_user_email'])
 		{
 		   $this->session_flash();
 		   die;
 		}
 	}else{
 		$this->session_flash();
 		die;
 	}
 }
 

 //IDU
 public function IDU($sql)
 {
 	try{
 		if($sql != null || $sql != '')
 		{
 			  $res = mysqli_query($this->con,$sql);
 			  if($res)
 			  {
 			  	 $y =  mysqli_affected_rows($this->con);
 			  	 if($y > 0)
 			  	 {
 			  	 	return true;
 			  	 }else{
 			  	 	return false;
 			  	 }
 			  }else{
 			  	 	return false;
 			  }
 		}else{
 			return false;;
 		}

 	}catch(exception $e){
 		return false;
 	}
 }

 //insert
 public function insert($tbl_name,$data=array())
 {
 	try{
	  if(count($data) > 0)
	  {
 		$str1 = "insert into ".$tbl_name;$str2 = "(";$str3 = '';$str4 =  ")";$str5 = " values";$str6 = " (";$str7 = '';$str8 =  ")";
 		 $k = '';
 		 $v = '';
 		 $i=0;
 		 foreach ($data as $key)
 		 {
 		   if($i == count($data)-1){
	              $k.= array_keys($data,$key)[0];
	 		 	  $v.= "'".$key."'";
 		 	}else{
	              $k.= array_keys($data,$key)[0].", ";
	 		 	  $v.= "'".$key."', ";
 		 	}
 		 	$i++; 		
 		 }
 	     $sql = $str1.$str2.$k.$str4.$str5.$str6.$v.$str8;
 		if($sql != '')
 		{
 		  $res = mysqli_query($this->con,$sql);
 		  if($res)
 		  {
 		  	 return mysqli_affected_rows($this->con);
 		  	}else{
 		  	 return 0;
 		  	}
 		 
 		}	
	 }	
 	}catch(exception $e){
 		return 0;
 	}
 }


 //Get one
 public function get($sql)
 {
 	try{
		$x = mysqli_query($this->con,$sql);
		if($x)
		{
           return mysqli_fetch_assoc($x);
		}else{
			return array();
		}
 	}catch(exception $e){
 		return array();
 	}
 }

public function send_sms($mobile,$mess)
{
        $no = urlencode('+91'.$mobile);
    $mess = rawurlencode($mess);
      // Send the GET request with cURL
    $ch = curl_init('http://sms.xolohost.com/submitsms.jsp?user=pvtest&key=4ca25cb591XX&mobile='.$no.'&message='.$mess.'&senderid=PVTEST&accusage=1');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

}
//code to send message ends here

  //Get all using sql query    ----- return an array(2D) use foreach
 public function get_all($sql)
 {
 	try{
 		//$result[];
 		$x = mysqli_query($this->con,$sql);
 	    $result=mysqli_fetch_all($x, MYSQLI_ASSOC);
 	    // do
 	    // {
 	    // 	$result[]=mysqli_fetch_assoc($x);
 	    // }while(mysqli_fetch_assoc($x));
           
          return $result;
 	}
 	catch(exception $e){
 		return $e;
 	}
 }
 public function user_subs_check()
 {
 	$user=$this->get("SELECT * FROM `tbl_user_master` WHERE `id`='".$_SESSION['sess_user_id']."'");
 	$subs=$this->get("SELECT * FROM `tbl_subscription_plans_master` WHERE `id`='".$user['subscription']."'");
 	$current_subs=$this->get("SELECT * FROM `tbl_subscription_buy_master` WHERE `sid`='".$user['subscription']."' AND `uid`='".$_SESSION['sess_user_id']."' AND `astatus`='active'");
 	if (empty($current_subs)||$current_subs['id']==""||$current_subs['id']==null) {
//no data in the row
 		$this->IDU("UPDATE `tbl_user_master` SET `subscription`='1' WHERE `id`='".$_SESSION['sess_user_id']."'");
 	}
 	else
 	{
 if (strtotime($current_subs['von'])>strtotime(date('Y-m-d H:i:s',time()))) {
 //current subs is active nothing to worry
 	//echo "string";
 	}
 	else
 	{
//user subs has been ended noe this function will update the subs of user
 		$this->IDU("UPDATE `tbl_user_master` SET `subscription`='1' WHERE `id`='".$_SESSION['sess_user_id']."'");
 	}
 	}
 }
 //function for show Videos
public function dash_videos()
{
	$uid=$_SESSION['sess_user_id'];
	$sql1="SELECT DISTINCT c.* FROM `tbl_choice_master` a JOIN tbl_video_master AS c ON a.vid=c.id JOIN tbl_user_follow_master as d ON c.uid=d.fuid WHERE d.uid='".$uid."' AND a.ctype='1' AND 4>=(SELECT COUNT(DISTINCT ctype) FROM tbl_choice_master b Where b.ctype >= a.ctype) ORDER BY c.con DESC";
	$sql2="SELECT DISTINCT c.* FROM `tbl_choice_master` a JOIN tbl_video_master AS c ON a.vid=c.id WHERE a.ctype='1' AND 4>=(SELECT COUNT(DISTINCT ctype) FROM tbl_choice_master b WHERE b.ctype >= a.ctype) ORDER BY c.con DESC";
	$sql3="SELECT a.* FROM `tbl_video_master` AS a LEFT JOIN tbl_user_follow_master AS b ON a.uid=b.fuid WHERE b.uid='".$uid."' ORDER BY a.con DESC LIMIT 2";
	$sql4="SELECT a.* FROM `tbl_video_master` AS a LEFT JOIN tbl_user_follow_master AS b ON a.uid=b.fuid WHERE b.fuid!='".$uid."' ORDER by a.con DESC LIMIT 12";
	$res1=$this->get_all($sql1);
	$res2=$this->get_all($sql2);
	$res3=$this->get_all($sql3);
	$res4=$this->get_all($sql4);
	$res=array_merge($res1,$res2,$res3,$res4);
	$result = array( );
 $vd_arr=array_map("unserialize",array_unique(array_map("serialize",$res)));
 return $dash_vid=array_slice($vd_arr, 0, 12,true);
 //print_r($dash_vid);
}
public function paypal()
{
define('PAYPAL_API_CLIENT_ID', 'AZnwklUw7k94fi5OVwckOvNh_dgns9xjbxTj03mshHVV0FW9SqwqRbIZ8-KuehyoqZ-pmhICrUcvhyzN');  
define('PAYPAL_API_SECRET', 'EF0VA2oIAaO0WKoao8I7v3Oi0z7B4XkNrqFHMWpinHXNGQPwl1lylb1JfQaUj3LHf6F-gBjkSm3UBKx1'); 
define('PAYPAL_SANDBOX', true); 
}
public function add_noti($uid,$head,$message)
{
$uid=mysqli_escape_string($this->con,$uid);
$head=mysqli_escape_string($this->con,$head);
$message=mysqli_escape_string($this->con,$message);
	if ($this->IDU("INSERT INTO `tbl_notification_master`(`uid`, `notihead`, `notimess`,`con`) VALUES ('".$uid."','".$head."','".$message."','".date('Y-m-d H:i:s',time())."')")) 
	{
	return true;
	}
	else
	{

return mysqli_error($this->con); 
	}
}
}
$call_config= new config();
//echo $call_config->get_diff("2020-08-01 18:28:27","2020-08-02 18:29:00","m");
//echo $call_config->get_time(5060);
//$call_config->get_subs("177000000");
//echo $call_config->get_vendor_id();
//print_r($call_config->get_all("SELECT * FROM `tbl_admin_master`"));
//$result=$call_config->get_all("SELECT * FROM `tbl_accountant_manager_master`");
//print_r($result);
//foreach ($result as $key) {
//	echo $key["id"];
//}
//echo  $referal_res=$call_config->referal_function_master('ASDHIK','1000');
//print_r($referal_res);
 //echo $a = $call_config->base_url();
//echo $call_config->create_referal_code();
//print_r($call_config->get_refered_by_detalis('ASDHIK'));
?>

