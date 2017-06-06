<?php

include 'connectvarsEECS.php';
include 'display.php';

$table = "SearchTable";

//      ########FUNCTIONS#########

function checkInput($data) {

if (gettype($data) == "string") {
  $data = htmlspecialchars($data);
  $data = trim($data);
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

  $sql = "SELECT * FROM $table WHERE
  Username LIKE \"%'$searchTerm'%\" OR
  title LIKE \"%'$searchTerm'%\" OR
  body LIKE \"%'$searchTerm'%\" OR
  rating LIKE \"%'$searchTerm'%\" OR
  StudentFirst LIKE \"%'$searchTerm'%\" OR
  StudentLast LIKE \"%'$searchTerm'%\" OR
  Year LIKE \"%'$searchTerm'%\" OR
  InstructorFirst LIKE \"%'$searchTerm'%\" OR
  InstructorLast LIKE \"%'$searchTerm'%\"";

  $query = mysqli_query($conn, $sql);

 ?>
