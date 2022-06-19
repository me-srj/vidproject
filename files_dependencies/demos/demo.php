<?php
require_once('../getid3/getid3.php');
 $getID3 = new getID3();
 $filename="../../videos/5f30f742431a7.mp4";
    // Scan file - should parse correctly if file is not corrupted
// Analyze file and store returned data in $ThisFileInfo
$ThisFileInfo = $getID3->analyze($filename);

/*
 Optional: copies data from all subarrays of [tags] into [comments] so
 metadata is all available in one location for all tag formats
 metainformation is always available under [tags] even if this is not called
*/
$getID3->CopyTagsToComments($ThisFileInfo);
//print_r($getID3);
print_r($ThisFileInfo);
// $datetime1 = new DateTime('2019-11-30 11:55:06');//start time
// $datetime2 = new DateTime('now');//end time
// $interval = $datetime1->diff($datetime2);
// //echo $diff=$interval->format('%Y years %m months %d days %H hours %i minutes %s seconds').'<br>';
// $time= array('year' => $interval->format('%Y'),'month'=>$interval->format('%m'),'day'=>$interval->format('%d'),'hour'=>$interval->format('%H'),'minute'=>$interval->format('%i'),'second'=>$interval->format('%s'));
// //print_r($time);
// if ($time['year']!="00") {
// 	echo $time['year']." Y ago";
// }
// else
// {
// if ($time['month']!="0") {
// 	echo $time['month']." M ago";
// }
// else
// {
// if ($time['day']!="0") {
// 	echo $time['day']." D ago";
// }
// else
// {
// if ($time['hour']!="00") {
// 	echo $time['hour']." Hr ago";
// }
// else
// {
// if ($time['minute']!="0") {
// 	echo $time['minutes']." Mi ago";
// }
// else
// {
// 	echo $time['second']." S ago";	
// }	
// }	
// }	
// }	
// }
?>