<?php
  if($_POST) {
    if(isset($_POST['name']) && isset($_POST['comment'])){
      if($_POST['name'] != '' && $_POST['comment'] != '') {
        $q = "INSERT INTO blogcomment (ID,blog_id,name,text,dateTime) VALUES (NULL,'".$path['call_parts'][2]."','$_POST[name]','$_POST[comment]',CURRENT_TIME())";
        //$r = mysqli_query($dbc, $q);
        if(mysqli_query($dbc, $q)) {
          echo '<div class="alert alert-success" role="alert">You successfully add the comment.</div>';
        }else {
          echo mysqli_error($dbc);
        }
      }else {
        echo '<div class="alert alert-danger" role="alert">You cannot submit with null name or comment.</div>';
      }
    }
  }
?>