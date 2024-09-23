<?php 
session_start();
include("../db/dbConnection.php");
include("../url.php");  
include("action/function.php");

if(isset($_GET['traineeId']) && $_GET['traineeId'] != ''){
    $trainee_id = $_GET['traineeId'];
    $verified_id = $_SESSION['id'];
}else{
    $trainee_id = $_SESSION['id'];
    // $verified_id = $user_id;
}


// Define the global variable at the beginning of your script or wherever appropriate
$verified_id1 = ''; 

function checkApplication($id, $conn, $trainee_id) {
    global $verified_id1; // Declare the global variable inside the function

    $sql_track = "
    SELECT 
        jt.status,
        jt.verified_id,
        jt.role
    FROM 
        application_track AS a,
        JSON_TABLE(a.application_details, '$[*]' COLUMNS (
            app_id VARCHAR(255) PATH '$.app_id',
            verified_id VARCHAR(255) PATH '$.verified_id',
            status VARCHAR(255) PATH '$.status',
            role VARCHAR(255) PATH '$.role',
            timestamp VARCHAR(255) PATH '$.timestamp'
        )) AS jt
    WHERE 
        jt.app_id = '$id' AND a.student_id = '$trainee_id'
    ORDER BY
        jt.timestamp DESC
    LIMIT 1;
    ";
    
    $sql_track_res = mysqli_query($conn, $sql_track);
    $row_track = $sql_track_res->fetch_assoc();
    
    if ($row_track) {
        $status = $row_track['status'];
        $role = $row_track['role'];

        // Set the global variable instead of session
        $verified_id1 = $row_track['verified_id'];

        if ($status == 'inprogress' && $role == '10') {
            return 'tableproceess'; // Yellow background
        }
        if ($status == 'Complete' && $role == '10') {
            return 'tablecomplete'; // Blue background
        }
        if ($status == 'inprogress' && $role == '6') {
            return 'tableproceess'; // Yellow background
        }
        if ($status == 'Complete' && $role == '6') {
            return 'trainerTablecomplete'; // Green background
        }
    }
    return ''; // Return an empty string if the condition is not met
}

// Now you can access $verified_id1 after the function is called


// user id get functon
function getUserIdByAppId($id, $conn,$trainee_id,$verified_id1) {
    $sql = "
    SELECT 
        jt.verified_id
    FROM 
        application_track AS a,
        JSON_TABLE(
            a.application_details, 
            '$[*]' COLUMNS (
                user_id VARCHAR(255) PATH '$.user_id',
                app_id VARCHAR(255) PATH '$.app_id',
                verified_id VARCHAR(255) PATH '$.verified_id',
                status VARCHAR(255) PATH '$.status',
                role VARCHAR(255) PATH '$.role',
                timestamp VARCHAR(255) PATH '$.timestamp'
            )
        ) AS jt
    WHERE 
        jt.app_id = '$id' AND jt.verified_id = '$verified_id1' AND a.student_id='$trainee_id'
    ORDER BY
        jt.timestamp DESC
    LIMIT 1;
    ";
    
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    
    if ($row) {
        return $row['verified_id'];
    }
    return ''; // Return an empty string if no result is found
}

// get time stamp function
function getTimestampByAppId($id, $conn,$trainee_id,$verified_id1) {
    $sql = "
    SELECT 
        jt.timestamp
    FROM 
        application_track AS a,
        JSON_TABLE(a.application_details, '$[*]' COLUMNS (
            user_id VARCHAR(255) PATH '$.user_id',
            app_id VARCHAR(255) PATH '$.app_id',
            verified_id VARCHAR(255) PATH '$.verified_id',
            status VARCHAR(255) PATH '$.status',
            role VARCHAR(255) PATH '$.role',
            timestamp VARCHAR(255) PATH '$.timestamp'
        )) AS jt
    WHERE 
        jt.app_id = '$id' AND jt.verified_id = '$verified_id1' AND a.student_id='$trainee_id'
    ORDER BY
        jt.timestamp DESC
    LIMIT 1;
    ";
    
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    
    if ($row) {
        return $row['timestamp'];
    }
    return ''; // Return an empty string if no result is found
}

?>
<!doctype html>
<html lang="en">

