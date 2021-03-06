<?php
	session_start();
	
	if (isset($_SESSION["loggedin"])) {
		$loggedin = $_SESSION["loggedin"];
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="This is the contact page for Project SAND">
    <meta name="author" content="Alvin Ko">
    <link rel="icon" href="../../favicon.ico">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Project SAND</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li class="active"><a href="contact.php">Contact</a></li>
            <li><a href="courses.php">Courses</a></li>
            <?php
				if (isset($loggedin)) {
			
					if ($loggedin) {
						echo "<li><a href='account_info.php'>Account</a></li>";
						echo "<li><a href='login.php'>Sign Out</a></li>";
					}
					else {
						echo "<li><a href='login.php'>Login</a></li>";
						echo "<li><a href='signup.php'>Sign Up</a></li>";
					}
				}
				else {
					echo "<li><a href='login.php'>Login</a></li>";
					echo "<li><a href='signup.php'>Sign Up</a></li>";
				}
			?>
			
			<li>
				<form name="form1" method="post" action="course_search.php">
					<input name="search" type="text" size="40" maxlength="50"/>
					<input type="submit" name="Submit" value="Search"/>
				</form>
			</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
      <div class="jumbotron">
        <div class= "trans">
        <h1>Contact Us</h1>
        <p>Project SAND</p>
        <p><a class="btn btn-primary btn-lg" href="about.php" role="button">Learn more &raquo;</a></p>
      </div>
      </div>
    </div>

    <div class="container">
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Our Promise <span class="text-muted"></span></h2>
          <p class="lead">We at Project SAND are committed to bringing you the best of the best. Our online support is available during standard business hours from Monday to Friday, 9am to 5pm. Feel free to email us. Expect a response within 24 hours. Our office is located at Macquarie Hall in San Jose State University. </p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="image/logo1.png" alt="logo" >
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette" style="background-color:white">
        <div class="col-md-6">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Alvin</td>
                <td>Ko</td>
                <td>alvin.ko@sjsu.edu</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Dave</td>
                <td>Zheng</td>
                <td>dave.zheng@sjsu.edu</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Nick</td>
                <td>Saric</td>
                <td>nick.saric@sjsu.edu</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Steve</td>
                <td>Lee</td>
                <td>steve.lee@sjsu.edu</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <hr>

      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2015 Project SAND &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
