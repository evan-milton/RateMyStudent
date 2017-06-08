<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Course</h5>
      </div>
      <div class="modal-body">
        <form action="createCourse.php" method="post">
          <div class="form-group">
            <label for="tag">Course Tag</label>
            <input type="text" class="form-control" id="tag" name="tag" placeholder="Ex. CS101">
          </div>
          <div class="form-group">
            <label for="name">Course Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ex. Intro to Computer Science">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Modal for course. Self explanatory. -->
