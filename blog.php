<div class="container-fluid content">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <ul class="nav nav-sidebar">
        <?php echo get_blog_class($path, $dbc); ?>
      </ul>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 blogmain">
      <?php echo blog_display($path, $dbc); ?>
    </div>
  </div>
</div>