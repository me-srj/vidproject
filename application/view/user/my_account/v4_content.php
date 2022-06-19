<div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="top-category section-padding mb-4">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                        <h6>My Account</h6>
                        </div>
                     </div>
                  </div>
               </div>
<div class="table-responsive">
           <table class="table table-hover">
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Video</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Views</th>
                    <th>Comments</th>
                    <th>Like/Dislike</th>
                    <th>Edit</th>
                 </tr>
              </thead>
              <tbody>
               <?php
$all=$call_config->get_all("SELECT * FROM `tbl_video_master` WHERE `uid`='".$user_sess_data['sess_user_id']."' and `status`='1'");
$i=1;
foreach ($all as $video) {
  $views=$call_config->get("SELECT COUNT(*) as total FROM tbl_video_impression_master WHERE `vid`='".$video['id']."' AND `uid`='".$user_sess_data['sess_user_id']."'");
?>
                 <tr>
                    <td><?= $i++; ?></td>
                    <td><?php
if ($video['thumbnail']==null||$video['thumbnail']=="") {
   ?>
   <div class="imgplace text-white text-center" style="height: 60px;">N/A</div>
   <?php
}
else
{
?>
<img style="height: 60px;width: 100px;" src="<?= $call_config->base_url() ?>thumbnail/<?= $video['thumbnail'] ?>" alt="File not found.">
<?php
}
                    ?></td>
                    <td><b><?= $video['name'] ?></b><br><i style="font-size: 10px;"><?= $video['description'] ?></i></td>
                    <td><?php
if ($video['verification']=="1") {
   ?><button class="btn btn-light text-success">Verified</button>
   <?php
}
else
{
 ?><button class="btn btn-light text-danger">Not-Verified</button>
   <?php  
}
                    ?>
                 <?php
if ($video['publish']=="publish") {
   ?><button class="btn btn-light text-success">Published</button>
   <?php
}
else if($video['publish']=="not")
{
 ?><button class="btn btn-light text-danger">Not-Published</button>
   <?php  
}
else
{
   ?>
   <button class="btn btn-info text-dark">In-verification</button>
   <?php
}

                    ?></td>
                    <td><p class="video-view"><?= $views['total'] ?>&nbsp;Views</p></td>
                    <td>
<?php
$comment=$call_config->get("SELECT COUNT(*) as total FROm tbl_comment_master WHERE vid='".$video['id']."'");
?>
<p class="video-view"><?= $comment['total'] ?>&nbsp;Comments</p>
                    </td>
                    <td>
                       <?php
$like=$call_config->get("SELECT COUNT(*) as total FROm tbl_choice_master WHERE vid='".$video['id']."' and ctype='1'");
$dislike=$call_config->get("SELECT COUNT(*) as total FROm tbl_choice_master WHERE vid='".$video['id']."' and ctype='0'");
?>
<p class="video-view text-success"><?= $like['total'] ?>&nbsp;Likes</p>
<br>
<p class="video-view test-primary"><?= $dislike['total'] ?>&nbsp;Dis-Likes</p>
                    </td>
                    <td>
<a class="btn btn-warning" href="<?= $call_config->base_url() ?>application/view/user/edit_video/?id=<?= base64_encode($video['id']) ?>">Edit</a>
                    </td>
                 </tr>
<?php
}
               ?>
              </tbody>
           </table>
           </div>
            </div>
            <!-- /.container-fluid -->