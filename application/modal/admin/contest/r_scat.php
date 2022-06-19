<?php
include('../../../../config.php');
$call_config = new config();

if($_POST["cat"])
{
	$id=mysqli_escape_string($call_config->con,$_POST["cat"]);
	$scat="SELECT * FROM `tbl_scategory_master` WHERE `category_id`='".$id."' ";
    $result = mysqli_query($call_config->con, $scat);
    while($op = mysqli_fetch_array($result))
    {
    echo "<option value=".$op['id'].">".$op["sub_category"]."</option>";
     }
}
?>