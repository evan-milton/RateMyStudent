
// Checks if each element can be found, and if so, creates an event listener to redirect users to pages

if(document.getElementById('title-button')) {
  document.getElementById('title-button').onclick = function() {
    location.href = "index.php"
  };
}

if(document.getElementById('sign-in-button')) {
  document.getElementById('sign-in-button').onclick = function() {
    location.href = "login.php"
  };
}

if(document.getElementById('sign-up-button')) {
  document.getElementById('sign-up-button').onclick = function() {
    location.href = "signup.php"
  };
}

if(document.getElementById('create-review-button')) {
  document.getElementById('create-review-button').onclick = function() {
    location.href = "createReview.php"
  };
}

if(document.getElementById('logout-button')) {
  document.getElementById('logout-button').onclick = function() {
    location.href = "logout.php"
  };
}
