<?php
include("../../../php/get_post_utils.php");

if (getpostset("orientation")) {
  $orientation = getpost("orientation");
}

if (!in_array($orientation, array("1","2"))){
  $orientation = "1";
}

?><!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no"/>
    <title>Steamworks 2017 Scouting</title>
    <script type="text/javascript" src="../../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/scout.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
  </head>
  <body id="body">
  <script type="text/javascript">
    var main = {
    	orientation: <?php echo "$orientation"; ?> 
    }
  </script>
    <div class="container-fluid" style="text-align: center;">
      <div class="col-xs-1 col-sm-2 col-md-3"></div>
      <div class="fadein col-xs-10 col-sm-8 col-md-6" style="margin: 40px auto">
        <h1>Orientation <?php echo "$orientation"; ?> Selected</h1>
      </div>
      <div class="col-xs-1 col-sm-2 col-md-3"></div>
    </div>
  </body>
</html>
