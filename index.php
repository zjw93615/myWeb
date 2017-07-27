<?php
include('assets/php/connection.php');
include('assets/php/setup.php');
include('assets/php/data.php');
include('assets/php/blogData.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href=<?php echo $path['url'].'assets/images/Logo.ico'; ?>>

    <title>Jiawei Web</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    -->
    <link href=<?php echo $path['url'].'assets/css/bootstrap.min.css' ?> rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href=<?php echo $path['url'].'assets/css/ie10-viewport-bug-workaround.css' ?> rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src=<?php echo $path['url'].'assets/js/ie-emulation-modes-warning.js' ?>></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- My php script -->


    <!-- Custom styles for this template -->
    <link href=<?php echo $path['url'].'carousel.css' ?> rel="stylesheet">
    <link href=<?php echo $path['url'].'assets/css/mycss.css' ?> rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <?php include('assets/php/navigation.php'); ?>

    <div id="content-container">
        <?php getPageData($path,$dbc); ?>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    -->
    <script>window.jQuery || document.write('<script src=<?php echo $path['url']."assets/js/vendor/jquery.min.js" ?>><\/script>')</script>
    <script src=<?php echo $path['url']."assets/js/bootstrap.min.js" ?>></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <!-- <script src="assets/js/vendor/holder.min.js"></script> -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src=<?php echo $path['url']."assets/js/ie10-viewport-bug-workaround.js" ?>></script>
    <!-- My jQuery Script -->

  </body>
</html>
