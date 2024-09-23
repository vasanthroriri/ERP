<?php 
session_start();
include("../db/dbConnection.php");
include("../url.php"); 
include("action/function.php");
 $subject_id =$_GET['syllabusId'];
//  $traineeId =$_GET['traineeId'];
 
//  $user_id = $_SESSION['id'];

if(isset($_GET['traineeId']) && $_GET['traineeId'] != ''){
    $trainee_id = $_GET['traineeId'];
    $verified_id = $_SESSION['id'];
}else{
    $trainee_id = $_SESSION['id'];
    // $verified_id = $user_id;
}

function checkApplication($id, $conn,$course_id,$user_id) {
    global $verified_id1; // Declare the global variable inside the function
    $sql_track = "
     SELECT 
        jt.status,
        jt.verified_id,
        jt.role
    FROM 
        syllabus_track AS a,
        JSON_TABLE(a.syl_track_details, '$[*]' COLUMNS (
            syllabus_id VARCHAR(255) PATH '$.syllabus_id',
            course_id VARCHAR(255) PATH '$.course_id',
            verified_id VARCHAR(255) PATH '$.verified_id',
            status VARCHAR(255) PATH '$.status',
            role VARCHAR(255) PATH '$.role',
            timestamp VARCHAR(255) PATH '$.timestamp'
        )) AS jt
    WHERE 
        jt.syllabus_id = '$id' AND jt.course_id = '$course_id' AND a.syl_student_id='$user_id'
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
    return ''; // Return an empty string if condition is not met
}


//user namr get function ---

