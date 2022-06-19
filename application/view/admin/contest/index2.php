<?php
 // error_reporting(0);
 include("../../../../config.php");
 $call_config = new config();
$contestid = base64_decode($_GET['id']);
 $content = 'v4_content2.php';
include('../../../../public/admin/v1_HeadPart.php');
include('../../../../public/admin/v2_TopNavBar.php');
 include('../../../../public/admin/v3_sidebar.php');
include($content);
include('../../../../public/admin/v5_customizer_setting.php');
include('../../../../public/admin/v6_Footer.php');
?>