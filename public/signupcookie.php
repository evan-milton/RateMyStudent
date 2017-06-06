<?php
include 'connectvarsEECS.php';

// connect
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
die('Could not connect: ' . mysqli_error());
}


$table = "Instructor";


//      ########FUNCTIONS#########

function checkUsername($data, $table, $conn) {
$data = htmlspecialchars($data);
$data = trim($data);
$query = "SELECT * FROM $table WHERE Username='$data'";
if(mysqli_query($conn, $query)->num_rows > 0) {
  //die(mysqli_error());
  $conn->close();
  ?>
  <script type='text/javascript'>
    alert("Username already exists");
    window.location = "signup.php";
  </script>
  <?php
}
$data = htmlspecialchars($data);
$data = trim($data);
if (strlen($data) < 1 || strlen($data) > 20)
  return -1;
return $data;
}

function checkInput($data) {

if (gettype($data) == "string") {
  $data = htmlspecialchars($data);
  $data = trim($data);
  if (strlen($data) < 1 || strlen($data) > 20)
    return -1;
}
return $data;
}

function checkAge($data) {

$value = (int)preg_replace("/[^\d]+/","",$data);
if ($value < 0 || $value > 130)
return -1;

return $data;
}

function checkEmail($data) {

if (gettype($data) == "string") {
  $data = htmlspecialchars($data);
  $data = trim($data);
  if (strlen($data) < 1 || strlen($data) > 40)
  return -1;
}
return $data;
}

//      #########PROCESS INPUT###########

if($_SERVER["REQUEST_METHOD"] == "POST") {


// insert into table if input is proper
$userName = checkUsername($_POST["userName"], $table, $conn);
$firstName = checkInput($_POST["firstName"]);
$lastName = checkInput($_POST["lastName"]);
$password = checkInput($_POST["password"]);

$array = array($userName, $firstName, $lastName, $password);
foreach ($array as &$value) {
  if($value == -1) {
    //die(mysqli_error());
    $conn->close();
    ?>
    <script type='text/javascript'>
      alert("Invalid input, try again");
      window.location = "signup.php";
    </script>
    <?php
  }
}

$sql = "INSERT INTO $table (Username, firstName, lastName, password)
VALUES ('$userName', '$firstName', '$lastName', '$password')";

if(!mysqli_query($conn, $sql)) {
  //die(mysqli_error());
  $conn->close();
  ?>
  <script type='text/javascript'>
    alert("If you're reading this, we messed up. Sorry.");
    window.location = "signup.php";
  </script>
  <?php
}
else {
  $conn->close();
  setcookie("user", $userName, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
  <script type='text/javascript'>
    alert("Account created. Logging in...");
    window.location = "index.php";
  </script>
<?php
}
}


// close
$conn->close();

?>
