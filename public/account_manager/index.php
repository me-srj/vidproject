<?php
// error_reporting(0);
include("../../config.php");
$call_config = new config();

 $content = 'v4_content.php';
include('v1_HeadPart.php');
include('v2_TopNavBar.php');
 include('v3_sidebar.php');
include($content);
include('v5_customizer_setting.php');
include('v6_Footer.php');

?>




