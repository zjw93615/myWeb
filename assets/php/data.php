<?php
  $path = parse_path();

  if(!isset($path['call_parts'][0]) || $path['call_parts'][0] == '') {
    $path['call_parts'][0] = 'home';
  }

  function getPageData($path,$dbc)
  {
    if(!isset($path['call_parts'][0]) || $path['call_parts'][0] == '') {
      include("home.php");
    }else if($path['call_parts'][0] == 'home') {
      include("home.php");
    }else if($path['call_parts'][0] == 'blog') {
      include('blog.php');
    }else if($path['call_parts'][0] == 'project') {
      echo file_get_contents("project.php");
    }else if($path['call_parts'][0] == 'about') {
      echo file_get_contents("about.php");
    }
  }
?>