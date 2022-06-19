
   <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
         
<div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tax</h4>
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
                <div class="card-content  collapse show">
                    <div class="card-body card-dashboard">
                        <div class="float-right">
                        <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">ADD CONTEST</button> --><?PHP  date_default_timezone_set('Asia/Kolkata'); $c_date=date('yy-m-d H:i:s');?>
                    </div>
<div class="table-responsive">
                            <table class="table table-striped table-bordered file-export">
                               <thead>
                                        <tr>
                                          <th>S.No.</th>
                                            <th>Name</th>
                                            <th>Video</th>
                                            <th>Type</th>
                                            <th>Vote</th>
                                            <th>Devote</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                                      <tbody>
                                       <?php 
                                       
                                   $sql="SELECT a.*,b.thumbnail,b.file,b.name,c.closeon FROM `tbl_contest_video_master` AS a JOIN tbl_video_master AS b ON a.vid=b.id JOIN tbl_contest_master AS c ON c.id=a.contestid WHERE a.contestid='".$contestid."' ";
                                   $i=0;
                                        $result = mysqli_query($call_config->con, $sql);
                                        // Associative array
                                        
                                        while($row = mysqli_fetch_array($result))
                                        {
                                           $get_vote=$call_config->get_all("SELECT COUNT(*) as vote FROM `tbl_contest_vote_master` WHERE uid='1' AND vid='".$row['vid']."' ");
                                           $get_devote=$call_config->get_all("SELECT COUNT(*) as devote FROM `tbl_contest_vote_master` WHERE uid='2' AND vid='".$row['vid']."' ");
                                      if($row['closeon']>=$c_date)
                                      {
                                        $status='NONE';
                                      }
                                      else{
                                      $status='<button class="btn btn-sm btn-primary">Make Winner</button>';
                                  }
                                      echo '<tr><td>'.++$i.'</td>
                                      <td>' . $row["name"]. '</td>
                                      
                                        <td><a href="'.$call_config->base_url().'videos/'.$row["file"].'" target="_blank"><img src="'.$call_config->base_url().'thumbnail/'.$row["thumbnail"].'" style="height:30px;width:70px;">
                                        </a></td>
                                        <td>' . $row["contestpayment"]. '</td>
                                        <td>' . $get_vote[0]['vote']. '</td>
                                        <td>' . $get_devote[0]['devote']. '</td>
                                        <td>' . $status. '</td></tr>'; 
                                   
                                  //       $conn->close();
                                       ?>
                                    
                                    
                                    <!-- START Edit MODAL -->
<!-- <div class="modal fade text-left" id="edit<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-primary">
<h4 class="modal-title" id="myModalLabel17">Edit Tax</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form class="needs-validation" enctype="multipart/form-data" method="POST" action="<?php echo $call_config->base_url() ?>application/modal/admin/contest/edit_contest.php">
<div class="modal-body">
<label for="tax">Name</label>
<input type="text" name="name" class="form-control" value="<?php echo $row['name']?>" required>
<label for="taxvaluep">Description</label>
<textarea name="cdescription" class="form-control" required><?php echo $row['cdescription']?></textarea>
<label for="taxvaluep">Amount</label>
<input type="number" name="ctype" class="form-control" value="<?php echo $row['ctype']?>" required>
<label for="taxvaluep">Category</label>
<select name="cat" class="form-control" id="cat2" required>
  <option value="<?php echo $row['cid']?>"><?php echo $row['cat']?></option>
  <optgroup>
    <?php $rt="SELECT * FROM `tbl_category_master`";
    $result2 = mysqli_query($call_config->con, $rt);
     while($row2 = mysqli_fetch_array($result2))
                                        { ?>
    <option value="<?php echo $row2['id'];?>"><?php echo $row2['cname'];?></option>
  <?php }?>
  </optgroup>
</select>
<label for="taxvaluep">Sub Category</label>
<select name="scat" class="form-control" required>
  <optgroup id="scat2">
    <option value="<?php echo $row['scat']?>"><?php echo $row['sub_category']?></option>
  </optgroup>
</select>
<label>Banner</label>
<input type="file" name="banner" class="form-control" >
<input type="hidden" name="pbanner" value="<?= $row['banner'] ?>">
<label for="taxvaluep">Close ON</label>
<input type="datetime-local" name="closeon" class="form-control" id="datetime" value="<?php echo $row['close']?>" required>
</div>
<input type="hidden" name="id" value="<?php echo $row['id']?>">
<div class="modal-footer">
<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger" name="submit">Save</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div> -->
<!-- END Edit MODAL -->
<?php } ?>
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
<!-- START ADD MODAL -->
<!-- Modal -->
<!-- <div class="modal fade text-left" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-success">
<h4 class="modal-title" id="myModalLabel17">Add Contest</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form class="needs-validation" enctype="multipart/form-data" method="POST" action="<?php echo $call_config->base_url() ?>application/modal/admin/contest/add_contest.php">
<div class="modal-body">
<label for="tax">Name</label>
<input type="text" name="name" class="form-control" required>
<label for="taxvaluep">Description</label>
<textarea name="cdescription" class="form-control" required></textarea>
<label for="taxvaluep">Amount</label>
<input type="number" name="ctype" class="form-control" required>
<label for="taxvaluep">Category</label>
<select name="cat" class="form-control" id="cat" required>
  <option value="">Select Option</option>
  <optgroup>
    <?php $rt="SELECT * FROM `tbl_category_master`";
    $result2 = mysqli_query($call_config->con, $rt);
     while($row2 = mysqli_fetch_array($result2))
                                        { ?>
    <option value="<?php echo $row2['id'];?>"><?php echo $row2['cname'];?></option>
  <?php }?>
  </optgroup>
</select>
<label for="taxvaluep">Sub Category</label>
<select name="scat" class="form-control" required>
  <option value="">Select Option</option>
  <optgroup id="scat">
  </optgroup>
</select>
<label>Banner</label>
<input type="file" name="banner" class="form-control" required="">
<label for="taxvaluep">Close ON</label>
<input type="datetime-local" name="closeon" class="form-control" id="datetime" required />
</div>
<div class="modal-footer">
<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger" name="submit">Save</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div> -->
<!-- END ADD MODAL -->
<!-- <script type="text/javascript">
  $(document).ready(function(){
 $("#cat").on('change',function(){
     var cat = $("#cat").val();
    // alert(cat);
    $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/contest/r_scat.php' ?>',
  type:'POST',
  data:{cat:cat},
  success:function(data){
    $("#scat").html(data);
  }
});
});
 $("#cat2").on('change',function(){
     var cat = $("#cat2").val();
   //  alert(cat);
    $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/contest/r_scat.php' ?>',
  type:'POST',
  data:{cat:cat},
  success:function(data){
    $("#scat2").html(data);
  }
});
});
});
</script> -->



