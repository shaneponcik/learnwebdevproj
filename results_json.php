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
				$json = file_get_contents("results.json");
				$json = json_decode($json,true);

				foreach($json['races'] as $entry){
					if($entry["year"] == $year){
						echo "<h1>" . $entry["name"] . ": " . $entry["result"] . "</h1>";
					}
				}
			}
			?>
		</div>
	</div>

	<div id="footer">
		<h1>Produced by Shane Poncik</h1>
		<a href="https://www.facebook.com/profile.php?id=100008310640047" class="fa fa-facebook"></a>
		<a href="https://twitter.com/ShanePoncik" class="fa fa-twitter"></a>
		<a href="https://www.instagram.com/shaneponcik_/" class="fa fa-instagram"></a>
	</div>
</body>

</html>