<?php include("head.php");?>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper --> 

            <?php
			 if ( $_SESSION['role'] == '10' ||$_SESSION['is_admin'] == 'True') {
				 include("left.php");
             } else{
                include("../RoririSoftware/left.php");
             }
					?>
		<!--end sidebar wrapper -->
		<!--start header -->
        <?php
			 if ( $_SESSION['role'] == '10' ||$_SESSION['is_admin'] == 'True') {
				 include("top.php");
             } else{
                include("../RoririSoftware/top.php");
             }
					?>
		<!--end header -->
        <?php include "formApplication.php"?>
		<!--start page wrapper -->
		<div class="page-wrapper">
        <div class="page-content">
          <div class="page-title-box">
              <div class="page-title-right">
                  <h4 class="page-title">Application</h4>
                  <?php
                  if ( $_SESSION['role'] == '6' ||$_SESSION['is_admin'] == 'True') { ?>
                  <button type="button" class="btn btn-danger me-auto" onclick="javascript:location.href='trainee.php'"><i
                  class='bx bx-arrow-back'></i></button>
                  <?php } ?>
                  </div>
              </div>      
          </div>
    
          <div class="container-fluid">
       
                                                          
                                    <div class="row">
                                      <div class="col-sm-12">
                                      <div class="table-responsive">
                                      <table id="example4" class="table-responsive table-striped table-bordered w-100" style="display:none;">
    <thead>
        <tr role="row">
            <th>S. No</th>
            <th>Application Name</th>
            <th>Duration</th>
            <th>Date</th>

            <th>Verified By</th>
            <?php
            if ($_SESSION['is_admin'] !== 'True') { 
                ?>
            <th>Action</th>
            <?php }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php

                
        $selQuery = "SELECT * FROM `application_tbl` WHERE application_status ='Active'";

        $resQuery = mysqli_query($conn, $selQuery);

        if (!$resQuery) {
            // Print the error message
            die("SQL Error: " . mysqli_error($conn));
        }

        $i = 1;
        while ($row = mysqli_fetch_array($resQuery, MYSQLI_ASSOC)) { 
            $application_id = $row['application_id'] ?? '0';
            $application_name = $row['application_name'];
            $application_duration = $row['application_duration'];
            $application_discription = $row['application_discription'];
        
            // Call the function and get the CSS class
            $rowClass = checkApplication($application_id, $conn,$trainee_id);
            $user_id_new = getUserIdByAppId($application_id, $conn,$trainee_id,$verified_id1);
            $date_time = getTimestampByAppId($application_id, $conn,$trainee_id,$verified_id1);
        ?>
            <tr class="odd <?php echo $rowClass; ?>">
                <td class="border"><?php echo $i; ?></td>
                <td class="border"><?php echo $application_name; ?></td>
                <td class="border"><?php echo $application_duration . " hours"; ?></td>
                <td class="border"><?php echo $date_time; ?></td>
             
                <td class="border">
                <?php 
                    echo  trainerName($user_id_new); 
                
                ?>
            </td>


            <?php if ($_SESSION['is_admin'] !== 'True') : ?>
    <td class="border">
        <?php 
        // Check if the user is not a trainer (role '10') or, if the user is a trainer, ensure that the row is not complete
        if ($_SESSION['role'] !== '10' || ($rowClass !== "trainerTablecomplete" && $_SESSION['role'] === '10')) : 
        ?>
            <button type="button" class="btn btn-circle btn-info text-white modalBtn"  
                    data-colorCode="<?php echo $rowClass; ?>" 
                    onclick="goEditApplication('<?php echo $application_id; ?>', this, '<?php echo $trainee_id; ?>')" 
                    data-bs-toggle="modal" data-bs-target="#addApplicationtrackModal"
                    <?php echo $rowClass === "trainerTablecomplete" ? '' : ''; // Disable if rowClass is complete ?>
            >
                <i class='bx bx-pencil'></i>
            </button>
        <?php endif; ?>
    </td>
<?php endif; ?>



            
            </tr>
        <?php
            $i++; // Increment $i after printing
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
    <!-- end search modal -->
	<!--end switcher-->
	<!-- Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->



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
   
    $('#example4').hide(); // Hide the table initially
   
    // Initialize DataTable
    var table = $('#example4').DataTable({
        "paging": true, // Enable pagination
        "ordering": true, // Enable sorting
        "searching": true, // Enable searching
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "processing": true, // Show processing indicator
        "drawCallback": function() {
           
            $('#example4').show();
        }
    });

});
</script>

    
    <script>
     //edit load ----------
        
        function goEditApplication(id,element,userId) {
    // alert(id);
    var colorCode = $(element).attr('data-colorCode'); // Access the colorCode attribute

    if(colorCode =="tableproceess"){
        $('#application_status').val("inprogress");
        } else if(colorCode =="tablecomplete"){
            $('#application_status').val("Complete");
        };

    $('#app_form_id').val(id); // Correctly set the value of the element
    $('#traineeId').val(userId); // Correctly set the value of the element
     // Reset the form
     // Ensure the element with id 'app_id' exists before setting its value
  
        
    
}


   // Ajax form submission
       $('#addApplicationForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            var form = this; // Get the form element
            // if (form.checkValidity() === false) {
            //     // If the form is invalid, display validation errors
            //     form.reportValidity();
            //     return;
            // }

            var formData = new FormData(form);
            // Re-enable the submit button on error
            $('#submitCoursebtn').prop('disabled', true);

            $.ajax({
                url: 'action/actApplicationTrack.php',
                type: 'POST',
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
            $('#addApplicationtrackModal').modal('hide');
            // Remove the backdrop after hiding the modal
        $('.modal-backdrop').remove();
            $('#example4').load(location.href + ' #example4 > *', function() {
              $('#example4').DataTable().destroy();
              $('#example4').DataTable({
                "paging": true, // Enable pagination
                "ordering": true, // Enable sorting
                "searching": true // Enable searching
              });
            });
            $('#submitCoursebtn').prop('disabled', false);
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: response.message
          });
          $('#submitCoursebtn').prop('disabled', false);
        }
      },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle error response
                    alert('Error adding university: ' + textStatus);
                }
            });
        });
        
        
       


    

 







    


    </script>
     <script src="<?php echo $app; ?>"></script> 
     
</body>
</html>