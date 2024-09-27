<?php
session_start();

include("../db/dbConnection.php");
include("../url.php");    
   $selQuery = "SELECT `inte_cou_id`, `intern_course_name`, `course_logo` FROM `inter_course_tbl` WHERE status = 'Active'";
    
    $resQuery = mysqli_query($conn , $selQuery); 
    
?>
<!doctype html>
<html lang="en">

<?php include("head.php");?>

<body>
<style>
        .error-message {
            color: red;
            display: none;
        }
        .error {
            border-color: red;
        }
    </style>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
        <?php include "internshipLeft.php";?>
		<!--end sidebar wrapper -->
		<!--start header -->
			<?php include("top.php");?>
		<!--end header -->
		<!--start page wrapper -->
        <?php include("formCourse.php");?>
		
		<div class="page-wrapper">
			<div class="page-content">


            <div class="page-title-box">
                
                <div class="page-title-right">
                    <h2 class="page-title">Course</h2>
                    <div class="col text-end pb-3">
                    <button type="button" id="addCourse" class="btn btn-primary px-5 radius-30" data-bs-toggle="modal" data-bs-target="#courseModal">Add Course</button>
                    </div>

                </div>
                   
            </div>

            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-5" id="courseContainer">

            <?php  while($row = mysqli_fetch_array($resQuery , MYSQLI_ASSOC)) { 
                 $id        = $row['inte_cou_id'];  
                 $name      =$row['intern_course_name'];   
                 $logo      = $row['course_logo']; 
            ?>
                    <div class="col">
						<div class="card border-primary border-bottom border-3 border-0">
							<img src="https://asset.inforiya.in/ERP/ERP_image/InternCourse/<?php echo $logo; ?>" class="card-img-top" alt="...">
							<div class="card-body">
								<h4 class="my-1 text-center"><?php echo $name; ?></h4>
								<hr>
								<div class="d-flex justify-content-center align-items-center gap-2">
									<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCourseModal">
                                        <i class='bx bx-pencil'></i> Edit
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class='bx bx-trash'></i> Delete
                                    </button>
								</div>
							</div>
						</div>
					</div>
            <?php } ?>  

         

					
					</div>
				</div>
			</div><!--end page-content-->
		</div>
			
		<!--end page wrapper -->
		<!--start overlay-->
		 <?php include("footer.php"); ?>
	</div>
	<!--end wrapper-->


	



	<!--start switcher-->

	<!--end switcher-->
	<!-- Bootstrap JS -->
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
        <!-- Include the function.js -->
        <script src="../assets/js/function.js"></script>
<script>
        // jQuery for handling the form submission
$('#saveCourse').on('click', function (event) {
    event.preventDefault(); // Prevent default form submission
    var formData = new FormData(); // Create FormData object to hold course name and logo file

    formData.append('course_name', $('#courseName').val()); // Append course name
    formData.append('course_logo', $('#courseLogo')[0].files[0]); // Append the logo file

    $.ajax({
        url: 'action/actInternCourse.php', // PHP file to handle data insertion
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json', // Expecting a JSON response from the server
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    timer: 2000
                }).then(function () {
                    $('#courseModal').modal('hide'); // Close the modal
                    $('.modal-backdrop').remove(); // Remove the backdrop
                    
                    // Reload the card container after the modal closes
                    setTimeout(function () {
                        $('#courseContainer').load(location.href + ' #courseContainer > *', function () {
                            // If you need to reinitialize any scripts inside the container, you can do it here
                        });
                    }, 300);
                });

                // Reset the form after successful submission
                resetForm('courseForm');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('Error: ' + error);
            alert('Error while saving course.');
        }
    });
});

// edit submit form----------------

        // jQuery for handling the form submission
        $('#editSaveCourse').on('click', function (event) {
    event.preventDefault(); // Prevent default form submission
    var formData = new FormData(); // Create FormData object to hold course name and logo file
    formData.append('course_id', $('#course_id').val()); // Append course name     
    formData.append('editCourseName', $('#editCourseName').val()); // Append course name
    formData.append('editCourseLogo', $('#editCourseLogo')[0].files[0]); // Append the logo file

    $.ajax({
        url: 'action/actInternCourse.php', // PHP file to handle data insertion
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                    timer: 2000
                                }).then(function () {
                                    $('#editCourseModal').modal('hide'); // Close the modal
                                    $('.modal-backdrop').remove(); // Remove the backdrop
                                   
                                });

                                // Reset the form after successful submission
                                resetForm('courseForm');
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message
                                });
                            }
        },
        error: function (xhr, status, error) {
            // Handle error response
            console.error('Error: ' + error);
            alert('Error while saving course.');
        }
    });
});


