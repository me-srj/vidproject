 <!-- BEGIN: Content-->
<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
            </div>
      <!-- Multi-column ordering table -->
<div class="content-body"> 
<section id="multi-column">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Vedio list</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>

                </div>

                <div class="card-content collapse show">

                    <div class="card-body card-dashboard">
<div class="col-md-12"><button type="button" class="btn btn-primary float-right" data-toggle="modal" data-keyboard="false" data-target="#keyboard1">+</button>
<div class="modal fade text-left" id="keyboard1" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel3" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title" id="basicModalLabel3">Add Audio</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            </div>
<div class="modal-body">
<form enctype="multipart/form-data" method="POST" action="<?= $call_config->base_url() ?>application/modal/content_manager/add_audio.php" class="row">
    <div class="col-md-12">
        <label>Audio File</label>
        <br>
        <input class="form-control form-group" type="file" name="audio" accept="audio/*">
    </div>
    <div class="col-md-12">
        <label>Title</label>
        <br>
        <input class="form-control form-group" type="text" maxlength="70" minlength="1" name="title">
    </div>
<div class="col-md-12">
<center><button type="submit" class="btn btn-success">Save</button></center>
</div>
</form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
</div>


                        <div class="table-responsive">
                                    <!-- modal ends -->
 <table class="table table-striped table-bordered file-export">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Title</th>
                                        <th>View</th>
                                        <th>Created On</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
<tbody>
<?php
$i=0;
$sql="SELECT *  FROM `tbl_audio_master`";
$result = mysqli_query($call_config->con, $sql);
while($row = mysqli_fetch_array($result))
{     ?>
<tr role="row" class="odd">
    <td class="sorting_1"><?php echo ++$i ;?></td>
    <td><?php echo $row["title"] ?></td>
    <td>
   <a href="<?= $call_config->base_url() ?>audio/<?php echo $row["afile"] ?>" class="btn btn-sm btn-glow btn-success">View</a>   
    </td>
    <td><?= $row['con'] ?></td>
    <td><a class="deletelink btn btn-danger btn-sm" href="<?= $call_config->base_url() ?>application/modal/content_manager/delete_audio.php?id=<?= base64_encode($row['id']) ?>">Delete</a></td>
</tr>
</div>
</div>
</div>
<!-- END Edit MODAL -->
<?php

}
?>
</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
 $(".deletelink").on('click',function(e){
    e.preventDefault();
if (confirm("Are you sure!!")) 
{
    window.location=e.currentTarget.href;
}
     });
});
</script> 