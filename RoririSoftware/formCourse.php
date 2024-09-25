<!-- Modal -->
<div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="courseModalLabel">Add Course Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="courseForm" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
          <div class="mb-3">
            <label for="courseName" class="form-label">Course Name</label>
            <input type="text" class="form-control" id="courseName" required>
            <div class="invalid-feedback">
              Please provide a course name.
            </div>
          </div>
          <div class="mb-3">
            <label for="courseLogo" class="form-label">Logo Image</label>
            <input type="file" class="form-control"  id="courseLogo" accept="image/*" required>
            <div class="invalid-feedback">
              Please upload a logo image.
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="saveCourse">Save</button>
      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="courseModalLabel">Edit Course Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editCourseForm" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
          <div class="mb-3">
            <label for="courseName" class="form-label">Course Name</label>
            <input type="hidden"  id="course_id" required>
            <input type="text" class="form-control" id="editCourseName" required>
            <div class="invalid-feedback">
              Please provide a course name.
            </div>
          </div>
          <div class="mb-3">
            <label for="courseLogo" class="form-label">Logo Image</label>
            <input type="file" class="form-control"  id="editCourseLogo" accept="image/*" required>
            <div class="invalid-feedback">
              Please upload a logo image.
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="editSaveCourse">Save</button>
      </div>
    </div>
  </div>
</div>


