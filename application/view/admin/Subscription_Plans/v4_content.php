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
                    <h4 class="card-title">Subscription Plans list</h4>
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
                      <div class="float-right">
           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">ADD New</button>
                    </div>
                    <!-- Modal -->
<div id="add" class="modal fade text-left" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
 <div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-success">
<h4 class="modal-title" id="myModalLabel17">Add Subscription Plan</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" action="<?php echo $call_config->base_url() ?>application/modal/admin/add_Subsplan.php" enctype="multipart/form-data">
<div class="modal-body">

  
  <div class="form-group">  
<label for="tax" class="control-label">Name of the Plan</label>
<input type="text" name="name" class="form-control" placeholder="Enter Plan Name" required>
</div>
 <div class="form-group">  
<label for="tax" class="control-label">Price</label>
<input type="text" name="price" class="form-control"placeholder="In RS" onkeypress="return isNumber(event)" required>
</div>
 <div class="form-group">  
<label for="tax" class="control-label">Size of the video in this plan</label>
<input type="text" name="size" class="form-control" placeholder="In MB" onkeypress="return isNumber(event)" required>
</div>

<div class="form-group">  
<label for="tax" class="control-label">Length of the video in this plan</label>
<input type="text" name="length" class="form-control" placeholder="In Sec" onkeypress="return isNumber(event)" required>
</div>

 <div class="form-group">  
<label for="tax" class="control-label">Duration of this plan In Months</label>
<input type="text" name="duration" class="form-control" placeholder="In Months" onkeypress="return isNumber(event)" required>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger" name="submit">Save</button>
</form>
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
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Size (In MB)</th>
                                        <th>Lenth</th>
                                        <th>Plan Duration</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                                      <tbody>
                                    <?php
                                    $i=0;
$result = $call_config->get_all("SELECT * from tbl_subscription_plans_master");
foreach ($result as $row) {   
  ?>
<tr role="row" class="odd">
    <td class="sorting_1"><?php echo ++$i ;?></td>
    <td><?= $row["name"] ?></td>
    <td>RS <?= $row['price'] ?></td>
    <td><?= $row["size"]."   MB" ?></td>
    <td><?= $row["length"]?> Sec</td> 
    <td><?= $row["duration"]?> Month</td>    
    <td><?php
    if($row['status']=='1'){
        ?>
        <button class="btn btn-success btn-sm Block" id="<?php echo $row['id']?>">Block</button>
    <?php }
    else{
        ?>
        <button class="btn btn-danger btn-sm Unblock" id="<?php echo $row['id']?>">Unblock</button>
        <?php
    }
    ?>
    </td>
     <td><a href="#" class="btn btn-primary btn-sm ft-edit-2 user_update" value="" data-toggle="modal" data-target="#edit<?php echo $row["id"];?>"></a></td>
                                    <!-- START Edit MODAL -->
<div class="modal fade text-left" id="edit<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
 <div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-success">
<h4 class="modal-title" id="myModalLabel17">Update Subscription Plan</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" action="<?php echo $call_config->base_url() ?>application/modal/admin/edit_subplans.php" enctype="multipart/form-data">
<div class="modal-body">
   
  <div class="form-group">  
<label for="tax" class="control-label">Name</label>
<input type="text" name="name" class="form-control" value="<?= $row['name'];?>" placeholder="Enter Plan Name" required>
</div>
 <div class="form-group">  
<label for="tax" class="control-label">Price</label>
<input type="text" name="price" class="form-control"placeholder="In RS" required onkeypress="return isNumber(event)" value="<?= $row['price'];?>">
</div>
 <div class="form-group">  
<label for="tax" class="control-label">Size</label>
<input type="text" name="size" class="form-control" placeholder="In MB" onkeypress="return isNumber(event)" required value="<?= $row['size'];?>">
</div>
<div class="form-group">  
<label for="tax" class="control-label">Length </label>
<input type="text" name="length" class="form-control" placeholder="In Sec" onkeypress="return isNumber(event)" value="<?= $row['length'];?>" required>
</div>
 <div class="form-group">  
<label for="tax" class="control-label">Duration </label>
<input type="text" name="duration" class="form-control" onkeypress="return isNumber(event)" placeholder="In Second" required value="<?= $row['duration'];?>">

<input type="hidden" name="id" value="<?= $row['id'];?>">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger" name="submit">Save</button>
</form>
</div>
</div>
</div>
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
<script type="">
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<script type="text/javascript">
    $(document).ready(function(){

 $(".table").on('click','.Block',function(){
    var ths = $(this);
    var data = $(this).attr("id");
    var ter = $(this).closest('tr');
    $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/plan_block.php' ?>',
  type:'POST',
  data:{data:data},
  success:function(data){
    // alert(data);
    ths.attr('class','btn btn-danger btn-sm Unblock');
    ths.html('Unblock');
  }
});
     });
 $(".table").on('click','.Unblock',function(){
    var ths = $(this);
    var data = $(this).attr("id");
    var ter = $(this).closest('tr');
       $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/plan_unblock.php' ?>',
  type:'POST',
  data:{data:data},
  success:function(data){
    ths.attr('class','btn btn-success btn-sm Block');
    ths.html('Block');
     // $(this).closest('tr').remove();
  }
});
     });

});
</script> 