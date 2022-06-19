<?php
 // error_reporting(0);
 include("../../../../config.php");
 $call_config->cmg_sess_checker();
$cmg_sess_data=$call_config->cmg_sess_data_bind();

include('../../../../public/content_manager/v1_HeadPart.php');
include('../../../../public/content_manager/v2_TopNavBar.php');
include('../../../../public/content_manager/v3_sidebar.php');
include('v4_content.php');
include('../../../../public/content_manager/v5_customizer_setting.php');
include('../../../../public/content_manager/v6_Footer.php');
?>