<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "moocs160";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
	
	session_start();
	$user = $_SESSION["username"];
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Account</title>

		<!-- Bootstrap core CSS -->
		<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="jumbotron.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
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
				<li ><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="course.php">Courses</a></li>
				<li class="active"><a href="account_info.php">Account</a></li>
				<li><a href="signup.php">Sign Up</a></li>
			  </ul>
			</div><!--/.nav-collapse -->
		  </div>
		</nav>
		
		<div class="container">
			<div class="jumbotron">
				<div class="trans">
					<h1>Account</h1>
					<!-- Display username -->
					<?php
						echo "<p>" .$_SESSION['username'] . "</p>";
					?>
					
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					<h2>Previous Courses</h2>
					<!-- Add previous courses user has taken here -->
					<?php
						// Get last 3 courses taken
						$query = "SELECT course_data.title, course_data.course_image, course_data.course_link FROM course_data, courses_taken WHERE 
									courses_taken.course_id = course_data.id AND courses_taken.username = '$user' ORDER BY courses_taken.id DESC LIMIT 3";
						$result = mysqli_query($conn, $query);
						
						if (mysqli_num_rows($result) > 0) {
							
							while ($row = mysqli_fetch_array($result)) {
								$img = $row['course_image'];
								$link = $row['course_link'];
								echo "<p class='lead'>
										<a href='$link'>
										<button type='button' class='btn btn-primary-outline btn-block'>
											" . $row['title'] . 
											"<img class='featurette-image img-responsive center-block' src='$img' style='width:75px;height:75px'>
										</button>
										</a>
										</p>";
							}
						}
						else {
							echo "<p class='lead'>No courses taken</p>";
						}
						
						
					?>
					<a href="previous_courses.php"><button type='button' class='btn btn-primary'>View All Courses Taken >></button></a>
				</div>
				<div class="col-xs-6">
					<h2>Recommended Courses</h2>
					<!-- Add follow up or similar courses to what user has taken here -->
					<?php
						
						if (mysqli_num_rows($result) == 0) {
							$query = "SELECT title, course_image FROM course_data WHERE title LIKE '%Beginner%' OR title LIKE '%Intro%' ORDER BY RAND() LIMIT 3";
						}
						else {
							$maketemp = "CREATE TEMPORARY TABLE `temp_table` (
								`category` varchar(100) UNIQUE NOT NULL
							)";
							
							mysqli_query($conn, $maketemp);
							
							$insertTemp = "INSERT IGNORE INTO temp_table (`category`) SELECT course_data.category
									FROM course_data, courses_taken WHERE 
									courses_taken.course_id = course_data.id AND courses_taken.username = '$user'";
									
							mysqli_query($conn, $insertTemp);
							
							$query = "SELECT course_data.title, course_data.course_image, course_data.course_link FROM temp_table, course_data, courses_taken
										WHERE course_data.category LIKE temp_table.category AND course_data.id != courses_taken.course_id
										GROUP BY (course_data.id) ORDER BY RAND() LIMIT 3";
						}
						
						//$query = "SELECT title, course_image FROM course_data WHERE title LIKE '%Beginner%' OR title LIKE '%Intro%' LIMIT 3";
						$result = mysqli_query($conn, $query);
						
						while ($row = mysqli_fetch_array($result)) {
							$img = $row['course_image'];
							$link = $row['course_link'];
								echo "<p class='lead'>
										<a href='$link'>
										<button type='button' class='btn btn-primary-outline btn-block'>
											" . $row['title'] . 
											"<img class='featurette-image img-responsive center-block' src='$img' style='width:75px;height:75px'>
										</button>
										</a>
										</p>";
						}
						
						mysqli_close($conn);
					?>
					
				</div>
				
			</div>
		</div>
	
	</body>
  
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</html>