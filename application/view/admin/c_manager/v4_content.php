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
                    <h4 class="card-title">User list</h4>
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
           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">ADD</button>
                    </div>
                    <!-- Modal -->
<div id="add" class="modal fade text-left" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
 <div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-success">
<h4 class="modal-title" id="myModalLabel17">Add Content Manager</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" action="<?php echo $call_config->base_url() ?>application/modal/admin/add_cmanager.php" enctype="multipart/form-data">
<div class="modal-body">

 
  <div class="form-group">  
<label for="tax" class="control-label">Name</label>
<input type="text" name="name" class="form-control" required>
</div>

  <div class="form-group">  
<label for="tax" class="control-label">Email</label>
<input type="email" name="email" class="form-control" required>
</div>

   
  <div class="form-group">  
<label for="tax" class="control-label">Phone</label>
<input type="text" maxlength="10" name="Phone" class="form-control" required onkeypress="return isNumber(event)">
</div>
<div class="form-group">  
<label for="tax" class="control-label">Address</label>
<textarea class="form-control" required name="address">
  
</textarea>

</div>
<div class="form-group">  
<label for="tax" class="control-label">Photo</label>
<input type="file"  name="image" class="form-control" required>
</div>
<input type="hidden" name="session" class="form-control" required value="sk825252@gmail.com">
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
                                        <th>Email</th>
                                        <th>Mobile No.</th>
                                        <th>Photo</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                        <th>Edit</th>
                                                                                <th>Login</th>
                                    </tr>
                                </thead>
                                                      <tbody>
                                    <?php
                                    $i=0;
$sql="SELECT * from tbl_content_manager_master ";
$result = mysqli_query($call_config->con, $sql);
while($row = mysqli_fetch_array($result))
{

   ?>
<tr role="row" class="odd">
    <td class="sorting_1"><?php echo ++$i ;?></td>
    <td><?php echo $row["name"] ?></td>
    <td><?php echo $row["email"] ?></td>
    <td><?php echo $row["mobile"] ?></td>
     <td><?php 
    if($row["image"] == ''){
 ?>
  None
      <?php
    } else{
            ?>
  <a target="_blank" href="<?= $call_config->base_url() ?>app-assets\c_manager/<?= $row['image'] ?>"><i class="ficon ft-eye"></i></a>
   <?php
    }
    ?></td>
     <td><?php echo $row["address"] ?></td>
    
    
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
<div class="modal-header btn-primary">
<h4 class="modal-title" id="myModalLabel17">Edit Details</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" action="<?php echo $call_config->base_url() ?>application/modal/admin/edit_cmanger.php">
<div class="modal-body">
  <div class="form-group">  
<label for="tax">Name</label>
<input type="text" name="name" class="form-control" value="<?php echo $row["name"] ?>">
</div>
<div class="form-group">  
<label for="tax">Email</label>
<input type="text" name="email" class="form-control" value="<?php echo $row["email"] ?>">
</div>
<div class="form-group">  
<label for="tax">Mobile</label>
<input type="text" name="mobile" class="form-control" value="<?php echo $row["mobile"] ?>">
</div>
<div class="form-group">  
<label for="tax">Address</label>
<textarea class="form-control" name="address"><?= $row['address'];?></textarea>
</div>
<input type="hidden" name="id" class="form-control" value="<?php echo $row["id"] ?>">
<input type="hidden" name="session" class="form-control" value="sk825252@gmail.com">
</div>
<div class="modal-footer">
<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger" name="submit">Save</button>
</form>
</div>
</div>
</div>
<td>
<form target="_blank" method="POST" action="<?= $call_config->base_url() ?>application/modal/login_page1.php">
  <input hidden="" value="<?= $row['email'] ?>" type="email" name="_email">
  <input hidden="" type="password" value="<?= $row['password'] ?>" name="_password">
  <input hidden="" type="text" value="3" name="_key">
<input type="submit" name="submit" class="btn btn-sm round btn-block btn-glow btn-bg-gradient-x-purple-blue" value="Login">
</form>
</td>
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
  url:'<?php echo $call_config->base_url().'application/modal/admin/cmanager_block.php' ?>',
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
  url:'<?php echo $call_config->base_url().'application/modal/admin/cmanager_unblock.php' ?>',
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