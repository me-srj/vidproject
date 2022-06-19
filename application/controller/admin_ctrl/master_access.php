<?php
include('../../../configration/connection.php');
class master_access{
public $con;
 public function master_access()
 {
 	error_reporting(0);
    include('../../../configration/connection.php');
    	$this->con = $con;
    	session_start();
        if($this->con ==  false)
		{
			$this->session_flash();
		}
 }

 public function session_flash()
 {
 	session_start();
 	session_destroy();
 	?><script>alert('Access Denied...!');window.location='../view/login.php';</script><?php
 }

 public function slient_session_flash()
 {
 	session_start();
 	session_destroy();
 	?><script>window.location='../view/login.php';</script><?php
 }

 public function logout()
 {
 	session_start();
 	session_destroy();
 	?><script>alert('You are logout successfully...!');window.location='../view/login.php';</script><?php
 	
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
//Get All
 public function get_all($sql)
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

 //IDU
 public function IDU($sql)
 {
 	try{
 		if($sql == null || $sql == '')
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


} 

$call = new master_access();
// $data  = array('tafx' =>'4578' ,'tax_value_percent'=>'vks');
// $sql = "select * from tbl_tax_master";
// $a = $call->get_all($sql);
// echo "<pre>";
// print_r($a);
?>