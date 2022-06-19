<?php
include('../../../../config.php');
$call_config->amg_sess_checker();
$amg_sess_data=$call_config->amg_sess_data_bind();
$content = 'v4_content.php';
include('../../../../public/account_manager/v1_HeadPart.php');
include('../../../../public/account_manager/v2_TopNavBar.php');
 include('../../../../public/account_manager/v3_sidebar.php');
include($content);
include('../../../../public/account_manager/v5_customizer_setting.php');
include('../../../../public/account_manager/v6_Footer.php');

?>
 