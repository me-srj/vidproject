<script type="text/javascript">  
$(document).on("click","#cancel_upload",function(e)
{
e.preventDefault();
if (confirm("You will loose all the details of this video!! Are you sure?")) 
{
var id=$("#video_id").val();
$("#cancel_upload").hide();
form_data = new FormData();
form_data.append("id",id);
form_data.append("choice","remove");
       $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/video/upload.php' ?>',
  type:'POST',
   processData: false,
  contentType: false,
  data:form_data,
  success:function(data){
   var res = JSON.parse(data);
   if (res['status']) 
   {
     $("#video_message").attr("class","alert alert-danger");
      $("#video_message").html(res['message']);
       setTimeout(function(){ 
window.location='<?= $call_config->base_url() ?>application/view/user/my_account/';
   }, 3000);
   }
   else
   {

    $("#cancel_upload").show();
      $("#video_message").attr("class","alert alert-danger");
      $("#video_message").html(res['message']);
     // alert(res['message']);
   }
  }
});
}
});
$(document).on("input","#video_tags",function(){
str=$("#video_tags").val();
strl=str.split(",");
al=strl.length;
res="";
if (strl[al-1]=="") 
{
  //do nothing
}
else if(strl[al-1][0]!="#")
{
strl[al-1]="#"+strl[al-1];
res=strl.join();
$("#video_tags").val(res);
}
    });
function upload_video(video) {
file=video[0].files[0];
name=video[0].files[0].name;
  form_data = new FormData();
form_data.append("file", file);
form_data.append("fname",name);
form_data.append("choice","add");
    //alert(form_data);
       $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/video/upload.php' ?>',
  type:'POST',
   processData: false,
  contentType: false,
  data:form_data,
  success:function(data){
   var res = JSON.parse(data);
   if (res['status']) 
   {
      $("#video_id").val(res['id']);
      $("#video_message").attr("class","alert alert-success");
      $("#video_message").html(res['message']);
      $("#save_video").show();
      $("#video_input").val("");
          $("#cancel_upload").show();
     // alert(res['message']);
   }
   else
   {
      $("#video_message").attr("class","alert alert-danger");
      $("#video_message").html(res['message']);
     // alert(res['message']);
   }
  },
   error: function (data) {
        alert("Failed to upload the video!!");
        $("#basic_page").show();
   $("#upload_page").hide();  
    }
});
//alert(file);
}
$(document).on('change',"input[type=checkbox]", function(evt) {
   if($("input[type=checkbox]:checked").length >= 2) {
       this.checked = false;
   }
});
$(document).on("submit","#main_form",function(e){
if($("input[type=checkbox]:checked").length == 0) {
       alert("Please select atleast 1 category");
       e.preventDefault();
   }
});
</script>
            <div  class="container-fluid upload-details" id="upload_page">
              <form id="main_form" method="POST" enctype="multipart/form-data" action="<?= $call_config->base_url() ?>application/modal/user/video/edit_video.php">
               <div class="row">
                  <div class="col-lg-12">
                    <div class="osahan-progress">
                        <div class="osahan-close">
                           <a  id="cancel_upload" href="#"><i class="fas fa-times-circle"></i></a>
                        </div>
                     </div>
                     <div class="main-title">
                        <h6>Upload Details</h6>
                        <input type="hidden" value="<?= $video['id'] ?>" name="video_id" id="video_id">
<input type="file" name="video_input" accept="video/*" id="video_input" style="visibility: hidden;">
                     </div>
                  </div>
                  <div class="col-lg-4">
<div class="video-card">
<video style="width: 100%;height: 100%;" src="<?= $call_config->base_url() ?>videos/<?= $video['file'] ?>" id="video_tag" controls>
</video>
                           </div>
                                        </div>
                  <div class="col-lg-8">
                     <div class="osahan-title" id="file_name"><?= $video['name'] ?></div>
                     <div class="osahan-size" id="video_details"><?= $video['description'] ?></div>
                     <div class="alert alert-success" id="video_message">Your Video is on server here you can edit/Delete your video.</div>
                  </div>
               </div>
               <hr>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="osahan-form">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="e1">Video Title</label>
 <input maxlength="100" required="" name="title" type="text" value="<?= $video['name'] ?>" placeholder="Title (Required)" id="video_title" class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="e2">About</label>
<textarea rows="3" required="" maxlength="300" name="description" class="form-control" id="video_description" placeholder="Description of the video"><?= $video['description'] ?></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
<center><canvas id="thumb_canvas" style="width: 100%;height: 200px;" class="img"></canvas></center>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
<label for="e3">Play your video and Snap a Thumbnail OR choose a file</label>
<center><input type="file" id="video_thumbnail" onchange="show_on_canvas(this)" accept="*/image" name="thumbnail"></center>
<br>
<center><button type="button" class="btn btn-warning btn-sm text-blue" id="snap_btn" onclick="snap()">Snap</button>
  <button  type="button" class="btn btn-info btn-sm" id="save_thumbnail">Save</button></center>
  <br>
  <center><p class="alert alert-success" id="thumbnail_message">Please snap a photo or upload one!!</p></center>
                              </div>
                           </div>
