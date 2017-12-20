
<?php
  include("connection.php");
  if(isset($_POST['type']) && isset($_POST['scope'])) {
    if($_POST['type'] == "edit") {
      if($_POST['scope'] == "class") {
        $q = "UPDATE blogclass SET className='".$_POST['name']."' WHERE className='".$_POST['origin']."';";
        if(mysqli_query($dbc, $q)) {
          $result['result'] = "Success";
          $json = json_encode($result);
          echo $json;
        } else {
          $result['result'] = "Error updating record: " . mysqli_error($dbc);
          $json = json_encode($result);
          echo $json;
        }
      }
      if($_POST['scope'] == "blog") {
        $q = "UPDATE blog SET title='".$_POST['title']."', abstract='".$_POST['abstract']."', text='".$_POST['content']."', BlogClass_id='".$_POST['class']."' WHERE id='".$_POST['id']."';";
        if(mysqli_query($dbc, $q)) {
          $result['result'] = "Success";
          $json = json_encode($result);
          echo $json;
        } else {
          $result['result'] = "Error updating record: " . mysqli_error($dbc);
          $json = json_encode($result);
          echo $json;
        }
      }
    }
    if($_POST['type'] == "add") {
      if($_POST['scope'] == "class") {
        $q = "INSERT INTO blogclass (className) VALUES();";
        if(mysqli_query($dbc, $q)) {
          $result['result'] = "Success";
          $json = json_encode($result);
          echo $json;
        } else {
          $result['result'] = "Error updating record: " . mysqli_error($dbc);
          $json = json_encode($result);
          echo $json;
        }
      }
      if($_POST['scope'] == "blog") {
        $q = "INSERT INTO blog(title,abstract,text,BlogClass_id) VALUES('".$_POST['title']."', '".$_POST['abstract']."', '".$_POST['content']."', '".$_POST['class']."');";
        if(mysqli_query($dbc, $q)) {
          $result['result'] = "Success";
          $json = json_encode($result);
          echo $json;
        } else {
          $result['result'] = "Error updating record: " . mysqli_error($dbc);
          $json = json_encode($result);
          echo $json;
        }
      }
    }
    if($_POST['type'] == "delete") {
      if($_POST['scope'] == "class") {
        $q = "DELETE FROM className WHERE className = ".$_POST['origin'].";";
        if(mysqli_query($dbc, $q)) {
          $result['result'] = "Success";
          $json = json_encode($result);
          echo $json;
        } else {
          $result['result'] = "Error updating record: " . mysqli_error($dbc);
          $json = json_encode($result);
          echo $json;
        }
      }
      if($_POST['scope'] == "blog") {
        $q = "DELETE FROM blog WHERE id = ".$_POST['id'].";";
        if(mysqli_query($dbc, $q)) {
          $result['result'] = "Success";
          $json = json_encode($result);
          echo $json;
        } else {
          $result['result'] = "Error updating record: " . mysqli_error($dbc);
          $json = json_encode($result);
          echo $json;
        }
      }
    }
  }
?>