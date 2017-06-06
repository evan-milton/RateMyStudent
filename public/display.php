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
      echo '<span style="float:right; color:#97bfe8;" class="glyphicon glyphicon-star" aria-hidden="true"></span>';
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
