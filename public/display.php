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
  for($i=0; $i < $numrows; $i++) {
    $row = mysqli_fetch_row($result);
    $Username = $row[0];
    $title = $row[1];
    $body = $row[2];
    $rating = $row[3];
    $date = $row[4];
    $Course = $row[5];
    $StudentFirst = $row[6];
    $StudentLast = $row[7];
    $Year = $row[8];
    $InstructorFirst = $row[9];
    $InstructorLast = $row[10];

    echo '<div class="panel panel-default">';
    echo '<div class="panel-heading">' . $title;
    for($j=0; $j < $rating; $j++) {
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
    echo '<p class="text-left">' . $body . '</p>';
    echo '<ul class="list-inline">';
    echo '<li class="text-left"><em>' . $date . '</em></li>';
    echo '<li class="text-right pull-right"><em>By: ' . $Username . ' (' . $InstructorFirst . ' ' . $InstructorLast . ')</em></li>';
    echo '</ul>';
    echo '</div>';
    echo '</div>';
  }
  echo '</div>';
  echo '</div>';
}
?>
