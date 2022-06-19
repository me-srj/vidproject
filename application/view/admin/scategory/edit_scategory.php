<?php
 include("../../../../config.php");
 $call_config->admin_sess_checker();
$sess_adm_data=$call_config->adm_sess_data_bind();
if (isset($_GET['id'])) {
$id=mysqli_escape_string($call_config->con,$_GET['id']);
$row=$call_config->get("SELECT * FROM `tbl_scategory_master` WHERE `id`='".$id."'");
 include('../../../../public/admin/v1_HeadPart.php');
 include('../../../../public/admin/v2_TopNavBar.php');
 include('../../../../public/admin/v3_sidebar.php');
 ?>
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
                    <h4 class="card-title">edit Sub-Category</h4>
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
 form_data.append("id",$("#cat_id").val());
form_data.append("category", category);
form_data.append('scategory',scategory);
form_data.append('img',file);
    //alert(form_data);
     $.ajax({
  url:'<?php echo $call_config->base_url() ?>application/modal/admin/edit_scategory.php',
  type:'POST',
   processData: false,
  contentType: false,
  data:form_data,
  success:function(data){
 // alert(data);
  var res = JSON.parse(data);
   if (res['status']) 
   {
    $("#thumbnail_message").attr("class","alert alert-success");
    $("#thumbnail_message").html(res['message']);
//      setTimeout(function(){ 
// location.reload();
//    }, 1500);
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

<form method="POST" action="#" enctype="multipart/form-data">
<div class="modal-body">
<input type="hidden" value="<?= $row['id'] ?>" id="cat_id" name="">
   <div class="form-group">  
<label for="tax" class="control-label">Category</label>
<select name="category" id="categoryid" required=""  class="form-control">
  <option disabled="" > --Select Category--</option>
  <?php
$category=$call_config->get_all("SELECT * FROM `tbl_category_master` WHERE  `status`='1'");
foreach ($category as $cat) {
 if ($cat['id']==$row['category_id']) {
    echo "<option selected value='".$cat['id']."'>".$cat['cname']."</option>";
 }
 else
 {
   echo "<option value='".$cat['id']."'>".$cat['cname']."</option>";
 }
}
  ?>
</select>
</div>  
  <div class="form-group">  
<label for="tax" class="control-label">Name</label>
<input type="text" name="name" id="scatname" value="<?= $row['sub_category'] ?>" class="form-control" required>
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
                              </div>

</div>
</form>
</div>
</div>
</div>
                        </div>
</section>
</div>

</div>
</div>

 <?php
include('../../../../public/admin/v5_customizer_setting.php');
include('../../../../public/admin/v6_Footer.php');
}
else
{
	$call_config->msg("Invalid URL!!","Failed to get url","info","admin/","dashboard/");
}
 ?>