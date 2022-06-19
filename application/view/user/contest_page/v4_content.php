<div id="content-wrapper">
            <div class="container-fluid pb-0">
          <div class="video-block section-padding">
            <div class="row">
                <div class="col-md-12">
                        <div class="main-title">
                  <div id="results">
                     
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      var id = '<?php echo $id;?>';
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, query:query, id:id},
        success:function(data)
        {
          // alert(data);
          $('#results').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    // $('#search_box').keyup(function(){
    //   var query = $('#search_box').val();
    //   load_data(1, query);
    // });
  });
</script>