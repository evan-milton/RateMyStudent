<?php
// set the expiration date to one hour ago
  setcookie("user", "", time() - 3600, "/");
?>

<!-- Alerts the user and sends the user to the index page -->
<script type='text/javascript'>
  alert("User has logged out.");
  window.location = "index.php";
</script>
