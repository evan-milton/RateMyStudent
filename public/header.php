<!DOCTYPE html>


<!-- Makes the header for each page -->
<header>
  <h1 class="site-title" id="title-button"> Rate My Students </h1>
  <nav class= "navbar">
    <ul class="navlist">
      <button type="button" id="create-review-button"> Create Review </button>
      <li class= "navitem search-bar">
        <form action="search.php" method="post">
            <div class="form-group">
            <input type="text" id="navbar-search-input" name="searchTerm" placeholder="Search for reviews..." required>
            <button type="submit" id="navbar-search-button"><i class="fa fa-male" aria-hidden="false"></i>
            </button>
            </div>
        </form>
      </lic>
      <?php
      //checks if the there is user cookie, and presents the right information for logged in users
      if(isset($_COOKIE["user"])) {
        echo '<li class= "navitem signin-up">';
        echo '<button type="button" id="logout-button"> Logout </button>';
        echo '</li>';
        echo '<li class= "navitem signin-up">';
        echo "<h4>" . $_COOKIE["user"] . "</h4>";
        echo '</li>';
      }
      //Otherwise provide the other set of buttons for potential new users or logged out users without a cookie
      else {
        echo '<li class= "navitem signin-up">';
        echo '<button type="button" id="sign-in-button"> Login </button>';
        echo '</li>';
        echo '<li class= "navitem signin-up">';
        echo '<button type="button" id="sign-up-button"> Sign Up </button>';
        echo '</li>';
      }
      ?>
    </ul>
  </nav>
</header>
	<script src="index.js"></script>
