<?php
  $path = parse_path();

  if(!isset($path['call_parts'][0]) || $path['call_parts'][0] == '') {
    $path['call_parts'][0] = 'home';
  }

  function getPageData($path,$dbc)
  {
    echo $path['call_parts'][0];
    if(!isset($path['call_parts'][0]) || $path['call_parts'][0] == '') {
      include("homeContent.php");
    }else if($path['call_parts'][0] == 'home') {
      include("homeContent.php");
    }else if($path['call_parts'][0] == 'blog') {
      include('blogContent.php');
    }else if($path['call_parts'][0] == 'project') {
      echo file_get_contents("project.php");
    }else if($path['call_parts'][0] == 'about') {
      echo file_get_contents("about.php");
    }else if($path['call_parts'][0] == 'edit') {
      include('editBlog.php');
    }
  }
?>