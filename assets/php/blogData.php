<?php
  function get_first_blog_class($dbc) {
    $q = "SELECT * FROM BlogClass ORDER BY className LIMIT 1";
    $r = mysqli_query($dbc, $q);
    $data = mysqli_fetch_assoc($r);

    return $data;
  }
  function get_blog_class_by_name($dbc, $name) {
    $q = "SELECT * FROM BlogClass WHERE className = '".$name."'";
    $r = mysqli_query($dbc, $q);
    $data = mysqli_fetch_assoc($r);

    return $data;
  }
  function get_blog_class_by_id($dbc, $id) {
    $q = "SELECT * FROM BlogClass WHERE id = ".$id;
    $r = mysqli_query($dbc, $q);
    $data = mysqli_fetch_assoc($r);

    return $data;
  }
  function get_blog_class($path, $dbc) {
    $q = "SELECT * FROM BlogClass ORDER BY className";
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
    $q = "SELECT * FROM Blog WHERE id = '".$path['call_parts'][2]."'";
    $r = mysqli_query($dbc, $q);
    $data = mysqli_fetch_assoc($r);
    $result = '
    <div class="blog-header">
      <h1 class="blog-title">'.$data['title'].'</h1>
      <p class="lead blog-description">'.$data['abstract'].'</p>
    </div>';
    $result .= '<div class="blog-post">';
    $result .= '<p class="blog-post-meta">'.$data['dateTime'].'</p>';

    $data['text_nohtml'] = strip_tags($data['text']);
    if($data['text'] == $data['text_nohtml']) {
      $result .= $data['text'];
    }else {
      $data['text_html']=preg_replace('/\n|\r\n/','<br/>',$data['text']);
      $result .= '<p>'.$data['text'].'</p>';
    }
    $result .= '</div><!-- /.blog-post -->';
    $result .= add_comment_editer($path);
    return $result;

  }

  function add_comment_editer($path) {
    $result = '<hr>';
    $result .= '<h3>Comment</h3>';
    $result .= '<script src="'.$path['url'].'assets/ckeditor/ckeditor.js"></script>';
    $result .= '
        <textarea name="editor1" id="editor1" rows="10" cols="80">
            This is my textarea to be replaced with CKEditor.
        </textarea>
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( "editor1" );
        </script>';
    return $result;
  }
?>