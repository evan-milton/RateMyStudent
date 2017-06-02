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
		<header>
			<h1 class="site-title" id="title-button"> Rate Your Students </h1>
			<nav class= "navbar">
				<ul class="navlist">
					<li class= "navitem search-bar">
					<input type="text" id="navbar-search-input" placeholder="Search students...">
			        <button type="button" id="navbar-search-button"><i class="fa fa-male" aria-hidden="false"></i>
			        </button>
			        </lic>

			     	<li class= "navitem signin-up">
			        	<button type="button" id="sign-in-button"> Sign In </button>
			        </li>
			        <li class= "navitem signin-up">
			        	<button type="button" id="sign-up-button"> Sign Up </button>
			        </li>
							<li class="navitem signin-up">
								<?php
									if(isset($_COOKIE["user"])) {
										echo "<h4>" . $_COOKIE["user"] . "</h4>";
									}
								?>
							</li>
			    </ul>
			</nav>
			</header>

			<button type="button" id="create-review-button"> Create Review </button>
			<h1 class="rewiews-from-this-week"> Reviews from this week </h1>
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
					if($result->num_rows < 1) {
									die("Query to show fields from table failed");
					}

					$fields_num = mysqli_num_fields($result);
					echo "<table border='1'><tr>";
					// printing table headers
					for($i=0; $i<$fields_num; $i++) {
						$field = mysqli_fetch_field($result);
						echo "<td><b>{$field->name}</b></td>";
					}
					echo "</tr>\n";
					while($row = mysqli_fetch_row($result)) {
						echo "<tr>";
						// $row is array... foreach( .. ) puts every element
						// of $row to $cell variable
						foreach($row as $cell)
							echo "<td>$cell</td>";
						echo "</tr>\n";
					}
					$conn->close();
			 ?>

		  </main>
	</body>

		<script src="index.js"></script>
</html>
