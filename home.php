<?php
session_start();
require_once 'class.user.php';
//require 'dbcon.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
 $user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EdgeFrame</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/jquery-ui.min.css" rel="stylesheet" media="screen">
    <link href="css/style.min.css" rel="stylesheet" media="screen">
    <link rel="icon" href="images/favicon.png" type="image/png" style="width: 16px; height: 16px;">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://use.fontawesome.com/3ba87a9b25.js"></script>
  </head>
  <body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <img src="images/EdgeFrame-logo.png" alt="EdgeFrame logo" class="pull-left logo">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li id="saveCall"></li>
        <li><button id="saveBtn" class="default-btn btn save">Save</button></li>
        <li><a href="#" data-toggle="modal" data-target="#myModal">About</a></li>
        <li><a tabindex="-1" href="logout.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div id="sidepanel" class="sidenav">

  <div id="divBlock" class="divBlock" draggable="true"></div>
  <p id="text" class="text" draggable="true" contenteditable="true">Sample text</p></div>

</div>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>

<div class="wrapper">

  <div id="mid-div" class="col-xs-12 col-md-12 mid-col">

 <!--

    $sql = "SELECT * FROM dragndrop.pageitem";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $x = $row['xPos'];
        $y = $row['yPos'];
        $height = $row['itemHeight'];
        $width = $row['itemWidth'];
        $id = $row['itemID'];

        echo '<div id="'.$id.'" class="divBlock ui-draggable ui-draggable-handle ui-draggable-dragging dropped ui-resizable"  style=" left:'.$x.'px; top:'.$y.'px; height:'.$height.'px; width:'.$width.'px;"
        draggable="true"></div>';
    }-->


  </div>

</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/dragndrop.js"></script>
  </body>
</html>
