<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Drag n Drop</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <link href="css/style.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://use.fontawesome.com/3ba87a9b25.js"></script>
  </head>
  <body id="move">
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <i id="openbtn" class="fa fa-info fa-2x" aria-hidden="true"></i>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><button id="saveBtn" class="default-btn btn save" value="Saved">Save</button></li>
        <li><button id="editBtn" class="default-btn btn edit">Edit</button></li>
        <li><a href="#">Login</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div id="sidepanel" class="sidenav">
  <i id="closebutton" class="fa fa-info fa-2x" aria-hidden="true"></i>


</div>



<div class="wrapper">

  <div id="top-div" class="col-xs-12 col-md-12 top-col">

  </div>

  <div id="mid-div" class="col-xs-12 col-md-12 mid-col">

  </div>

  <div id="bottom-div" class="col-xs-12 col-md-12 bottom-col">

  </div>

</div>

<footer class="col-xs-12 col-md-12 bottom-nav">
  <div id="textblock" class="draggable">

  </div>

</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/sidenav.js"></script>
    <script src="js/dragndrop.js"></script>
  </body>
</html>
