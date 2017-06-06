<?php
include 'connectvarsEECS.php';

// connect
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
die('Could not connect: ' . mysqli_error());
}


$table = "Course";


//      ########FUNCTIONS#########

function checkInput($data) {

if (gettype($data) == "string") {
  $data = htmlspecialchars($data);
  $data = trim($data);
  if (strlen($data) < 1 || strlen($data) > 10)
    return -1;
}
return $data;
}

function checkInput2($data) {

if (gettype($data) == "string") {
  $data = htmlspecialchars($data);
  $data = trim($data);
  if (strlen($data) < 1 || strlen($data) > 40)
    return -1;
}
return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {


// insert into table if input is proper
$tag = checkInput($_POST["tag"]);
$name = checkInput2($_POST["name"]);

$array = array($name, $tag);
foreach ($array as &$value) {
  if($value == -1) {
    //die(mysqli_error());
    $conn->close();
    ?>
    <script type='text/javascript'>
        alert("Please enter valid inputs");
      window.location = "createReview.php";
    </script>
    <?php
  }
}

$sql = "SELECT CourseTag FROM Course WHERE CourseTag = '$tag' OR subject = '$name'";

if(mysqli_query($conn, $sql)->num_rows == 0) {
  $sqlInsert = "INSERT INTO Course (CourseTag, subject)
  VALUES ('$tag', '$name')";
  if(!mysqli_query($conn, $sqlInsert)) {
    //die(mysqli_error());
    $conn->close();
    ?>
    <script type='text/javascript'>
      alert("If you're reading this, we messed up. Sorry.");
      window.location = "createReview.php";
    </script>
    <?php
  }
  else {
    $conn->close();
    ?>
    <script type='text/javascript'>
      alert("Course sucessfully added.");
      window.location = "createReview.php";
    </script>
    <?php
  }
}
else {
  $conn->close();
  ?>
  <script type='text/javascript'>
    alert("Course already exists under another tag, or vice versa.");
    window.location = "createReview.php";
  </script>
  <?php
}
}
