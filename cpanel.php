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
  <link rel='shortcut icon' type='image/x-icon' href='voting.ico' />
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
          <a href="cpanel.php" class="navbar-brand headerFont text-lg"><strong>eVoting</strong></a>
        </div>

        <div class="collapse navbar-collapse" id="example-nav-collapse">
          <ul class="nav navbar-nav">

            <li><a href="nomination.html"><span class="subFont"><strong>Nomination's List</strong></span></a></li>
            <li><a href="changePassword.php"><span class="subFont"><strong>Admin's Password</strong></span></a></li>
            <li><a href="feedbackReport.php"><span class=""><strong>Feedback Report</strong></span></a></li>
            <li><a href="addvoter.php"><span class=""><strong>Add Voter</strong></span></a></li>

          </ul>
          <span class="normalFont"><a href="index.html" class="btn btn-success navbar-right navbar-btn"><strong>Sign Out</strong></a></span></button>
        </div>

      </div> <!-- end of container -->
    </nav>

    <div class="container" style="padding:100px;">
      <div class="row">
        <div class="col-sm-12" style="border:2px solid gray;">

          <div class="page-header">
            <h2 class="specialHead">Results</h2>
            <p class="normalFont">This is result Panel.</p>
          </div>

          <div class="col-sm-12">
            <?php
            require 'config.php';

            $BJP = 0;
            $INC = 0;
            $AAP = 0;
            $TMC = 0;

            $conn = mysqli_connect($hostname, $username, $password, $database);
            if (!$conn) {
              echo "Error While Connecting.";
            } else {

              //BJP
              $sql = "SELECT * FROM tbl_votes WHERE selection='BJP'";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  if ($row['selection'])
                    $BJP++;
                }

                $bjp_value = $BJP * 10;

                echo "<strong>BJP : </strong>" . $BJP . "<br>";
                echo "
                  <div class='progress'>
                    <div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow=\"$bjp_value\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: " . $bjp_value . "%'>
                      <span class='sr-only'>BJP</span>
                    </div>
                  </div>
                  ";
              }

              // CONGRESS
              $sql = "SELECT * FROM tbl_votes WHERE selection='INC'";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  if ($row['selection'])
                    $INC++;
                }


                $inc_value = $INC * 10;

                echo "<strong>Congress : </strong>" . $INC . "<br>";
                echo "
                  <div class='progress'>
                    <div class='progress-bar progress-bar-primary' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: " . $inc_value . "%'>
                      <span class='sr-only'>BJP</span>
                    </div>
                  </div>
                  ";
              }

              // AAP
              $sql = "SELECT * FROM tbl_votes WHERE selection='AAP'";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  if ($row['selection'])
                    $AAP++;
                }


                $aap_value = $AAP * 10;

                echo "<strong>Aam Aadmi Party : </strong>" . $AAP . "<br>";
                echo "
                  <div class='progress'>
                    <div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: " . $aap_value . "%'>
                      <span class='sr-only'>BJP</span>
                    </div>
                  </div>
                  ";
              }

              // TMC
              $sql = "SELECT * FROM tbl_votes WHERE selection='TMC'";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  if ($row['selection'])
                    $TMC++;
                }


                $tmc_value = $TMC * 10;

                echo "<strong>Trinamool Congress : </strong>" . $TMC . "<br>";
                echo "
                  <div class='progress'>
                    <div class='progress-bar progress-bar-warning' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: " . $tmc_value . "%'>
                      <span class='sr-only'>TMC</span>
                    </div>
                  </div>
                  ";
              }

              echo "<hr>";

              $total = 0;

              // Total
              $sql = "SELECT * FROM tbl_votes";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  if ($row['selection'])
                    $total++;
                }


                $tptal = $total * 10;

                //echo "<strong>Total Number of Votes</strong><br>";
                echo "
                  <div class='text-primary'>
                    <h3 class='normalFont'>Total Number of VOTES : $total </h3>
                  </div>
                  ";
              }
            }
            ?>
          </div>

        </div>
      </div>
    </div>
  </div>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>