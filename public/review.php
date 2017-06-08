<?php
include 'connectvarsEECS.php';

// connect
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
die('Could not connect: ' . mysqli_error());
}


$table = "Instructor";


//      ########FUNCTIONS#########

//most fields are here
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

//checks title
function checkInputBig($data) {

if (gettype($data) == "string") {
  $data = htmlspecialchars($data);
  $data = trim($data);
  $data = addslashes($data);
  if (strlen($data) < 1 || strlen($data) > 60)
    return -1;
}
return $data;
}

//cleans optional input, aka description
function checkInputOptional($data) {
  $data = htmlspecialchars($data);
  $data = trim($data);
  $data = addslashes($data);
  return $data;
}

//Makes sure the dates are within the range
function checkNumber($data) {
  if ((gettype($data) != "integer" || $data < 1970) || $data > 2020) {
    return -1;
  }
  return $data;
}

//Ensures rating is clicked
function checkNumber2($data) {
  if (gettype($data) != "integer" || $data < 0) {
    return -1;
  }
  return $data;
}

//      #########PROCESS INPUT###########

if($_SERVER["REQUEST_METHOD"] == "POST") {


// insert into table if input is proper
$firstName = checkInput($_POST["firstName"]);
$lastName = checkInput($_POST["lastName"]);
$cohort = (int)$_POST["cohort"];
$cohort = checkNumber($cohort);
$title = checkInputBig($_POST["title"]);
$description = checkInputOptional($_POST["description"]);
$course = $_POST["course"];
$rating = (int)$_POST["rating"];
$rating = checkNumber2($rating);

$array = array($firstName, $lastName, $cohort, $title, $description, $course, $rating);

foreach ($array as &$value) {
  if($value == -1) {
    //die(mysqli_error());
    $conn->close();
    ?>
    <script type='text/javascript'>
        alert("Please enter valid inputs(Most inputs under 20 chars, title under 60, year between 1970-2020, rating not selected)");
      window.location = "createReview.php";
    </script>
    <?php
  }
}

//  COHORT
$sqlCohort = "SELECT Year FROM Cohort WHERE Year = '$cohort'";

if(mysqli_query($conn, $sqlCohort)->num_rows == 0) {
  //Generates cohort if one doesn't exist
  $randVal = rand(150, 220) * 100;
  $sqlInsertCohort = "INSERT INTO Cohort (Year, size)
  VALUES ('$cohort', '$randVal')";
  if(!mysqli_query($conn, $sqlInsertCohort)) {
    //die(mysqli_error());
    $conn->close();
    ?>
    <script type='text/javascript'>
      alert("If you're reading this, we messed up. Sorry. (Cohort)");
      window.location = "createReview.php";
    </script>
    <?php
  }
}

//  STUDENT
$sqlStudent = "SELECT SSN FROM Student WHERE
Year = '$cohort' AND firstName = '$firstName' AND lastName = '$lastName'";

if(mysqli_query($conn, $sqlStudent)->num_rows == 0) {
  //Generates student if one doesn't exist
  $result = mysql_query("SHOW TABLE STATUS LIKE 'Student'");
  $data = mysql_fetch_assoc($result);
  $next_increment = $data['Auto_increment'];
  $sqlInsertStudent = "INSERT INTO Student (SSN, firstName, lastName, Year)
  VALUES ('$next_increment', '$firstName', '$lastName', '$cohort')";
  if(!mysqli_query($conn, $sqlInsertStudent)) {
    //die(mysqli_error());
    $conn->close();
    ?>
    <script type='text/javascript'>
      alert("If you're reading this, we messed up. Sorry. (Student)");
      window.location = "createReview.php";
    </script>
    <?php
  }
}

//Fetches SSN from Student table
$SSN = mysqli_query($conn, $sqlStudent)->fetch_object()->SSN;
//Fetches username from cookie
$cookie = $_COOKIE["user"];
//Fetches the current date
$date = date("Y-m-d");


//  review
$sqlReview = "INSERT INTO Review (title, body, rating, SSN, Username, CourseTag, date)
VALUES('$title', '$description', '$rating', '$SSN', '$cookie', '$course', '$date')";

//Should generate review without error
if(!mysqli_query($conn, $sqlReview)) {
  //die(mysqli_error());
  $conn->close();
  ?>
  <script type='text/javascript'>
    alert("If you're reading this, we messed up. Sorry. (Review)");
    window.location = "createReview.php";
  </script>
  <?php
}

//Otherwise notifies user of success
else {
  $conn->close();
?>
  <script type='text/javascript'>
    alert("Created review.");
    window.location = "index.php";
  </script>
<?php
}
}


// close
$conn->close();

?>
