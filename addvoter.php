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
          <span class="normalFont"><a href="admin.html" class="btn btn-success navbar-right navbar-btn"><strong>Admin
                Panel</strong></a></span>
        </div>
      </div>

  </div> <!-- end of container -->
  </nav>


  <div class="container" style="padding-top:100px;">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4" style="border:2px solid gray;padding:50px;">

        <div class="page-header">
          <h2 class="specialHead">Add Voter</h2>
        </div>

        <form action="addVoterAction.php" method="POST">
          <div class="form-group">
            <label for="">Full Name</label><br>
            <input type="text" name="voterName" title="Enter Your Full Name" placeholder="Enter Your Full Name" class="form-control" required /><br>

            <label>Voter's Registered Email ID :</label><br>
            <input type="text" name="voterEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter Your Email id" class="form-control" /><br>

            <label>Voter's Card No. :</label><br>
            <input id="id1" type="text" name="voterID" pattern="[0-9].{6,}" placeholder="Enter Your Voter Uniquie id" class="form-control" required /><br>

            <label>Aadhar No. :</label><br>
            <input type="text" name="aadhar" pattern="[0-9].{12,}" placeholder="Enter Your aadhar no" class="form-control" required /><br>

            <label>Date of birth :</label><br>
            <input type="date" name="dob" class="form-control" required /><br>

            <button type="submit" class="btn btn-block span btn-primary "> <span class="glyphicon glyphicon-ok"></span> Add Voter</button>
          </div>
        </form>
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