<?php 
session_start();
include("../db/dbConnection.php");
include("../url.php");
$selQuery = "SELECT * FROM subject_tbl WHERE status='Active'";
$resQuery = mysqli_query($conn, $selQuery);
if (!$resQuery) {
  // If the query fails, print the error
  die("Query failed: " . mysqli_error($conn));
}
?>
<!doctype html>
<html lang="en">

<?php include("head.php");?>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
			<?php include("left.php");?>
		<!--end sidebar wrapper -->
		<!--start header -->
			<?php include("top.php");?>
		<!--end header -->
        
		<!--start page wrapper -->
		<div class="page-wrapper">
    <div class="page-content" id="subject-content">
        <div class="page-title-box">
            <div class="page-title-right">
                <h4 class="page-title">Subject</h4>
                <div class="position-relative" style="height: 80px;"> <!-- Adjust height as needed -->
                    <button type="button" id="addSubjectBtn" class="btn btn-info position-absolute end-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Add Subject
                    </button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!-- Loop to generate cards -->
                <?php
                $i = 1;
                while ($row = mysqli_fetch_array($resQuery, MYSQLI_ASSOC)) {
                    $sub_id = $row['id'];
                    $sub_name = $row['subject_name'];
                    $sub_duration = $row['duration'];
                ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $sub_name; ?></h5>
                            <p class="card-text">Duration: <?php echo $sub_duration; ?></p>
                            <button type="button" class="btn btn-warning text-white" onclick="goEditSubject(<?php echo $sub_id; ?>);" data-bs-toggle="modal" data-bs-target="#editSubjectModal">
                                <i class='bx bx-pencil'></i> Edit
                            </button>
                            <button class="btn btn-danger text-white" onclick="goDeleteSubject(<?php echo $sub_id; ?>);">
                                <i class="bx bx-trash"></i> Delete
                            </button>
                            <button type="button" class="btn btn-success text-white" onclick="goAddSyllabus(<?php echo $sub_id; ?>);">
                                <i class='bx bx-book-open'></i> Syllabus
                            </button>
                        </div>
                    </div>
                </div>
                <?php 
                $i++;
                } 
                ?>
            </div>
        </div>
    </div>
    
     <!-- Syllabus table container (initially hidden) -->
    <div class="page-content" id="syllabus-content" style="display: none;">
        <!-- This is where the new table will be loaded -->
        <h4>Syllabus Table for Subject</h4>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <button type="button" class="btn btn-danger" onclick="goBackToSubjects();">Back to Subjects</button>
            <button type="button" id="addTopicBtn" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addTopicModal">Add Topic</button>
        </div>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Topic</th>
                                    <th>Duration</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $subId = isset($_SESSION['subId']) ? $_SESSION['subId'] : 0;
                                if ($subId > 0) {
                                    // Prepare the query
                                    $topicQuery = "SELECT topic_id, topic_name, topic_duration FROM topic_tbl WHERE topic_status = 'Active' AND topic_sub_id = ?";
                                    
                                    // Use prepared statements to avoid SQL injection
                                    if ($stmt = mysqli_prepare($conn, $topicQuery)) {
                                        mysqli_stmt_bind_param($stmt, 'i', $subId); // Bind the parameter as an integer
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);
                                        
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            $topic_id = $row['topic_id'];
                                            $topic_name = $row['topic_name'];
                                            $topic_duration = $row['topic_duration'];
                                            ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo htmlspecialchars($topic_name); ?></td>
                                                <td><?php echo htmlspecialchars($topic_duration); ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-warning" onclick="goEditTopic(<?php echo $topic_id; ?>);" data-bs-toggle="modal" data-bs-target="#editTopicModal"><i class="lni lni-pencil"></i></button>
                                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="goDeleteTopic(<?php echo $topic_id; ?>);"><i class="lni lni-trash"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        mysqli_stmt_close($stmt);
                                    } else {
                                        echo "Query preparation failed: " . mysqli_error($conn);
                                    }
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

		<!--end page wrapper -->
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2024. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="<?php echo $bootsrapBundle; ?>"></script>
	<!--plugins-->
	<script src="<?php echo $js; ?>"></script>
	<script src="<?php echo $simplebar;?>"></script>
	<script src="<?php echo $mentimenu; ?>"></script>
	<script src="<?php echo $perfectScrolbar;  ?>"></script>
	<script src="<?php echo $datatableMin; ?>"></script>
	<script src="<?php echo $datatbaleBootstrap;?>"></script>
     <!-- Include Bootstrap JS (with Popper) -->
    <script src="<?php echo $popper;?>"></script>
    <script src="<?php echo $bootStackPath;?>"></script>
	<script src="<?php echo $sweetalert; ?>"></script>
  <script>
  $(document).ready(function () {
  $('#addSubjectBtn').click(function () {
    $('#addSubjectModal').modal('show'); // Show the modal
    resetForm('addSubject'); // Reset the form
  });

  function resetForm(formId) {
    document.getElementById(formId).reset(); // Reset the form
  }

  $('#addSubject').off('submit').on('submit', function(e) {
    e.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this);
    $.ajax({
      url: "action/actSubject.php",
      method: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response) {
        // Handle success response
        console.log(response);
        if (response.success) {
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: response.message,
            timer: 2000
          }).then(function() {
            resetForm('addSubject');
            $('#addSubjectModal').modal('hide'); // Hide the modal
            location.reload(); // Reload the page after modal is hidden
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: response.message
          });
        }
      },
      error: function(xhr, status, error) {
        // Handle error response
        console.error(xhr.responseText);
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'An error occurred while adding Task data.'
        });
        // Re-enable the submit button on error
        $('#submitBtn').prop('disabled', false);
      }
    });
  });
});