function getUserIdByAppId($id, $conn,$course_id,$trainee_id,$verified_id1) {
    $sql = "
    SELECT 
        jt.verified_id
    FROM 
        syllabus_track AS a,
        JSON_TABLE(
            a.syl_track_details, 
            '$[*]' COLUMNS (
                user_id VARCHAR(255) PATH '$.user_id',
                syllabus_id VARCHAR(255) PATH '$.syllabus_id',
                course_id VARCHAR(255) PATH '$.course_id',
                verified_id VARCHAR(255) PATH '$.verified_id',
                status VARCHAR(255) PATH '$.status',
                role VARCHAR(255) PATH '$.role',
                timestamp VARCHAR(255) PATH '$.timestamp'
            )
        ) AS jt
    WHERE 
        jt.syllabus_id = '$id' AND jt.course_id = '$course_id' AND jt.verified_id = '$verified_id1' AND a.syl_student_id='$trainee_id'
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

// timestamp get funtion 
function getTimestampByAppId($id, $conn,$course_id,$trainee_id,$verified_id1) {
    $sql = "
    SELECT 
        jt.timestamp
    FROM 
        syllabus_track AS a,
        JSON_TABLE(
            a.syl_track_details, 
            '$[*]' COLUMNS (
                user_id VARCHAR(255) PATH '$.user_id',
                syllabus_id VARCHAR(255) PATH '$.syllabus_id',
                course_id VARCHAR(255) PATH '$.course_id',
                verified_id VARCHAR(255) PATH '$.verified_id',
                status VARCHAR(255) PATH '$.status',
                role VARCHAR(255) PATH '$.role',
                timestamp VARCHAR(255) PATH '$.timestamp'
            )
        ) AS jt
    WHERE 
        jt.syllabus_id = '$id' AND jt.course_id = '$course_id' AND jt.verified_id = '$verified_id1' AND a.syl_student_id='$trainee_id'
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
        <?php include("formSyllabus.php")?>
		<!--start page wrapper -->
		<div class="page-wrapper">
        <div class="page-content">
    <div class="page-title-box">
        <div class="page-title-right">
            <h4 class="page-title">Topics </h4>
        </div>
    </div>
    <!-- Add some space between the title and the button -->
    <div style="margin-top: 20px;">
        <!-- Back button -->
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Back</button>
    </div>
    </div>
    
          <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                
                                    <div class="row">
                                        
                                      
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12">
                                      <table id="example3" class="table-responsive table-striped table-bordered w-100" style="display:none;">
                                          <thead>
                                              <tr role="row">
                                                  <th>S. No</th>
                                                  <!--<th class="sorting" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 124.953px;">Course</th>-->
                                                  <th >Syllabus Name</th>
                                                   <th >Duration</th>  
                                                   <th >Date</th>  
                                              
                                            <th>Verified By</th>
                                            <?php
                                           if ($_SESSION['is_admin'] !== 'True') { 
                                             ?>
                                             <th>Action</th>
                                             <?php }
                                                 ?>
                                             
                                          </thead>
        
<tbody class="border">
<?php
$selQuery = "SELECT topic_id, topic_name, topic_duration FROM topic_tbl WHERE topic_status = 'Active' AND topic_sub_id = $subject_id";

$resQuery = mysqli_query($conn, $selQuery);

if (!$resQuery) {
    // Print the error message
    die("SQL Error: " . mysqli_error($conn));
}

// Display the results
$i = 1;
while ($row = mysqli_fetch_array($resQuery, MYSQLI_ASSOC)) { 
    $topic_id = $row['topic_id'];
    $topic_name = $row['topic_name'];
    $topic_duration = $row['topic_duration'];
    // $topic_duration = $row['application_discription'];

    $course_id=$_SESSION['course_id'];
    // Call the function and get the CSS class
    $rowClass = checkApplication($topic_id, $conn,$course_id,$trainee_id);
    $user_id = getUserIdByAppId($topic_id, $conn,$course_id,$trainee_id,$verified_id1);
    $date_time = getTimestampByAppId($topic_id, $conn,$course_id,$trainee_id,$verified_id1);
?>
  
    <tr role="row" class="odd <?php echo $rowClass; ?>">
        <td class="border"><?php echo $i; ?></td>
        <td class="border"><?php echo $topic_name; ?></td>
        <td class="border"><?php echo $topic_duration ." hours"; ?></td>
        <td class="border"><?php echo $date_time ?></td>
        
        <td class="border">
                <?php 
                    echo  trainerName($user_id); 
                
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
                    onclick="goEditSyllabus('<?php echo $topic_id; ?>', this, '<?php echo $trainee_id; ?>')" 
                    data-bs-toggle="modal" data-bs-target="#addsyllabusModal"
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
<?php
?>

                                       
                                        </table>
                                      </div>
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
   
    $('#example3').hide(); // Hide the table initially
   
    // Initialize DataTable
    var table = $('#example3').DataTable({
        "paging": true, // Enable pagination
        "ordering": true, // Enable sorting
        "searching": true, // Enable searching
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "processing": true, // Show processing indicator
        "drawCallback": function() {
           
            $('#example3').show();
        }
    });

});
</script>
    <script>

     //edit load ----------
        
        function goEditSyllabus(id,element,traineeId) {
    // alert(id);

    var colorCode = $(element).attr('data-colorCode'); // Access the colorCode attribute
        
    if(colorCode =="tableproceess"){
        // alert("if");
        $('#syllabus_status').val("inprogress");
        } else if(colorCode =="tablecomplete"){
            $('#syllabus_status').val("Complete");
        };

        $('#app_id').val(id); // Correctly set the value of the element
        $('#traineeId').val(traineeId);
    // $('#addSyllabusTrack')[0].reset(); // Reset the form
    
}


   // Ajax form submission
       $('#addSyllabusTrack').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            var form = this; // Get the form element
            // if (form.checkValidity() === false) {
            //     // If the form is invalid, display validation errors
            //     form.reportValidity();
            //     return;
            // }

            var formData = new FormData(form);
            // Re-enable the submit button on error
            $('#submitSyllabusbtn').prop('disabled', true);

            $.ajax({
                url: 'action/actSyllabusTrack.php',
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
            $('#addsyllabusModal').modal('hide');
            // Remove the backdrop after hiding the modal
        $('.modal-backdrop').remove();
            $('#example3').load(location.href + ' #example3 > *', function() {
              $('#example3').DataTable().destroy();
              $('#example3').DataTable({
                "paging": true, // Enable pagination
                "ordering": true, // Enable sorting
                "searching": true // Enable searching
              });
            });
            $('#submitSyllabusbtn').prop('disabled', false);
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: response.message
          });
          $('#submitSyllabusbtn').prop('disabled', false);
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