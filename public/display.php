<!-- <!DOCTYPE html>
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

<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
         <div class="panel-heading">This is the title
           <span style="float:right;" class="glyphicon glyphicon-star" aria-hidden="true"></span>
         </div>
        <div class="panel-body">
          <ul class="list-inline">
            <li><strong>Student:</strong></li>
            <li>Trevor Spear</li>
          </ul>
          <ul class="list-inline">
            <li><strong>Course:</strong></li>
            <li>BA101</li>
          </ul>
            <p class="text-left">what the fuck what the fuckwhat the fuckwhat the fuckwhat the fuckwhat the fuckwhat the fuckwhat the fuckwhat the fuckwhat the fuckwhat the fuckwhat the fuckwhat the fuck</p>
          <p class="text-right" style="margin-bottom: 0;"><em>By: Username (Prof bruh)</em></p>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">Panel Content</div>
      </div>
    </div>
  </div>
</div>

</body> -->

<?php
function displayTable($result) {
  $numrows = $result->num_rows;
  echo '<div class="container-fluid">';
  echo '<div class="row">';
  echo '<div class="col-md-10 col-md-offset-1">';
  for($i; $i < $numrows; $i++) {
    $Username = mysqli_fetch_field($result)->name;
    $title = mysqli_fetch_field($result)->name;
    $body = mysqli_fetch_field($result)->name;
    $rating = mysqli_fetch_field($result)->name;
    $date = mysqli_fetch_field($result)->name;
    $Course = mysqli_fetch_field($result)->name;
    $StudentFirst = mysqli_fetch_field($result)->name;
    $StudentLast = mysqli_fetch_field($result)->name;
    $Year = mysqli_fetch_field($result)->name;
    $InstructorFirst = mysqli_fetch_field($result)->name;
    $InstructorLast = mysqli_fetch_field($result)->name;

    echo '<div class="panel panel-default">';
    echo '<div class="panel-heading">' . $title;
    for($j; $j < $rating; $j++) {
      echo '<span style="float:right;" class="glyphicon glyphicon-star" aria-hidden="true"></span>';
    }
    echo '</div>';
    echo '<div class="panel-body">';
    echo '<ul class="list-inline">';
    echo '<li><strong>Student:</strong></li>';
    echo '<li>' . $StudentFirst . ' ' . $StudentLast . '<em> (Enrolled in ' . $Year . ')</em></li>';
    echo '</ul>';
    echo '<ul class="list-inline">';
    echo '<li><strong>Course:</strong></li>';
    echo '<li>' . $Course . '</li>';
    echo '</ul>';
    echo '<p class="text-left">' . $body . '/p>';
    echo '<li class="text-left"><em>' . $date . '</li>';
    echo '<li class="text-right"><em>By: ' . $Username . '(' . $InstructorFirst . ' ' . $InstructorLast . ')</li>';
    echo '</ul>';
    echo '</div>';
    echo '</div>';
  }
  echo '</div>';
  echo '</div>';
}
?>
