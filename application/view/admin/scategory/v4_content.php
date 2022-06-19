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
                    <h4 class="card-title">Sub-Category list</h4>
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
<h4 class="modal-title" id="myModalLabel17">Add Sub-Category</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" action="#" enctype="multipart/form-data">
<div class="modal-body">

  <div class="form-group">  
<label for="tax" class="control-label">Category</label>
<select name="category" id="categoryid" required=""  class="form-control">
  <option disabled="" >--Select Category--</option>
  <?php
$categoryadd=$call_config->get_all("SELECT * FROM `tbl_category_master` WHERE  `status`='1'");
foreach ($categoryadd as $key) {
  echo "<option value='".$key['id']."'>".$key['cname']."</option>";
}
  ?>
</select>
</div> 
  <div class="form-group">  
<label for="tax" class="control-label">Name</label>
<input type="text" name="name" id="scatname" class="form-control" required>
</div>
  <div class="form-group">
<center><canvas id="thumb_canvas" style="width: 100%;height: 200px;" class="img"></canvas></center>
                              </div>
                                <div class="form-group">
<label for="e3">Please select an image for your sub-category</label>
<center><input type="file" id="video_thumbnail" onchange="show_on_canvas(this)" accept="*/image" name="thumbnail"></center>
<br>
<center>
  <button  type="button" class="btn btn-info btn-sm" id="save_thumbnail">Save</button></center>
  <br>
  <center><p class="alert alert-success" id="thumbnail_message">Please upload one image!!</p>
<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button></center>
                              </div>
</div>
</form>
</div>
</div>
</div>
</div>
<script type="text/javascript">
     function isCanvasBlank() {
    var canvas = document.getElementById('thumb_canvas');
  const context = canvas.getContext('2d');

  const pixelBuffer = new Uint32Array(
    context.getImageData(0, 0, canvas.width, canvas.height).data.buffer
  );

  return pixelBuffer.some(color => color !== 0);
}
   function show_on_canvas(input)
  {
var img = new Image();
  img.onload = draw;
  img.src = URL.createObjectURL($("#video_thumbnail")[0].files[0]);
  }
  function draw() {
  var canvas = document.getElementById('thumb_canvas');
  canvas.width = 270;
  canvas.height = 169;
  var ctx = canvas.getContext('2d');
  ctx.drawImage(this, 0,0,270, 169);
}
  $(document).on('click',"#save_thumbnail",function(){
    //alert($("#video_thumbnail")[0].files[0].name);
if (isCanvasBlank() && $("#categoryid").val()!="" && $("#categoryid").val()!=null && $("#scatname").val()!=null && $("#scatname").val()!="") 
{
var c = document.getElementById("thumb_canvas");
dataURL = c.toDataURL()
upload_thumbnail(dataURL,$("#categoryid").val(),$("#scatname").val());
}
else
{
$("#thumbnail_message").attr("class","alert alert-danger");
$("#thumbnail_message").html("Please Choose an image,category and fill category name");
}
  });
  function  upload_thumbnail(file,category,scategory)
  {
id=$("#video_id").val();
 form_data = new FormData();
form_data.append("category", category);
form_data.append('scategory',scategory);
form_data.append('img',file);
    //alert(form_data);
     $.ajax({
  url:'<?php echo $call_config->base_url() ?>application/modal/admin/add_scategory.php',
  type:'POST',
   processData: false,
  contentType: false,
  data:form_data,
  success:function(data){
  //alert(data);
  var res = JSON.parse(data);
   if (res['status']) 
   {
    $("#thumbnail_message").attr("class","alert alert-success");
    $("#thumbnail_message").html(res['message']);
     setTimeout(function(){ 
location.reload();
   }, 1500);
   }
   else
   {
    $("#thumbnail_message").attr("class","alert alert-danger");
    $("#thumbnail_message").html(res['message']);
   }
  }    
     });
  }
</script>
                        <div class="table-responsive">
                                    <!-- modal ends -->
 <table class="table table-striped table-bordered file-export">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Category</th>
                                        <th>Sub-Category</th>
                                        <th>Image</th>
                                        <th>Creation</th>
                                        <th>Updatation</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                                      <tbody>
                                    <?php
                                    $i=0;
$result = $call_config->get_all("SELECT * from tbl_scategory_master");
foreach ($result as $row) {   
  ?>
<tr role="row" class="odd">
    <td class="sorting_1"><?php echo ++$i ;?></td>
    <td><?php 
$search_category=$call_config->get("SELECT * FROM tbl_category_master WHERE `id`='".$row['category_id']."'");
    echo $search_category["cname"] ?></td>
    <td><?= $row['sub_category'] ?></td>
    <td><a target="_blank" href="<?= $call_config->base_url() ?>app-assets/admin/scat_img/<?= $row['img'] ?>">
      <i class="ficon ft-eye"></i>
    </a></td>
    <td>By:<?= $row["cby"] ?><br>On:<?= $row["con"] ?></td>
    <td>By:<?= $row["uby"] ?><br>On:<?= $row["uon"] ?></td>    
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
     <td><a href="<?= $call_config->base_url() ?>application/view/admin/scategory/edit_scategory.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm ft-edit-2 user_update"></a></td>
</tr>
</div>
</div>
</div>
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
  url:'<?php echo $call_config->base_url().'application/modal/admin/scategory_block.php' ?>',
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
  url:'<?php echo $call_config->base_url().'application/modal/admin/scategory_unblock.php' ?>',
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