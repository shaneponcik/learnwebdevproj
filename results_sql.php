<!DOCTYPE html>
<html lang="en">

<head>

	<!--  Meta  -->
	<meta charset="UTF-8" />
	<title>Story</title>

	<!--  Styles  -->
	<link rel="stylesheet" href="styles/basics.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="scripts/index.js"></script>
</head>

<body>
	<div class="container">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
					<a class="navbar-brand" href="#">Shane Poncik</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a href="index.html"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="story.html"><span class="glyphicon glyphicon-book"></span> Story</a></li>
						<li class="active"><a href="results.html"><span class="glyphicon glyphicon-flash"></span> Results</a></li>
						<li><a href="images.html"><span class="glyphicon glyphicon-camera"></span> Images</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div id="results-content">
			<form action="" method="post">
				Enter result year: <input type="text" name="year" />
				<input type="submit" />
			</form>

			<h2>Palmarès</h2>


			<?php

			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$year = $_REQUEST['year'];

				//login credentials
				$servername = "localhost";
				$username = "root";
				$password = "";

				//connect to server
				try {
					$conn = new PDO("mysql:host=$servername;dbname=cycling", $username, $password);
					// set the PDO error mode to exception
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					//echo "Connected successfully";
				}
				catch(PDOException $e)
				{
					echo "Connection failed: " . $e->getMessage();
				}

				//iterate through each entry in sql database and see if its of year-results
				$sql = "SELECT race, result FROM results WHERE year=$year";
				$results=$conn->query($sql);
				echo "<h2>".$year."</h2>";

				foreach($results as $row){
					echo "<h2>".$row['race'].": ".$row['result']."</h2>";
				}

				$conn = null;
			}
			?>


</html>
