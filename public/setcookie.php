<?php
include 'connectvarsEECS.php';

// connect
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
die('Could not connect: ' . mysqli_error());
}


$table = "Instructor";


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

//      #########PROCESS INPUT###########

if($_SERVER["REQUEST_METHOD"] == "POST") {


// insert into table if input is proper
$userName = checkInput($_POST["userName"]);
$password = checkInput($_POST["password"]);

$array = array($userName, $password);
foreach ($array as &$value) {
  if($value == -1) {
    //die(mysqli_error());
    $conn->close();
    ?>
    <script type='text/javascript'>
        alert("Please enter a valid username and password");
      window.location = "login.php";
    </script>
    <?php
  }
}

$sql = "SELECT * FROM $table WHERE Username = '$userName' AND password = '$password'";

if(mysqli_query($conn, $sql)->num_rows == 0) {
  //die(mysqli_error());
  $conn->close();
  ?>
  <script type='text/javascript'>
    alert("Username or password do not exist");
    window.location = "login.php";
  </script>
  <?php
}
else {
  setcookie("user", $userName, time() + (86400 * 30), "/"); // 86400 = 1 day
  echo $_COOKIE['user'];
?>

  <script type='text/javascript'>
    window.location = "index.php";
  </script>
<?php
}
}


// close
$conn->close();

?>
