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
                  <div class="float-right">
           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">ADD</button>
                    </div>
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                                    <!-- modal ends -->
 <table class="table table-striped table-bordered file-export">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Bio</th>
                                        <th>Contact</th>
                                        <th>Verified By</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                        <th>Delete Account</th>
                                    </tr>
                                </thead>
                                                      <tbody>
                                    <?php
                                    $i=0;
$sql="SELECT a.id,a.name,a.bio,a.mobile,a.email,b.name AS a_name,a.photo,a.status FROM tbl_user_master AS a JOIN tbl_account_manager_master AS b ON a.vby=b.email where a.verification='1' ";
$result = mysqli_query($call_config->con, $sql);
while($row = mysqli_fetch_array($result))
{

   ?>
<tr role="row" class="odd">
    <td class="sorting_1"><?php echo ++$i ;?></td>
    <td><?php echo $row["name"] ?></td>
    <td><?php 
    if($row["bio"] == ''){
 ?>
  None
      <?php
    } else{
         echo $row["bio"];
    }
    ?></td>
    <td><?php echo $row["mobile"] ?><br><?php echo $row["email"] ?></td>
    <td><?php echo $row["a_name"] ?></td>
    <td><?php 
    if($row["photo"] == ''){
 ?>
  None
      <?php
    } else{
            ?>
  <a href="<?= $call_config->base_url() ?>app-assets\user\user_image/<?= $row['photo'] ?>"><i class="ficon ft-eye"></i></a>
   <?php
    }
    ?></td>
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
  <td>
     <button class="btn btn-danger btn-sm Delete" id="<?php echo $row['id']?>">Delete</button>
<!--     <form target="_blank" method="POST" action="<?= $call_config->base_url() ?>application/view/admin/view_user/">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">
      <input type="submit" name="submit" value="View" class="btn btn-sm round btn-block btn-glow btn-bg-gradient-x-purple-blue">
    </form> -->
    </td>
</tr>
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

 $(".table").on('click','.Block',function(){
    var ths = $(this);
    var data = $(this).attr("id");
    var ter = $(this).closest('tr');
    $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/u_block.php' ?>',
  type:'POST',
  data:{data:data},
  success:function(data){
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
  url:'<?php echo $call_config->base_url().'application/modal/admin/u_unblock.php' ?>',
  type:'POST',
  data:{data:data},
  success:function(data){
    ths.attr('class','btn btn-success btn-sm Block');
    ths.html('Block');
     // $(this).closest('tr').remove();
  }
});
     });
 $(".table").on('click','.Delete',function(e){
  e.preventDefault();
if (confirm("The row will be deleted!! Are you sure?")) 
{
    var ths = $(this);
    var data = $(this).attr("id");
    var ter = $(this).closest('tr');
       $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/user_delete.php' ?>',
  type:'POST',
  data:{data:data},
  success:function(data){
    alert(data);
    // if(data=='success')
    // {
    //  ths.closest('tr').remove();
    // }
  }
});
 // window.location=e.currentTarget.href;
}
     });

});
</script>