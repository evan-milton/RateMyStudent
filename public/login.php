<!DOCTYPE html>
<html>
<head>
  <meta charset= "utf - 8">
  <title> Rate My Student </title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Sigmar+One|VT323" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" href = "style.css">

</head>

	<?php include('header.php'); ?>

  <div class="container">
    <h1>Login to Your Account</h1>
    <form action="setcookie.php" method="post">
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

</html>
