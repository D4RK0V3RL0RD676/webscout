<?php
include("../php/get_post_utils.php");
include("../php/years.php");
include("../php/login.php");

$year = date("Y");
$user = "";
$pass = "";

//$year
if (getpostset("year")) {
  $year = getpost("year");
}
$year = checkYear($year);

//$user
if (getpostset("user")) {
  $user = getpost("user");
}
if (strlen($user) < 2 || 6 < strlen($user)){
  $user = "1111";
}

//$pass
if (getpostset("pass")) {
  $pass = getpost("pass");
}
if (strlen($pass) < 20){
  $pass = "lololol";
}

login($user, $pass, "../");

?><!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no"/>
    <title><?php echo getGame($year) . " $year Scouting"; ?></title>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/utils.js"></script>
    <script type="text/javascript" src="mainscreen.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>
  <body id="body">
  <script type="text/javascript">
    var year = <?php echo "\"$year\""; ?>;
    var main = {
      orientation: 0,
      user: <?php echo "\"$user\""; ?>,
      pass: <?php echo "\"$pass\""; ?> 
    }
  </script>

    <!-- select team and match modal -->
    <div
      id="select-match-modal"
      class="modal fade"
      tabindex="-1"
      role="dialog"
      aria-labelledby="Select Match">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Select Match</h4>
          </div>
          <div id="select-match-modal-content" class="modal-body container-fluid">
            <div class="loader"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" onclick="findMatch()">Refresh</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Dismiss</button>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <!-- left spacer-->
      <div class="col-sm-1 col-md-2"></div>
      <!-- main page -->
      <div id="page" class="fadein col-xs-12 col-sm-10 col-md-8">
        <!-- title -->
        <a href="./"><h1><?php echo getGame($year) . " $year Scouting"; ?></h1></a>
        <hr/>
        <!-- check if javascript enabled -->
        <h3 id="check-js">Please Enable JavaScript</h3>
        <!-- pick orientation -->
        <h3>Choose Orientation</h3>
        <div class="row">
          <div class="col-sm-1 col-md-2"></div>
          <div class="col-xs-12 col-sm-10 col-md-8">
            <img
              id="orientation1"
              class="orientation-img"
              src=<?php echo "\"$year/img/field/field.png\""; ?> 
              onclick="setOrientation(1)"/>
            <br/>
            <img
              id="orientation2"
              class="orientation-img"
              src=<?php echo "\"$year/img/field/field.png\""; ?> 
              onclick="setOrientation(2)">
          </div>
          <div class="col-sm-1 col-md-2"></div>
        </div>

        <!-- start scouting button -->
        <div class="row">
          <div class="col-sm-1 col-md-2"></div>
          <div class="col-xs-12 col-sm-10 col-md-8">
            <div id="scout-match-error"></div>
            <div class="button" onclick="findMatch()">
              <div>Scout Match</div>
            </div>
          </div>
          <div class="col-sm-1 col-md-2"></div>
        </div>
        <hr/>
        <!-- start hub button -->
        <div class="row">
          <div class="col-sm-1 col-md-2"></div>
          <div class="col-xs-6 col-sm-5 col-md-4">
            <div class="button" onclick="startHub()">
              <div>Open Hub</div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-5 col-md-4">
            <div class="button" onclick="startHub()">
              <div>View Data</div>
            </div>
          </div>
          <div class="col-sm-1 col-md-2"></div>
        </div>
        <hr/>
        <!-- footer -->
        <div id="footer"">
          <div>Copyright &copy; <?php echo date("Y"); ?> Swift Creek Robotics</div>
        </div>
      </div>
      <!-- right spacer -->
      <div class="col-sm-1 col-md-2"></div>
    </div>
  </body>
</html>
