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
<?php

include 'connectvarsEECS.php';
include 'header.php';
include 'display.php';

$table = "SearchTable";

//      ########FUNCTIONS#########

//Makes sure search queue is correct
function checkInput($data) {

if (gettype($data) == "string") {
  $data = htmlspecialchars($data);
  $data = trim($data);
	 $data = addslashes($data);
  if (strlen($data) < 1 || strlen($data) > 20)
    return -1;
}
return $data;
}

//      ########QUERY#########

// connect
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
die('Could not connect: ' . mysqli_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

  // insert into table if input is proper
  $searchTerm = checkInput($_POST["searchTerm"]);
  echo '<h1 class="rewiews-from-this-week">' . 'Searching for: ' . $searchTerm . ' </h1>';
  $sql = "SELECT * FROM $table WHERE
  Username LIKE \"%$searchTerm%\" OR
  title LIKE \"%$searchTerm%\" OR
  body LIKE \"%$searchTerm%\" OR
  rating LIKE \"$searchTerm\" OR
  CourseTag LIKE \"$searchTerm%\" OR
  StudentFirst LIKE \"%$searchTerm%\" OR
  StudentLast LIKE \"%$searchTerm%\" OR
  Year LIKE \"$searchTerm\" OR
  InstructorFirst LIKE \"%$searchTerm%\" OR
  InstructorLast LIKE \"%$searchTerm%\"
	ORDER BY date DESC";
  $query = mysqli_query($conn, $sql);
  displayTable($query);
}
 ?>

 </body>

 </html>
