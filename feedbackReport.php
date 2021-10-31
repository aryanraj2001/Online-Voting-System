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
    h1 {
      margin-top: 20px;
      font-size: 40px;
      color: #E6E6E6;
    }

    #total_votes {
      font-size: 30px;
      color: #FE2E2E;
      font-weight: bold;
    }

    .div {

      height: 85px;
      width: 272px;

    }

    .div p {
      margin: 0px;
      font-size: 20px;
      text-align: left;
      color: #E6E6E6;
    }

    img {
      margin-top: 10px;
      width: 50px;
      height: 50px;
      float: left;

    }

    input[type="submit"] {
      border: none;
      background: none;
      background-color: #35d233;
      width: 80px;
      height: 40px;
      color: white;
      border-radius: 3px;
      font-size: 17px;
      margin: 3px;
      margin-bottom: 20px;
    }
    .php {
      padding: 5px;
    }
  </style>

  <script type="text/javascript">
    function change(id) {
      var cname = document.getElementById(id).className;
      var ab = document.getElementById(id + "_hidden").value;
      document.getElementById(cname + "rating").value = ab;

      for (var i = ab; i >= 1; i--) {
        document.getElementById(cname + i).src = "images/star-filled.png";
      }
      var id = parseInt(ab) + 1;
      for (var j = id; j <= 5; j++) {
        document.getElementById(cname + j).src = "images/star.png";
      }
    }
  </script>
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
</head>
<?php


require 'config.php';

$oneStar=0;
$twoStar=0;
$threeStar=0;
$fourStar=0;
$fiveStar=0;
$total=0;

$conn = mysqli_connect($hostname, $username, $password, $database);
if(!$conn)
{
  echo "Error While Connecting.";
}
else
{

  //one star
  $sql ="SELECT * FROM tbl_feedback WHERE rating='1'";
  $result= mysqli_query($conn, $sql);

  if(mysqli_num_rows($result)>0)
  {
    $oneStar=mysqli_num_rows($result);
  }
  //two star
  $sql ="SELECT * FROM tbl_feedback WHERE rating='2'";
  $result= mysqli_query($conn, $sql);

  if(mysqli_num_rows($result)>0)
  {
    $twoStar=mysqli_num_rows($result);
  }
  //three star
  $sql ="SELECT * FROM tbl_feedback WHERE rating='3'";
  $result= mysqli_query($conn, $sql);

  if(mysqli_num_rows($result)>0)
  {
    $threeStar=mysqli_num_rows($result);
  }
  //four star
  $sql ="SELECT * FROM tbl_feedback WHERE rating='4'";
  $result= mysqli_query($conn, $sql);

  if(mysqli_num_rows($result)>0)
  {
    $fourStar=mysqli_num_rows($result);
  }
  //five star
  $sql ="SELECT * FROM tbl_feedback WHERE rating='5'";
  $result= mysqli_query($conn, $sql);

  if(mysqli_num_rows($result)>0)
  {
    $fiveStar=mysqli_num_rows($result);
  }
  $total=round((1*$oneStar+2*$twoStar+3*$threeStar+4*$fourStar+5*$fiveStar)/($oneStar+$twoStar+$threeStar+$fourStar+$fiveStar),1);
  $star=round($total);
}

