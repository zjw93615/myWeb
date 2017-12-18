<?php
  function get_first_blog_class($dbc) {
    $q = "SELECT * FROM blogclass ORDER BY className LIMIT 1";
    $r = mysqli_query($dbc, $q);
    $data = mysqli_fetch_assoc($r);

    return $data;
  }
  function get_blog_class_by_name($dbc, $name) {
    $q = "SELECT * FROM blogclass WHERE className = '".$name."'";
    $r = mysqli_query($dbc, $q);
    $data = mysqli_fetch_assoc($r);

    return $data;
  }
  function get_blog_class_by_id($dbc, $id) {
    $q = "SELECT * FROM blogclass WHERE id = ".$id;
    $r = mysqli_query($dbc, $q);
    $data = mysqli_fetch_assoc($r);

    return $data;
  }
  function get_blog_class($path, $dbc) {
    $q = "SELECT * FROM blogclass ORDER BY className";
    $r = mysqli_query($dbc, $q);
    if(!isset($path['call_parts'][1]) || $path['call_parts'][1] == '') {
      $path['call_parts'][1] = 'Algorithm';
    }
    $result = '';
    while($data = mysqli_fetch_assoc($r)) {
      if($path['call_parts'][1] == $data['className']) {
        $result .= '<li class="active"><a href="'.$path['url'].'blog/'.$data['className'].'/">';
      }else {
        $result .= '<li><a href="'.$path['url'].'blog/'.$data['className'].'/">';
      }

      $result .= $data['className'];
      $result .= '</a></li>';
    }
    return $result;
  }

  function blog_display($path, $dbc) {
    if(isset($path['call_parts'][2]) && $path['call_parts'][2] != '') {
      return get_blog_content($path, $dbc);
    }else {
      return get_blog_list($path, $dbc);
    }
  }

  function get_blog_list($path, $dbc) {

    if(!isset($path['call_parts'][1]) || $path['call_parts'][1] == '') {
      $path['call_parts'][1] = 'Algorithm';
    }
    $blogClass = get_blog_class_by_name($dbc,$path['call_parts'][1]);

    $q = "SELECT * FROM Blog WHERE BlogClass_id = '".$blogClass['id']."'";
    $r = mysqli_query($dbc, $q);

    $result = '<h1 class="page-header">'.$path['call_parts'][1].'</h1>';

    while($data = mysqli_fetch_assoc($r)) {
      $result .= '<a href="'.$data['id'].'">';
      $result .= '<div class="thumbnail">';
      $result .= '<div class="caption">';
      $result .= '<h3>'.$data['title'].'</h3>';
      $result .= '<h6>'.$data['abstract'].'</h6>';
      $text = substr($data['text'],0,200).'...';
      $result .= '<p>'.$text.'</p>';
      $result .= '</div></div></a>';
    }
    return $result;
  }

  function get_blog_content($path, $dbc) {
    $q = "SELECT * FROM blog WHERE id = '".$path['call_parts'][2]."'";
    $r = mysqli_query($dbc, $q);
    $data = mysqli_fetch_assoc($r);
    $result = '
    <div class="blog-header col-sm-12">
      <h1 class="blog-title">'.$data['title'].'</h1>
      <p class="lead blog-description">'.$data['abstract'].'</p>
    </div>';
    $result .= '<div class="blog-post col-sm-12">';
    $result .= '<p class="blog-post-meta">'.$data['dateTime'].'</p>';

    $data['text_nohtml'] = strip_tags($data['text']);
    if($data['text'] == $data['text_nohtml']) {
      $result .= $data['text'];
    }else {
      $data['text_html']=preg_replace('/\n|\r\n/','<br/>',$data['text']);
      $result .= '<p>'.$data['text'].'</p>';
    }
    $result .= '</div><!-- /.blog-post -->';
    $result .= add_comment($path,$dbc);
    return $result;

  }

  function add_comment_form($path) {

    $result = '<script src="'.$path['url'].'assets/ckeditor/ckeditor.js"></script>';
    $result .= '<form action="' .$_SERVER['REQUEST_URI']. '" method="post" role="form" class="form-horizontal" id="commentForm">
                  <div class="form-group">
                    <label for="text" class="col-sm-1 control-label">User Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="comment" class="col-sm-1 control-label">Comment</label>
                    <div class="col-sm-10">
                      <textarea name="comment" id="comment" rows="10" cols="80">
                      </textarea>
                    </div>
                    <script>
                        CKEDITOR.replace( "comment" );
                    </script>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-11">
                      <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span> Summit comment</button>
                    </div>
                  </div>
                </form>';
    return $result;
  }

  function add_comment($path, $dbc) {
    $result = '
      <div class="col-sm-12" id="logout">
        <div class="page-header">
            <h3 class="reviews">Leave your comment</h3>
        </div>
        <div class="comment-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comments</h4></a></li>
                <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Add comment</h4></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="comments-logout">
                    <ul class="media-list">';

    $q = "SELECT * FROM blogcomment WHERE blog_id = '".$path['call_parts'][2]."' ORDER BY dateTime";
    $r = mysqli_query($dbc, $q);

    while($data = mysqli_fetch_assoc($r)) {
      $result .= '<li class="media">';

      $result .= '<a class="pull-left" href="#">
                    <img class="media-object img-circle" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="profile">
                  </a>';
      $result .= '<div class="media-body">';
      $result .= '<div class="well well-lg">';
      $result .= '<p class="pull-right"><small>'.$data['dateTime'].'</small></p>';
      $result .= '<h4 class="media-heading text-uppercase reviews">'.$data['name'].' </h4>';
      $result .= '<div class="media-comment">';
      $result .= $data['text'];
      $result .= '</div>';

      $result .= '</div></div></li>';
    }

    $result .= '</ul></div>';
    $result .= '<div class="tab-pane" id="add-comment">';
    $result .= add_comment_form($path);
    $result .= '</div>';
    return $result;


  }
?>