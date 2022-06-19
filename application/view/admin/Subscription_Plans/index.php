<?php
 include("../../../../config.php");
 $call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();

 include('../../../../public/admin/v1_HeadPart.php');
 include('../../../../public/admin/v2_TopNavBar.php');
 include('../../../../public/admin/v3_sidebar.php');
 include('v4_content.php');
 
include('../../../../public/admin/v5_customizer_setting.php');
include('../../../../public/admin/v6_Footer.php');
 ?>