<script>
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
  var video=document.querySelector('#video_tag');
  var canvas=document.querySelector('#thumb_canvas');
  var context=canvas.getContext('2d');
  var w,h,ratio;
  video.addEventListener('loadedmetadata', function() {
    ratio = video.videoWidth/video.videoHeight;
    w = 270;
    h = 169;
    canvas.width = w;
    canvas.height = h;
  },false);

  function snap() {
  $("#video_thumbnail").val("");
    context.fillRect(0,0,w,h);
    context.drawImage(video,0,0,w,h);
  }
  $(document).on('click',"#save_thumbnail",function(){
    //alert($("#video_thumbnail")[0].files[0].name);
if (isCanvasBlank()) 
{
var c = document.getElementById("thumb_canvas");
dataURL = c.toDataURL()
upload_thumbnail(dataURL);
}
else
{
$("#thumbnail_message").attr("class","alert alert-danger");
$("#thumbnail_message").html("Please Choose an image or take a snap");
}
  });
function  upload_thumbnail(file)
  {
id=$("#video_id").val();
 form_data = new FormData();
form_data.append("file", file);
form_data.append('id',id);
    //alert(form_data);
     $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/video/thumbnail.php' ?>',
  type:'POST',
   processData: false,
  contentType: false,
  data:form_data,
  success:function(data){
   var res = JSON.parse(data);
  //alert(data);
   if (res['status']) 
   {
    $("#thumbnail_message").attr("class","alert alert-success");
    $("#thumbnail_message").html(res['message']);
    $("#video_thumbnail").val("");
    $("#save_video").show();
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
                        </div>
<div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="e4">Tags</label>
<textarea class="form-control" style="color: blue;" name="video_tags" id="video_tags" required="" placeholder="#video,#new" ><?= $video['hashtag'] ?></textarea>
<label>Separate with ","/Comma</label>
                              </div>
                           </div>
</div>
<!--                         <div class="row">
                           <div class="col-lg-5">
                              <div class="form-group">
                                 <label for="e7">Tags (13 Tags Remaining)</label>
                                 <input type="text" placeholder="Gaming, PS4" id="e7" class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="e8">Cast (Optional)</label>
                                 <input type="text" placeholder="Nathan Drake," id="e8" class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label for="e9">Language in Video (Optional)</label>
                                 <select id="e9" class="custom-select">
                                    <option>English</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                 </select>
                              </div>
                           </div>
                        </div> -->
                        <div class="row ">
                           <div class="col-lg-12">
                              <div class="main-title">
                                 <h6>Category ( you can select upto 6 categories )</h6>
                              </div>
                           </div>
                        </div>
                        <div class="row category-checkbox">
                           <!-- checkbox 1col -->
<?php
$catarray=explode(',', $video['cat_id']);
foreach ($category as $cat) {
 $subcat=$call_config->get_all("SELECT * FROM `tbl_scategory_master` WHERE `category_id`='".$cat['id']."'");
 ?>
  <div class="col-lg-2 col-xs-6 col-4">
    <?php
foreach ($subcat as $scat ) {
 ?>
        <div class="custom-control custom-checkbox">
  <input type="checkbox" value="<?= $scat['id'] ?>" id="customCheck<?= $scat['id'] ?>" name="subcategory"<?php
foreach ($catarray as $catid) {
  if ($catid==""||$catid==null) 
  {
    # code...
  }
  else
  {
    if ($catid==$scat['id']) 
    {
     echo "checked";
    }
  }
}
  ?> class="customcheckbox custom-control-input">
  <label class="custom-control-label" for="customCheck<?= $scat['id'] ?>"><?= $scat['sub_category'] ?></label>
                              </div>
 <?php
}
    ?>
                           
                           </div>
 <?php
}
?>
                        </div>
                     </div>
                   </form>
                     <div class="osahan-area text-center mt-3">
                        <button id="save_video" class="btn btn-outline-primary">Save Changes</button>
<?php
if ($video['publish']=="not") {
?>
<a class="btn btn-outline-info" href="<?= $call_config->base_url() ?>application/modal/user/video/publish_video.php?id=<?= base64_encode($video['id']) ?>">Publish</a>
<?php
}
if ($video['publish']=='publish') {
  ?>
<a class="btn btn-danger" href="<?= $call_config->base_url() ?>application/view/user/boost/?id=<?= base64_encode($video['id']) ?>">Boost!!</a>
  <?php
}
?>

                     </div>
                     <hr>
                     <div class="terms text-center">
                        <p class="mb-0">There are many variations of passages of Lorem Ipsum available, but the majority <a href="#">Terms of Service</a> and <a href="#">Community Guidelines</a>.</p>
                        <p class="hidden-xs mb-0">Ipsum is therefore always free from repetition, injected humour, or non</p>
                     </div>
                  </div>
               </div>
            </div>    