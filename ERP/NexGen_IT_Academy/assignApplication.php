<?php 
session_start();
include("../db/dbConnection.php");
include("../url.php");
$selQuery = "SELECT * FROM application_tbl WHERE application_status = 'Active'";
$resQuery = mysqli_query($conn , $selQuery); 

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
        <div class="page-content">
                
				
                <div class="page-title-box">
                    
                    <div class="page-title-right">
                        <h4 class="page-title">Application</h4>
                        <div class="position-relative" style="height: 80px;"> <!-- Adjust height as needed -->
                                        <button type="button" id="addApplicationBtn" class="btn btn-info position-absolute end-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Add  Application
                                        </button>
                        </div>
    
                    </div>
                       
                </div>
    
                    <div class="card">
                        <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <div class="table-responsive">      
                                        <table id="example3" class="table table-responsive table-striped table-bordered w-100" style="display:none;">
                                    <thead>
                                        <tr role="row">
                                            <th >S. No</th>
                                            <th >Application</th>
                                            <th >Duration</th>
                                            <th >Discription</th>
                                            <th >Action</th></tr>
                                    </thead>
                              
                                    <tbody>
                                    <?php $i=1; while($row = mysqli_fetch_array($resQuery , MYSQLI_ASSOC)) { 
                        $application_id = $row['application_id'];
                        $application_name=$row['application_name'];
                        $application_duration=$row['application_duration'];
                        $application_discription=$row['application_discription'];
                        ?>
                          <tr class="odd">
                          <td ><?php echo $i; $i++; ?></td>
                          <td ><?php echo $application_name; ?></td>
                          <td ><?php echo $application_duration; ?></td>
                          <td ><?php echo $application_discription; ?></td>
                          <td >
                              <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditAssignApplication(<?php echo $application_id; ?>);" data-bs-toggle="modal" data-bs-target="#editAssignApplicationModal">
                                <i class='bx bx-pencil'></i>
                              </button>
                              <button class="btn btn-circle btn-danger text-white" onclick="goDeleteApplication(<?php echo $application_id; ?>);"><i class="bx bx-trash"></i></button>
                              
                          </td>
                        </tr>
                        <?php } ?>
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
$(document).ready(function() {
    // Show loader
   
    $('#example3').hide(); // Hide the table initially
   
    // Initialize DataTable
    var table = $('#example3').DataTable({
        "paging": true, // Enable pagination
        "ordering": true, // Enable sorting
        "searching": true, // Enable searching
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "processing": true, // Show processing indicator
        "drawCallback": function() {
           
            $('#example3').show();
        }
    });

});
</script>
    <script>
    $(document).ready(function () {
  $('#addApplicationBtn').click(function () {
    $('#addApplicationModal').modal('show'); // Show the modal
    resetForm('addApplication'); // Reset the form
  });

function resetForm(formId) {
    document.getElementById(formId).reset(); // Reset the form
}

  
  $('#addApplication').off('submit').on('submit', function(e) {
    e.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this);
    $.ajax({
      url: "action/actApplication.php",
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
            resetForm('addApplication');
                    $('#addApplicationModal').modal('hide');
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
          text: 'An error occurred while adding Application data.'
        });
        // Re-enable the submit button on error
        $('#submitBtn').prop('disabled', false);
      }
    });
  });
});
// ajax edit course
function goEditAssignApplication(editId) {
    $.ajax({
        url: 'action/actApplication.php',
        method: 'POST',
        data: { editId: editId },
        dataType: 'json',
        success: function(response) {
            $('#editId').val(response.application_id);
            $('#edit_application_name').val(response.application_name);
            $('#edit_application_duration').val(response.application_duration);
            $('#edit_application_discription').val(response.application_discription);
        },
        error: function(xhr, status, error) {
            console.error('AJAX request failed:', status, error);
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    $('#editAssignApplication').off('submit').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var formData = new FormData(this);
        $.ajax({
            url: "action/actApplication.php",
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
                        $('#editAssignApplicationModal').modal('hide'); // Close the modal

                        $('.modal-backdrop').remove(); // Remove the backdrop   
                        $('#scroll-horizontal-datatable').load(location.href +
                            ' #scroll-horizontal-datatable > *',
                            function() {

                                $('#scroll-horizontal-datatable')
                                    .DataTable().destroy();

                                $('#scroll-horizontal-datatable')
                                    .DataTable({
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
                    text: 'An error occurred while Edit Application data.'
                });
                // Re-enable the submit button on error
                $('#updateBtn').prop('disabled', false);
            }
        });
    });
});
// delete the course
function goDeleteApplication(deleteId) {
    //alert(id);
    if (confirm("Are you sure you want to delete Course?")) {
        $.ajax({
            url: 'action/actApplication.php',
            method: 'POST',
            data: {
                deleteId: deleteId
            },
            //dataType: 'json', // Specify the expected data type as JSON
            success: function(response) {
                $('#scroll-horizontal-datatable').load(location.href +
                    ' #scroll-horizontal-datatable > *',
                    function() {

                        $('#scroll-horizontal-datatable').DataTable().destroy();

                        $('#scroll-horizontal-datatable').DataTable({
                            "paging": true, // Enable pagination
                            "ordering": true, // Enable sorting
                            "searching": true // Enable searching
                        });
                    });


            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('AJAX request failed:', status, error);
            }
        });
    }
}
</script>
<script src="<?php echo $app; ?>"></script>
</body>
</html>
<?php include("addApplication.php"); ?>
<?php include("editAssignApplication.php"); ?>