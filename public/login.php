<!DOCTYPE html>
<html>
<head>
  <meta charset= "utf - 8">
  <title> Rate My Student </title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Sigmar+One|VT323" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen">

  <link rel="stylesheet" href = "style.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>
  <header>
    <h1 class="site-title"> Rate Your Students </h1>
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
      </ul>
    </nav>
  </header>

  <div class="container">
    <h1>Sign in to Your Account</h1>
    <form action="login.php" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="userName" placeholder="">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>

</body>

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
    die('Invalid user input ' . mysqli_error());
  }
}

$sql = "SELECT * FROM $table WHERE Username = '$userName' AND password = '$password'";
echo $sql;

if(mysqli_query($conn, $sql)->num_rows == 0) {
  die('Username and password do not exist ' . mysqli_error());
}
else {
  setcookie("user", $userName, time() + (86400 * 30), "/"); // 86400 = 1 day
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

</html>
