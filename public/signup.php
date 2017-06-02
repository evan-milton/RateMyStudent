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
    <h1>Create an Account</h1>
    <form action="signup.php" method="post">
      <div class="form-group">
        <label for="userName">Username</label>
        <input type="text" class="form-control" id="userName" name="userName" placeholder="">
      </div>
      <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="">
      </div>
      <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Just make sure it's secure">
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

function checkUsername($data, $table, $conn) {
  $data = htmlspecialchars($data);
  $data = trim($data);
  $query = "SELECT * FROM $table WHERE Username='$data'";
  if(mysqli_query($conn, $query)->num_rows > 0) {
    return -1;
  }
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
      die('Invalid user input ' . mysqli_error());
    }
  }

  $sql = "INSERT INTO $table (Username, firstName, lastName, password)
  VALUES ('$userName', '$firstName', '$lastName', '$password')";

  if(!mysqli_query($conn, $sql)) {
    die('Error inserting to table ' . mysqli_error());
  }
}


// close
$conn->close();

?>
</html>
