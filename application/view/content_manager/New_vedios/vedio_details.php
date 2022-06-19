<?php
 // error_reporting(0);
 include("../../../../config.php");
 $call_config->cmg_sess_checker();
$cmg_sess_data=$call_config->cmg_sess_data_bind();
 $id=$_GET['id'];
 
include('../../../../public/content_manager/v1_HeadPart.php');
include('../../../../public/content_manager/v2_TopNavBar.php');
include('../../../../public/content_manager/v3_sidebar.php');
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
                    	<?php
                    	$sql="SELECT *  FROM `tbl_video_master` as a  where  id='".$id."'";
$result = mysqli_query($call_config->con, $sql);
while($row = mysqli_fetch_array($result))
{
       $sql1= mysqli_query($call_config->con,"select * from tbl_user_master where id='".$row['uid']."'");
  $res = mysqli_fetch_array($sql1);
   $sql2= mysqli_query($call_config->con,"select * from tbl_category_master where id='".$row['cat_id']."'");
  $ress = mysqli_fetch_array($sql2);             		
                    		?>
                    	<div class="row">
                    		

                    			<div class="col-md-6">
                    			<div class="form-group">
                    		  
                    			<img src="<?php echo $call_config->base_url() ?>thumbnail/<?= $row['thumbnail'] ?>" class="img img-thumbnail" height="100" width="100">
                    		</div>
                    		 <label class="control-label">Thumbnail</label>
                    		</div>
                    		<div class="col-md-6">
                    			<div class="form-group">
                                    <div  style="height:200px;width:100%;">
                    					<video class="img-thumbnail"  controls>
  <source src="<?php echo $call_config->base_url() ?>videos/<?= $row['file'] ?>" type="video/mp4">
  <source src="<?php echo $call_config->base_url() ?>Videos/<?= $row['file'] ?>" type="video/ogg">
  Your browser does not support the video tag.
</video>
                    					
                    				</div>
                    				
                    		    </div>
                    		</div>
                    	
                    		<div class="col-md-6">
                    			<div class="form-group">
                    				<label class="control-label">Name</label>
                    			<input type="text" name="name" value="<?php echo $res['name'];?>" class="form-control" readonly>
                    		</div>
                    		</div>
                    		<div class="col-md-6">
                    			<div class="form-group">
                    				<label class="control-label">Username</label>
                    			<input type="text" name="uname" value="<?php echo $res['username'];?>" class="form-control" readonly>
                    		</div>
                    		</div>
                    		<div class="col-md-6">
                    			<div class="form-group">
                    				<label class="control-label">Mobile</label>
                    			<input type="text" name="mobile" value="<?php echo $res['mobile'];?>" class="form-control" readonly>
                    		</div>
                    		</div>
                    		<div class="col-md-6">
                    			<div class="form-group">
                    				<label class="control-label">Email</label>
                    			<input type="text" name="email" value="<?php echo $res['email'];?>" class="form-control" readonly>
                    		</div>
                    		</div>
                    		<div class="col-md-6">
                    			<div class="form-group">
                    				<label class="control-label">Gender</label>
                    			<input type="text" name="gender" value="<?php echo $res['gender'];?>" class="form-control" readonly>
                    		</div>
                    		</div>
                    		<div class="col-md-6">
                    			<div class="form-group">
                    				<label class="control-label">City</label>
                    			<input type="text" name="city" value="<?php echo $res['city'];?>" class="form-control" readonly>
                    		</div>
                    		</div>

                    		<div class="col-md-6">
                    			<div class="form-group">
                    				<label class="control-label">Hastags</label>
                    			<input type="text" name="hashtags" value="<?php echo $row['hashtag'];?>" class="form-control" readonly>
                    		</div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Category</label>
                                <input type="text" name="hashtags" value="<?php echo $ress['cname'];?>" class="form-control" readonly>
                            </div>
                    		</div>
                    		 <div class="form-actions text-right">
                                <a href="<?php echo $call_config->base_url() ?>application/view/content_manager/New_vedios/" type="button" class="btn btn-primary mr-1">
                                    <i class="ft-x"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-danger reject" id="<?php echo $row['id']?>" name="submit">
                                    <i class="la la-trash"></i> Reject
                                </button>
                                <button type="submit" class="btn btn-success publish" id="<?php echo $row['id']?>" name="submit">
                                    <i class="la la-check-square-o"></i> Publish
                                </button>
                            </div>
                    	</div>
                    	<?php
                    }
                    ?>

                     


                        
</div>
</div>
<!-- END Edit MODAL -->

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

 $('.reject').on('click',function(){
    var ths = $(this);
    var data = $(this).attr("id");
    var ter = $(this).closest('tr');
    $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/content_manager/vedio_reject.php' ?>',
  type:'POST',
  data:{data:data},
  success:function(data){
  //  alert(data);
    ths.attr('class','btn btn-danger Unblock');
    ths.html('rejected');
    $('.publish').hide();
  }
});
     });
 $(".publish").on('click',function(){

    var ths = $(this);
    var data = $(this).attr("id");
    var ter = $(this).closest('tr');
       $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/content_manager/publish_vedio.php' ?>',
  type:'POST',
  data:{data:data},
  success:function(data){
    alert(data);
    ths.attr('class','btn btn-success btn-sm Block');
    ths.html('Published');
     // $(this).closest('tr').remove();
  }
});
     });

});
</script> 


<?php
include('../../../../public/content_manager/v5_customizer_setting.php');
include('../../../../public/content_manager/v6_Footer.php');
?>