// ajax edit course
function goEditSubject(editId)
{ 
      $.ajax({
        url: 'action/actSubject.php',
        method: 'POST',
        data: {
          editId: editId
        },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
			// alert(editId);
      //     console.log(response.sub_id);
          // alert(response.course_name);

          $('#editId').val(response.sub_id);
          $('#edit_name').val(response.edit_name);
          $('#editsub_name').val(response.editsub_name);
          $('#edit_duration').val(response.edit_duration); 
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    
}
document.addEventListener('DOMContentLoaded', function() {
    $('#editSubject').off('submit').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var formData = new FormData(this);
        $.ajax({
            url: "action/actSubject.php",
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                // Handle success response
                
                console.log(response);
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        timer: 2000
                    }).then(function() {
                      $('#editSubjectModal').modal('hide'); // Close the modal
                        
                        $('.modal-backdrop').remove(); // Remove the backdrop 
                        location.reload();  
                          $('#scroll-horizontal-datatable').load(location.href + ' #scroll-horizontal-datatable > *', function() {
                               
                              $('#scroll-horizontal-datatable').DataTable().destroy();
                               
                                $('#scroll-horizontal-datatable').DataTable({
                                   "paging": true, // Enable pagination
                                   "ordering": true, // Enable sorting
                                    "searching": true // Enable searching
                               });
                            });
                      });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while Edit Task data.'
                });
                // Re-enable the submit button on error
                $('#updateBtn').prop('disabled', false);
            }
        });
    });
});
// delete the course
function goDeleteSubject(deleteId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'action/actSubject.php',
                method: 'POST',
                data: {
                    deleteId: deleteId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire(
                            'Deleted!',
                            response.message,
                            'success'
                        ).then(() => {
                            // Reload the data table
                            location.reload();  
                            $('#scroll-horizontal-datatable').load(location.href + ' #scroll-horizontal-datatable > *', function() {
                                $('#scroll-horizontal-datatable').DataTable().destroy();
                                $('#scroll-horizontal-datatable').DataTable({
                                    "paging": true, // Enable pagination
                                    "ordering": true, // Enable sorting
                                    "searching": true // Enable searching
                                });
                            });
                        });
                    } else {
                        Swal.fire(
                            'Error!',
                            response.message,
                            'error'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        'Error!',
                        'An unexpected error occurred. Please try again.',
                        'error'
                    );
                    console.error('AJAX request failed:', status, error);
                }
            });
        }
    });
}