?>
<body>

  <div class="container" >
    <div>
      <div class="row" style="margin-top: 100px;">
        <div class="col-sm-3">
          <h4>Rating and Reviews</h4>
          <h2 class="bold padding-bottom-7"><?php echo $total; ?> <small>/ 5</small></h2>
          <button type="button" class="btn btn-sm <?php if($star >= 1) echo "btn-warning"; else echo " btn-default btn-grey";?>" aria-label="Left Align">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-sm <?php if($star >= 2) echo "btn-warning"; else echo " btn-default btn-grey";?>" aria-label="Left Align">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-sm <?php if($star >= 3) echo "btn-warning"; else echo " btn-default btn-grey";?>" aria-label="Left Align">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-sm <?php if($star >= 4) echo "btn-warning"; else echo " btn-default btn-grey";?>" aria-label="Left Align">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-sm <?php if($star >= 5) echo "btn-warning"; else echo " btn-default btn-grey";?>" aria-label="Left Align">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </button>

        </div>
        <div class="col-sm-3">
          <div class="pull-left">
            <div class="pull-left" style="width:35px; line-height:1;">
              <div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width:180px;">
              <div class="progress" style="height:9px; margin:8px 0;">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fiveStar*10; ?>%">
                  <span class="sr-only">9880%</span>
                </div>
              </div>
            </div>
            <div class="pull-right" style="margin-left:10px;"><?php echo $fiveStar; ?></div>
          </div>

          <div class="pull-left">
            <div class="pull-left" style="width:35px; line-height:1;">
              <div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width:180px;">
              <div class="progress" style="height:9px; margin:8px 0;">
                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fourStar*10; ?>%">
                  <span class="sr-only">4120%</span>
                </div>
              </div>
            </div>
            <div class="pull-right" style="margin-left:10px;"><?php echo $fourStar; ?></div>
          </div>
          <div class="pull-left">
            <div class="pull-left" style="width:35px; line-height:1;">
              <div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width:180px;">
              <div class="progress" style="height:9px; margin:8px 0;">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $threeStar*10; ?>%">
                  <span class="sr-only">2640%</span>
                </div>
              </div>
            </div>
            <div class="pull-right" style="margin-left:10px;"><?php echo $threeStar; ?></div>
          </div>
          <div class="pull-left">
            <div class="pull-left" style="width:35px; line-height:1;">
              <div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width:180px;">
              <div class="progress" style="height:9px; margin:8px 0;">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $twoStar*10; ?>%">
                  <span class="sr-only">880%</span>
                </div>
              </div>
            </div>
            <div class="pull-right" style="margin-left:10px;"><?php echo $twoStar; ?></div>
          </div>
          <div class="pull-left">
            <div class="pull-left" style="width:35px; line-height:1;">
              <div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width:180px;">
              <div class="progress" style="height:9px; margin:8px 0;">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $oneStar*10; ?>%">
                  <span class="sr-only">3120%</span>
                </div>
              </div>
            </div>
            <div class="pull-right" style="margin-left:10px;"><?php echo $oneStar; ?></div>
          </div>
        </div>
      </div>
    </div>
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

        <div class="collapse navbar-collapse" id="example-nav-collapse">
          <ul class="nav navbar-nav">
            <li><a href="nomination.html"><span class="subFont"><strong>Nomination's List</strong></span></a></li>
            <li><a href="feedbackReport.php"><span class=""><strong>Feedback Report</strong></span></a></li>
          </ul>
          <span class="normalFont"><a href="admin.html" class="btn btn-success navbar-right navbar-btn"><strong>Admin
                Panel</strong></a></span>
        </div>

      </div> 
    </nav>

    <div class="container" style="margin-top: 32px;">
      <div class="row">
        <div class="col-sm-12" style="border:2px solid gray;">
          <form method="post" action="addFeedback.php">
            <div class="div">
              <p></p>
              <input type="hidden" id="php1_hidden" value="1">
              <img src="images/star.png" onmouseover="change(this.id);" id="php1" class="php">
              <input type="hidden" id="php2_hidden" value="2">
              <img src="images/star.png" onmouseover="change(this.id);" id="php2" class="php">
              <input type="hidden" id="php3_hidden" value="3">
              <img src="images/star.png" onmouseover="change(this.id);" id="php3" class="php">
              <input type="hidden" id="php4_hidden" value="4">
              <img src="images/star.png" onmouseover="change(this.id);" id="php4" class="php">
              <input type="hidden" id="php5_hidden" value="5">
              <img src="images/star.png" onmouseover="change(this.id);" id="php5" class="php">
            </div>

            <label for="">Comments:</label><br>
            <textarea name="comment" rows="4" cols="50" placeholder="Enter your comments..."></textarea>
            <input type="hidden" name="phprating" id="phprating"><br>
            <input type="submit" value="Submit" name="submit_rating">
          </form>
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