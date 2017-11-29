<<?php include('assets/php/editBlogData.php'); ?>
<div class="container-fluid content">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <ul class="nav nav-sidebar">
        <?php echo edit_blog_class($path, $dbc); ?>
      </ul>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 blogmain">
      <?php include('assets/php/blogCommentSubmit.php') ?>
      <?php echo edit_blog_display($path, $dbc); ?>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
  $(".edit_class").click(function(){
    var name = prompt("Please enter the name you want to change:", $(this).attr('id'));
    if(name != null || name != '') {
      $.post(<?php echo '"'.$_SERVER['REQUEST_URI'].'"'; ?>,
      {
          type: "edit",
          scope: "class",
          id: name
      },
      function(data, status){
      });
    }
  });

  $(".delete_class").click(function(){
    $.post(<?php echo '"'.$_SERVER['REQUEST_URI'].'"'; ?>,
    {
        type: "edit",
        scope: "class",
        id: $(this).attr('id')
    },
    function(data, status){
    });
  });
});
</script>