function goAddSyllabus(subId) {
    // Hide the subject content and show the syllabus content
    document.getElementById('subject-content').style.display = 'none';
    document.getElementById('syllabus-content').style.display = 'block';
    document.getElementById('subId').value = subId;

    // Show the loading indicator (centered and bigger)
    var loadingIndicator = document.createElement('div');
    loadingIndicator.id = 'loadingIndicator';
    loadingIndicator.style.display = 'flex';
    loadingIndicator.style.justifyContent = 'center';
    loadingIndicator.style.alignItems = 'center';
    loadingIndicator.style.height = '200px'; // Adjust height as needed
    loadingIndicator.innerHTML = '<div class="spinner-border text-info" role="status" style="width: 3rem; height: 3rem;"><span class="visually-hidden">Loading...</span></div>';
    document.getElementById('syllabus-content').appendChild(loadingIndicator);

    // Make an AJAX request to store subId in the session
    $.ajax({
        url: 'getSyllabus.php',
        method: 'POST',
        data: { subId: subId },
        success: function(response) {
            console.log("SubId set in session: " + response);

            // Remove the loading indicator
            document.getElementById('loadingIndicator').remove();

            // Reload the syllabus content based on the subId
            $('#example2').load(location.href + ' #example2 > *', function() {
                $('#example2').DataTable().destroy();
                $('#example2').DataTable({
                    "paging": true,
                    "ordering": true,
                    "searching": true
                });
            });
        },
        error: function(xhr, status, error) {
            console.error('Failed to set SubId in session:', status, error);

            // Remove the loading indicator in case of an error
            document.getElementById('loadingIndicator').remove();
        }
    });
}


function goBackToSubjects() {
    // Show the subject content and hide the syllabus content
    document.getElementById('subject-content').style.display = 'block';
    document.getElementById('syllabus-content').style.display = 'none';
    
    // Clear the DataTable data
    var syllabusTable = $('#example2').DataTable();
    syllabusTable.clear().draw();
}


 $(document).ready(function () {
  $('#addTopicBtn').click(function () {
    resetForm('addTopic'); // Reset the form
  });

  function resetForm(formId) {
    document.getElementById(formId).reset(); // Reset the form
  }

     $('#addTopic').off('submit').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally
    
        var formData = new FormData(this);
        var submitButton = $('#topicSubmitBtn');
        submitButton.prop('disabled', true); // Disable the submit button
    
        $.ajax({
          url: "action/actTopic.php",
          method: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            // Handle success response
            console.log(response);
            if (response.success) {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: response.message,
                timer: 2000
              }).then(function() {
                resetForm('addTopic');
                submitButton.prop('disabled', false); // Re-enable the submit button
                $('#addTopicModal').modal('hide'); // Hide the modal
                $('#example2').load(location.href + ' #example2 > *', function() {
                    $('#example2').DataTable().destroy();
                    $('#example2').DataTable({
                        "paging": true,
                        "ordering": true,
                        "searching": true
                    });
                });
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message
              });
              submitButton.prop('disabled', false); // Re-enable the submit button on error
            }
          },
          error: function(xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'An error occurred while adding Topic data.'
            });
            submitButton.prop('disabled', false); // Re-enable the submit button on error
          }
        });
    });
});

function goEditTopic(editId){ 
      $.ajax({
        url: 'action/actTopic.php',
        method: 'POST',
        data: {
          editId: editId
        },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {

          $('#editTopicId').val(response.topic_id);
          $('#edit_topic_name').val(response.topic_name);
          $('#edit_topic_duration').val(response.topic_duration); 
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    
}

// delete the Topic
function goDeleteTopic(deleteId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'action/actTopic.php',
                method: 'POST',
                data: {
                    deleteId: deleteId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire(
                            'Deleted!',
                            response.message,
                            'success'
                        ).then(() => {
                            $('#example2').load(location.href + ' #example2 > *', function() {
                                $('#example2').DataTable().destroy();
                                $('#example2').DataTable({
                                    "paging": true,
                                    "ordering": true,
                                    "searching": true
                                });
                            });
                        });
                    } else {
                        Swal.fire(
                            'Error!',
                            response.message,
                            'error'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        'Error!',
                        'An unexpected error occurred. Please try again.',
                        'error'
                    );
                    console.error('AJAX request failed:', status, error);
                }
            });
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    $('#editTopic').off('submit').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var formData = new FormData(this);
        $.ajax({
            url: "action/actTopic.php",
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                // Handle success response
                
                console.log(response);
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        timer: 2000
                    }).then(function() {
                        $('#editTopicModal').modal('hide'); // Hide the modal
                        $('#example2').load(location.href + ' #example2 > *', function() {
                            $('#example2').DataTable().destroy();
                            $('#example2').DataTable({
                                "paging": true,
                                "ordering": true,
                                "searching": true
                            });
                        });
                      });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while Edit Topic data.'
                });
                // Re-enable the submit button on error
                $('#updateBtn').prop('disabled', false);
            }
        });
    });
});

</script>
<script src="<?php echo $app; ?>"></script> 
</body>

</html>
<?php include("addSubject.php");?>
<?php include("editSubject.php");?>
<?php include("addTopic.php");?>
<?php include("editTopic.php");?>