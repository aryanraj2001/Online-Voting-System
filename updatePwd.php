<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>eVoting</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

  <style>
    .headerFont {
      font-family: 'Ubuntu', sans-serif;
      font-size: 24px;
    }

    .subFont {
      font-family: 'Raleway', sans-serif;
      font-size: 14px;

    }

    .specialHead {
      font-family: 'Oswald', sans-serif;
    }

    .normalFont {
      font-family: 'Roboto Condensed', sans-serif;
    }
  </style>


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

  <div class="container">
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse
    " role="navigation">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-header">
          <a href="index.html" class="navbar-brand headerFont text-lg"><strong>eVoting</strong></a>
        </div>
        <link rel='shortcut icon' type='image/x-icon' href='voting.ico' />
        <div class="collapse navbar-collapse" id="example-nav-collapse">
          <ul class="nav navbar-nav">
            <li><a href="nomination.html"><span class="subFont"><strong>Nomination's List</strong></span></a></li>
            <li><a href="changePassword.php"><span class="subFont"><strong>Admin's Password</strong></span></a></li>
            <li><a href="feedbackReport.php"><span class=""><strong>Feedback Report</strong></span></a></li>
            <li><a href="addvoter.php"><span class=""><strong>Add Voter</strong></span></a></li>
          </ul>
          <span class="normalFont"><a href="admin.html" class="btn btn-success navbar-right navbar-btn"><strong>Admin
                Panel</strong></a></span>
        </div>

      </div> <!-- end of container -->
    </nav>


    <div class="container" style="padding-top:150px;">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center" style="border:2px solid gray;padding:50px;">

          <?php

          // Credentials
          require('config.php');




          // Fetch Data
          if (empty($_POST['existingPassword']) || empty($_POST['newPassword'])) {
            $error = "Fields Recquired.";
          } else {
            $old = test_input($_POST['existingPassword']);
            $new = test_input($_POST['newPassword']);
          }
          $DB_HOST = "localhost";
          $DB_USER = "root";
          $DB_PASSWORD = "";
          $DB_NAME = "db_evoting";

          //Establish Connection
          $conn = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME)
            or die("Couldn't Connect to Database :");


          // Select Database
          //$db= mysql_select_db($db, $conn);

          // ******************************
          // ADD USER NAME FIELD HERE-- FROM SESSION
          //**********************************

          $sql = "SELECT * FROM db_evoting.tbl_admin WHERE admin_password='" . $old . "'";
          $query = mysqli_query($conn, $sql);
          $rows = mysqli_num_rows($query);
          if ($rows == 1) {
            // Given Password is Valid
            $sql = "UPDATE db_evoting.tbl_admin SET admin_password='$new' WHERE admin_username='admin'"; // =============EDIT *SESSSION_SUERNAME *
            if ($query = mysqli_query($conn, $sql)) {
              // Successfully Changed
              echo "<img src='images/checked.png' width='70' height='70'>";
              echo "<h3 class='text-info specialHead text-center'><strong> SUCCESSFULLY CHANGED.</strong></h3>";
              echo "<a href='cpanel.php' class='btn btn-primary'> <span class='glyphicon glyphicon-ok'></span> <strong> Finish</strong> </a>";
            }
          } else {
            $error = "Old-Password is Incorrect";

            echo "<img src='images/cancel.png' width='70' height='70'>";
            echo "<h3 class='text-info specialHead text-center'><strong> $error</strong></h3>";
            echo "<a href='index.html' class='btn btn-primary'> <span class='glyphicon glyphicon-ok'></span> <strong> Finish</strong> </a>";
          }

          mysqli_close($conn);

          ?>


        </div>
        <div class="col-sm-4"></div>
      </div>
    </div>

  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>