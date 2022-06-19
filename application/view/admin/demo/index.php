<?php
 // error_reporting(0);
 include("../../../../config.php");
 $call_config = new config();
$call_config = new config();

 $content = '../../../../public/admin/v4_content.php';
include('../../../../public/admin/v1_HeadPart.php');
include('../../../../public/admin/v2_TopNavBar.php');
 include('../../../../public/admin/v3_sidebar.php');
include($content);
include('../../../../public/admin/v5_customizer_setting.php');
include('../../../../public/admin/v6_Footer.php');
?>