function goEditClient(id) 
  
  {
    
    $.ajax({
        url: 'action/actInternCourse.php',
        method: 'POST',
        data: {
            editIdCourse: id
        },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
			

          $('#course_id').val(response.inte_cou_id);
          $('#editCourseName').val(response.intern_course_name);
        //   $('#courseEdit').val(response.course_id);
           
   
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    }


 // Reset the form when the close button is clicked
 $('#addCourse').click(function () {
         resetForm('courseForm');
     });

</script>

    
    <script>
 
function goDeleteClient(id)
{
    //alert(id);
    if(confirm("Are you sure you want to delete Client?"))
    {
      $.ajax({
        url: 'action/actClient.php',
        method: 'POST',
        data: {
          clientdeleteId: id
        },
        //dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
          $('#example2').load(location.href + ' #example2 > *', function() {
                               
            if ($.fn.DataTable.isDataTable('#example2')) {
                                $('#example2').DataTable().destroy();
                            }
                            var table = $('#example2').DataTable({
                                "paging": true,
                                "ordering": true,
                                "searching": true,
                                lengthChange: false,
                                buttons: ['copy', 'excel', 'pdf', 'print']
                            });

                            table.buttons().container()
                                .appendTo('#example2_wrapper .col-md-6:eq(0)');
                            });
                            // Show SweetAlert based on the response
                                if (response.success) {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Deleted',
                                                text: response.message,
                                                timer: 2000
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
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    }
}
//Data Table script 
    </script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
</script>

    <!--Handles the Ajax call-->
<script>
        $(document).ready(function () {


                // Handle the form submission
                $('#submitBtn').click(function (e) {
                    e.preventDefault(); // Prevent default form submission

                    var isValid = true;

                    // Validate fields
                    isValid &= validateName('Cname', 'nameError');
                    isValid &= validateField('compName', 'companyError');
                    isValid &= validatePhoneNumber('cPhone', 'phoneError');
                    isValid &= validateEmail('cEmail', 'emailError');
                   
                    isValid &= validateField('cAddress', 'addressError');
                    

                    if (isValid) {
                        $('#addClient').trigger('submit'); // Manually trigger the form submit event if validation passes
                    }
                });

                // Handle the form submission via AJAX
                $('#addClient').off('submit').on('submit', function (e) {
                    e.preventDefault(); // Prevent normal form submission

                    var formData = new FormData(this);
                    $.ajax({
                        url: "action/actClient.php",
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: 'json', // Expect JSON response
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                    timer: 2000
                                }).then(function () {
                                    $('#addClientModal').modal('hide'); // Close the modal
                                    $('.modal-backdrop').remove(); // Remove the backdrop
                                    setTimeout(function () {
                                        $('#example2').load(location.href + ' #example2 > *', function () {
                                            if ($.fn.DataTable.isDataTable('#example2')) {
                                                $('#example2').DataTable().destroy();
                                            }
                                            var table = $('#example2').DataTable({
                                                "paging": true,
                                                "ordering": true,
                                                "searching": true,
                                                lengthChange: false,
                                                buttons: ['copy', 'excel', 'pdf', 'print']
                                            });
                                            table.buttons().container()
                                                .appendTo('#example2_wrapper .col-md-6:eq(0)');
                                        });
                                    }, 300);
                                });

                                // Reset the form after successful submission
                                resetForm('addClient');
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred while adding Client data.'
                            });
                        }
                    });
                });

               
        });

                // Function to reset the form and hide error messages
                function resetForm(formId) {
                document.getElementById(formId).reset(); // Reset the form
                $('.error-message').hide(); // Hide all error messages
                }

</script>
<script>

//--------------Handles edit Clients-----------------------------//

document.addEventListener('DOMContentLoaded', function() {
$('#updateBtn').click(function(e) {
        e.preventDefault();
        var isValid = true;
        // Validate fields
       
        // Validate fields
        isValid &= validateName('CnameE', 'nameErrorE');
        isValid &= validateField('compNameE', 'comErrorE');
        isValid &= validatePhoneNumber('cPhoneE', 'phoneErrorE');
        isValid &= validateEmail('cEmailE', 'emailErrorE');
        isValid &= validateField('cAddressE', 'addressErrorE');

        if (isValid) {
                        $('#editClient').trigger('submit'); // Manually trigger the form submit event if validation passes
                    }
                });

                // Handle the form submission via AJAX
                $('#editClient').off('submit').on('submit', function (e) {
                    e.preventDefault(); // Prevent normal form submission

                    var formData = new FormData(this);
                    $.ajax({
                        url: "action/actClient.php",
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: 'json', // Expect JSON response
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Updated',
                                    text: response.message,
                                    timer: 2000
                                }).then(function () {
                                    $('#editClientModal').modal('hide'); // Close the modal
                                    $('.modal-backdrop').remove(); // Remove the backdrop
                                    setTimeout(function () {
                                        $('#example2').load(location.href + ' #example2 > *', function () {
                                            if ($.fn.DataTable.isDataTable('#example2')) {
                                                $('#example2').DataTable().destroy();
                                            }
                                            var table = $('#example2').DataTable({
                                                "paging": true,
                                                "ordering": true,
                                                "searching": true,
                                                lengthChange: false,
                                                buttons: ['copy', 'excel', 'pdf', 'print']
                                            });
                                            table.buttons().container()
                                                .appendTo('#example2_wrapper .col-md-6:eq(0)');
                                        });
                                    }, 300);
                                });

                               
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred while Editing Clients data.'
                            });
                        }
                    });
                });
                $('#editCloseBtn').click(function () {
                    hideErrorMessages(); // Call the function to hide error messages
                });
        });


</script>
	
	<!--app JS-->
	<script src="<?php echo $app; ?>"></script>
</body>

</html>