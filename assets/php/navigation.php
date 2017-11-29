    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=<?php echo "'".$path['url']."'" ?>>Jiawei Web</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php
              if(!isset($path['call_parts'][0]) || $path['call_parts'][0] == '') {
                echo '<li class="active"><a href="'.$path['url'].'">Home</a></li>
                      <li><a href="'.$path['url'].'blog/'.get_first_blog_class($dbc)['className'].'/">Blog</a></li>
                      <li><a href="project">Project</a></li>
                      <li><a href="about">About</a></li>';
              }else if($path['call_parts'][0] == 'home') {
                echo '<li class="active"><a href="'.$path['url'].'">Home</a></li>
                      <li><a href="'.$path['url'].'blog/'.get_first_blog_class($dbc)['className'].'/">Blog</a></li>
                      <li><a href="project">Project</a></li>
                      <li><a href="about">About</a></li>';
              }else if($path['call_parts'][0] == 'blog') {
                echo '<li><a href="'.$path['url'].'">Home</a></li>
                      <li class="active"><a href="'.$path['url'].'blog/'.get_first_blog_class($dbc)['className'].'/">Blog</a></li>
                      <li><a href="project">Project</a></li>
                      <li><a href="about">About</a></li>';
              }else if($path['call_parts'][0] == 'project') {
                echo '<li><a href="'.$path['url'].'">Home</a></li>
                      <li><a href="'.$path['url'].'blog/'.get_first_blog_class($dbc)['className'].'/">Blog</a></li>
                      <li class="active"><a href="project">Project</a></li>
                      <li><a href="about">About</a></li>';
              }else if($path['call_parts'][0] == 'about') {
                echo '<li><a href="'.$path['url'].'">Home</a></li>
                      <li><a href="'.$path['url'].'blog/'.get_first_blog_class($dbc)['className'].'/">Blog</a></li>
                      <li><a href="project">Project</a></li>
                      <li class="active"><a href="about">About</a></li>';
              }
            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>