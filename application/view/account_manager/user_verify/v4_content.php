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
                        <div class="table-responsive">
                                    <!-- modal ends -->
 <table class="table table-striped table-bordered file-export">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Bio</th>
                                        <th>Mobile No.</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                                      <tbody>
                                    <?php
                                    $i=0;
$sql="SELECT * FROM tbl_user_master where verification='3' ";
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
    <td><?php echo $row["mobile"] ?></td>
    <td><?php echo $row["email"] ?></td>
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
    <td>
        <button class="btn btn-sm btn-success btnAdd" id="<?php echo $row['id']?>"><i class="ft ft-check"></i></button>
        <button class="btn btn-sm btn-danger btnDelete" id="<?php echo $row['id']?>"><i class="ft ft-x"></i></button>
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

 $(".table").on('click','.btnDelete',function(){
    var data = $(this).attr("id");
    var ter = $(this).closest('tr');
    $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/account_manager/v_unaccept.php' ?>',
  type:'POST',
  data:{data:data},
  success:function(data){
    ter.remove();
  }
});
     });
 $(".table").on('click','.btnAdd',function(){
    var data = $(this).attr("id");
    var ter = $(this).closest('tr');
       $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/account_manager/v_accept.php' ?>',
  type:'POST',
  data:{data:data},
  success:function(data){
   alert(data);
//    ter.remove();
     // $(this).closest('tr').remove();
  }
});
     });

});
</script>
