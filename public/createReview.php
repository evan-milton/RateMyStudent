
<!DOCTYPE html>
<html>
<head>
  <meta charset= "utf - 8">
  <title> Rate My Student </title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Sigmar+One|VT323" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" href = "style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

  <?php
  include('header.php');
  include('createCourseModal.php');
  //Will ensure that the user is signed in by checking that there is a cookie
  if(!(isset($_COOKIE["user"]))) {
    ?>
    <script>
    alert("Need to be signed in to create a review. Redirecting to Login page...");
    window.location = "login.php";
    </script>
    <?php
  }
  ?>
  <div class="container">
    <h1>Create Review of Student</h1>
    <form action="review.php" method="post">
      <div class="form-group">
        <label for="firstname">Student's First Name</label>
        <input type="text" class="form-control" id="firstname" name="firstName" placeholder="">
      </div>
      <div class="form-group">
        <label for="lastName">Student's Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="">
      </div>
      <div class="form-group">
        <label for="cohort">Start Year</label>
        <input type="number" class="form-control" id="cohort" name="cohort" placeholder="Year the student started college">
      </div>
      <div class="form-group">
        <label for="title">Review Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="">
      </div>
      <div class="form-group">
        <label for="descriptiono">Description</label>
        <input type="text" class="form-control" id="descriptiono" name="description" rows="3" placeholder="Explain the rating..."></input>
      </div>
      <div class="form-group">
        <label for="course">Course</label><a id="myBtn course-modal" data-toggle="modal" href="#myModal"> Not listed? Create a course.</a>
        <select type="text" class="form-control" id="course" name="course">
          <?php
          include 'connectvarsEECS.php';
          // connect
          $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
          if (!$conn) {
          die('Could not connect: ' . mysqli_error());
          }
          //Generates all of the courses from the table
              $result = $conn->query("SELECT CourseTag, subject FROM Course");
              while ($row = $result->fetch_assoc()) {
                            unset($courseTag, $subject);
                            $courseTag = $row['CourseTag'];
                            $subject = $row['subject'];
                            echo '<option value="'.$courseTag.'">'.$courseTag. " - ".$subject.'</option>';

              }
          ?>
        </select>
      </div>
      <!-- Here is how the stars are created -->
      <div class="form-group">
        <label for="rating">Rating</label>
        <div class="star-rating">
          <div class="star-rating__wrap">
            <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
            <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 out of 5 stars"></label>
            <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
            <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 out of 5 stars"></label>
            <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
            <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 out of 5 stars"></label>
            <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
            <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 out of 5 stars"></label>
            <input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
            <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1" title="1 out of 5 stars"></label>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>

</body>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $('#myModal').modal(options)
    });
});
// if(document.getElementById('cohort-button')) {
//   document.getElementById('cohort-button').onclick = function() {
//     location.href = "cohortReview.php"
//   };
// }
</script>
</html>
