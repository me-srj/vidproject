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
                     


                        <div class="table-responsive">
                                    <!-- modal ends -->
 <table class="table table-striped table-bordered file-export">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <!-- <th>Thumbnail</th> -->
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Hashtags</th>
                                        <th>view</th>
                                        <!-- <th>Action</th>
                                        <th>Process</th>
                                        <th>Watch Now</th> -->
                                    </tr>
                                </thead>
                                                      <tbody>
                                    <?php
                                    $i=0;
$sql="SELECT *  FROM `tbl_video_master` as a  where  publish='publish'";
$result = mysqli_query($call_config->con, $sql);
while($row = mysqli_fetch_array($result))
{
  $sql1= mysqli_query($call_config->con,"select * from tbl_category_master where id='".$row['cat_id']."'");
  $res = mysqli_fetch_array($sql1);
  

;   ?>
<tr role="row" class="odd">
    <td class="sorting_1"><?php echo ++$i ;?></td>
    <td><?php echo $row["name"] ?></td>
   <!--  <td><?php 
    if($row["thumbnail"] == ''){
 ?>
  No Thumbnail
      <?php
    } else{
            ?>
  <a target="_blank" href="<?= $call_config->base_url() ?>thumbnail/<?= $row['thumbnail'] ?>"><i class="ficon ft-eye"></i></a>
   <?php
    }
    ?></td> -->
    <td>
      <?php echo $res["cname"] ?>

      
    </td>
     <td><?php echo $row["description"] ?></td>
     <td><?php echo $row["hashtag"] ?></td>
     <td>
       <a href="<?= $call_config->base_url() ?>application/view/content_manager/All_vedios/vedio_details.php?id=<?=$row['id']?>" type="submit" name="submit" class="btn btn-sm round btn-block btn-glow btn-bg-gradient-x-purple-blue">View</a>
     </td>
    
    
    <!-- <td><?php
    if($row['status']=='1'){
        ?>
        <button class="btn btn-danger btn-sm Block" id="<?php echo $row['id']?>">Reject</button>
    <?php }
    else{
        ?>
        <button class="btn btn-danger btn-sm Unblock" id="<?php echo $row['id']?>">Unblock</button>
        <?php
    }
  
    ?>
    </td>
     <td>
      <?php if($row['publish']=='publish')
      {?>
        <button class="btn btn-success btn-sm publish" >Published</button>
        <?php
        } 
        else {?>
          <button class="btn btn-success btn-sm publish" id="<?php echo $row['id']?>">Publish</button>

       <?php
        }?>
      </td>
 
<td> <video width="150" height="150" controls>
  <source src="<?php echo $call_config->base_url() ?>vedios/<?php echo $row['file']?>" type="video/mp4">
  <source src="<?php echo $call_config->base_url() ?>vedios/<?php echo $row['file']?>" type="video/ogg">
  Your browser does not support the video tag.
</video></td> -->
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
  url:'<?php echo $call_config->base_url().'application/modal/content_manager/vedio_reject.php' ?>',
  type:'POST',
  data:{data:data},
  success:function(data){
    //alert(data);
    ths.attr('class','btn btn-danger btn-sm Unblock');
    ths.html('rejected');
  }
});
     });
 $(".table").on('click','.publish',function(){

    var ths = $(this);
    var data = $(this).attr("id");
    var ter = $(this).closest('tr');
       $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/content_manager/publish_vedio.php' ?>',
  type:'POST',
  data:{data:data},
  success:function(data){
    //alert(data);
    ths.attr('class','btn btn-success btn-sm Block');
    ths.html('Published');
     // $(this).closest('tr').remove();
  }
});
     });

});
</script> 