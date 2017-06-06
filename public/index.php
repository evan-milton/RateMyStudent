<!DOCTYPE html>
<html>
	<head>
		<meta charset= "utf - 8">
		<title> Rate My Student </title>

		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Sigmar+One|VT323" rel="stylesheet">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link rel="stylesheet" href = "style.css">

	</head>

	<body>
	<?php include('header.php'); ?>
	<?php include('display.php'); ?>

			<h1 class="rewiews-from-this-week"> Reviews </h1>
			<main class="review-container">

			<?php
					include 'connectvarsEECS.php';

					$table = "SearchTable";

					// connect
					$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
					if (!$conn) {
							die('Could not connect: ' . mysqli_error());
					}

					$query = "SELECT * FROM " . $table;
					$result = mysqli_query($conn, $query);
					displayTable($result);
					$conn->close();
			 ?>

		  </main>
	</body>

		<script src="index.js"></script>
</html>
