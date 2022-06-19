<?php

include("../../../../config.php");
error_reporting(0);
$call_config->user_sess_checker();
 $id=$_POST['id'];
/*function get_total_row($connect)
{
  $query = "
  SELECT * FROM tbl_webslesson_post
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  return $statement->rowCount();
}

$total_record = get_total_row($connect);*/

$limit = '12';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

$query = "SELECT b.*  FROM `tbl_contest_video_master` as a RIGHT JOIN tbl_video_master as b ON b.id=a.vid WHERE a.`contestid`='".$id."' AND status='1'";

if($_POST['query'] != '')
{
  $query .= '
   AND name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
  ';
}

$query .= ' ORDER BY id DESC 
 ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';
// $statement = $call_config->con->query($query);
//$statement->execute();
$statement=mysqli_query($call_config->con,$query);
$total_data=mysqli_num_rows($statement);

// $statement = $call_config->con->prepare($filter_query);
// $statement->execute();
$statement=mysqli_query($call_config->con,$filter_query);
$result = mysqli_fetch_all($statement,MYSQLI_ASSOC);
$total_filter_data = mysqli_num_rows($statement);
require_once('../../../../files_dependencies/getid3/getid3.php');
 $getID3 = new getID3();
$output = '
<h6>Videos ('.$total_data.')</h6>
                        </div>
                     </div>
            </div>
<div class="row">
';
if($total_data > 0)
{
  foreach($result as $row)
  {
    $ThisFileInfo = $getID3->analyze('../../../../videos/'.$row['file']);
$category=$call_config->get("SELECT sub_category FROM `tbl_scategory_master` Where `id`='".$row['cat_id']."'");
    $output .= '
    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a class="play-icon" href="'.$call_config->base_url().'application/view/user/contest_video_page/?id='.base64_encode($row["id"]).'"><i class="fas fa-play-circle"></i></a>
                              <a href="#"><img class="img-fluid" src="'.$call_config->base_url().'/thumbnail/'.$row["thumbnail"].'" alt="" style="height: 196px;width: 100%;"></a>
                              <div class="time">'.$call_config->get_time($ThisFileInfo['playtime_seconds']) .'</div>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#">'.$row["name"].'</a>
                              </div>
                              <div class="video-page text-success">
                                 '.$category["sub_category"].'  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                              </div>
                              <div class="video-view">
                                 '.$views["total"].' &nbsp;<i class="fas fa-calendar-alt"></i>  '.$call_config->get_time_difference("now",$row["con"]).'
                              </div>
                           </div>
                        </div>
                     </div>
    ';
  }
}
else
{
  $output .= '
    <div colspan="2" align="center">No Data Found</div>
  ';
}

$output .= '
</div>
<br />
<div align="center">
  <ul class="pagination">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;

?>