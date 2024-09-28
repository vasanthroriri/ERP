<?php
session_start();

include("../db/dbConnection.php");
include("../url.php");
include("action/function.php"); 




   $selQuery = "SELECT 
   `intern_id`
   , `name`
   , `phone`
   , `email`
   , `mode`
   , `gender`
   , `joining_date`
   , `address`
   , `image`
   , `inte_cou_id`
   , `duration`
   , `payment`
   , `username`
   , `password`
   FROM `internship_tbl` WHERE `status` ='Active'";
    
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
			<?php include "top.php";?>
		<!--end header -->
		<!--start page wrapper -->
        <?php include "formInternship.php";?>
        <?php include "formInternPayment.php";?>
		
		<div class="page-wrapper">
        <div class="page-content">

<div class="page-title-box">
    <div class="row">
        <div class="col">
            <h2 class="page-title">Candidates</h2>
        </div>
        <div class="col text-end pb-3">
            <!-- Add Candidates Button -->
            <button type="button" id="addCondidates" class="btn btn-primary px-4 radius-30" data-bs-toggle="modal" data-bs-target="#addClientModal">
                <i class="bx bx-plus"></i>Add
            </button>
            <!-- Back Button, initially hidden -->
            <button type="button" id="backBtnView" class="btn btn-danger px-5 radius-30" style="display: none;">Back</button>
        </div>
    </div>
</div>

<!-- Candidates Table -->
<div class="card" id="condidateTable">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S. No</th>
                        <th>Name</th>
                        <th>Joining Date</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Fees</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; while($row = mysqli_fetch_array($resQuery, MYSQLI_ASSOC)) { 
                        $id = $row['intern_id'];  
                        $name = $row['name'];   
                        $phone = $row['phone'];  
                        $email = $row['email'];
                        $join_date = $row['joining_date'];   
                        $fees = $row['payment'];
                    ?>
                    <tr>
                        <td><?php echo $i; $i++; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $join_date; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $fees; ?></td>
                        <td>
                            <button class="btn btn-sm btn-outline-success" data-bs-toggle="tooltip" data-bs-placement="top" title="View" onclick="goViewCandiaadate(<?php echo $id; ?>);">
                                <i class="lni lni-eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-warning" id="editSaveCandidate" onclick="goEditClient(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editClientModal">
                                <i class="lni lni-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="goDeleteClient(<?php echo $id; ?>);">
                                <i class="lni lni-trash"></i>
                            </button>
                           <a href="https://internship.roririsoft.com/assignment.php"> <button class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Task" >
                               <i class="lni lni-radio-button"></i>
                            </button></a>
                            
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Candidate Detail View -->
<div class="container" id="nextDivId" style="display: none;">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img id="viewImage" src="" alt="Candidate Image" class="rounded-circle p-1 bg-primary" width="110" />
                            <div class="mt-3">
                                <h4 id="viewName"></h4>
                                <p class="text-secondary mb-1" id="viewCourse"></p>
                                <p class="text-muted font-size-sm" id="viewAddress"></p>
                            </div>
                        </div>
                        <hr class="my-4" />
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Fees</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p class="form-control" id="viewFees"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Duration</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p class="form-control" id="viewDuration"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Gender</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p class="form-control" id="viewGender"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mode</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p class="form-control" id="viewMode"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p class="form-control" id="viewPhone"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p class="form-control" id="viewMail"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Joining Date</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p class="form-control" id="viewJoiningDate"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Username</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p class="form-control" id="viewUsername"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p class="form-control" id="viewPassword"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


            <div id="navTable" style="display: none;">
            <!-- Tabs navs -->
            <ul class="nav nav-tabs fs-6" id="myTab" role="tablist"> <!-- 'fs-5' is for slightly larger text -->
                            
                <li class="nav-item" role="presentation">
                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                    role="tab" aria-controls="profile" aria-selected="false">Payment</button>
                </li>
                <!-- <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                    role="tab" aria-controls="contact" aria-selected="false">Document</button>
                </li> -->
                <!-- <?php if ($_SESSION['is_admin'] == 'True'): ?>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button"
                    role="tab" aria-controls="login" aria-selected="false">Login History</button>
                </li>
                <?php endif; ?> -->
            </ul>
            <!-- Tabs navs -->


                 <!-- Tabs content -->
              <div class="tab-content" id="myTabContent">
               
               <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                 <div class="d-flex justify-content-end mb-3">
                   <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 'True'): ?>
                   <button type="button" id="addPayBtn" class="btn btn-primary" data-bs-toggle="modal"
                     onclick="goView(<?php echo $id; ?>);" data-bs-target="#PaymenttraineeModal">Add Payment</button>
                   <?php  endif; ?>
                 </div>

                 <div class="table-responsive">
                 <table id="example3" class="table table-striped table-bordered">
            <thead>
                <tr>
                <th>S. No</th>
                 <th>Date</th>
                 <th>Received Amount</th>
                 <th>Received By</th>
                 <th>Payment Mode</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
            </table>

                 </div>
               </div>
             
   
           
           
           
         </div>
         <!-- Tabs content -->




            </div><!--nav table-->




        </div><!-- end page-content -->
		</div>
			
		<!--end page wrapper -->
		<!--start overlay-->
		 <?php include "footer.php"; ?>
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
    // Function to set up date validations
    function setDateValidations() {
        // Get today's date
        const today = new Date();
        
        // Set the maximum date for the joining date inputs to today
        const formattedToday = today.toISOString().split("T")[0]; // yyyy-mm-dd format
        document.getElementById('joiningDate').setAttribute('max', formattedToday);
        document.getElementById('joiningDateEdit').setAttribute('max', formattedToday); // For edit modal

        // Calculate the date for 18 years ago for the DOB
        const eighteenYearsAgo = new Date();
        eighteenYearsAgo.setFullYear(today.getFullYear() - 18);
        const formattedDOB = eighteenYearsAgo.toISOString().split("T")[0]; // yyyy-mm-dd format
        
        // Set the max attribute of the DOB inputs to 18 years ago
        document.getElementById('dob').setAttribute('max', formattedDOB);
        document.getElementById('dobEdit').setAttribute('max', formattedDOB); // For edit modal
    }

    // Call the function to set validations when the page loads
    window.onload = setDateValidations;
</script>
     


    <script>

$('#username').on('input', function() {
    var username = $(this).val().trim();
    
    // Define the pattern for validation
    var pattern = /^[a-z]+_?[0-9]{0,5}$/;
    
    // Check if the username matches the pattern
    if (username === '') {
        $('#usernameError').text("Username is required").show();
        $('#submitBtn').prop('disabled', true);
    } else if (!pattern.test(username)) {
        $('#usernameError').text("Username must consist of lowercase letters, optionally one underscore, and up to 5 numbers.").show();
        $('#submitBtn').prop('disabled', true);
    } else {
        // Proceed with AJAX check if pattern matches
        $.ajax({
            url: 'action/checkIntern.php', // The PHP script that checks the username
            method: 'POST',
            data: { username: username },
            dataType: 'json',
            success: function(response) {
                if (response.exists) {
                    // Username exists, show error and disable submit button
                    $('#username').addClass('is-invalid'); // Add is-invalid class
                    $('#usernameError').text("Username already exists").show();
                    $('#submitBtn').prop('disabled', true); // Disable submit button if username exists
                } else {
                    // Username is available, remove error and enable submit button
                    $('#username').removeClass('is-invalid'); // Remove is-invalid class
                    $('#usernameError').hide();
                    $('#submitBtn').prop('disabled', false); // Enable submit button if username is available
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                $('#usernameError').text("An error occurred while checking the username").show();
            }
        });
    }
});

        

        // Back button click event
        document.getElementById('backBtnView').addEventListener('click', function() {
            // Show Add Candidates button
            document.getElementById("addCondidates").style.display = "inline-block";
            

            // Hide Back button
            document.getElementById("backBtnView").style.display = "none";

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

            // Show candidate table and hide detailed view (you can customize this part)
            document.getElementById("condidateTable").style.display = "block";
            document.getElementById("navTable").style.display = "none";
            document.getElementById("nextDivId").style.display = "none";
          

          
        });




    function goEditClient(id) 
  
  {
    $('#usernameEdit').prop('disabled', true);
    $.ajax({
        url: 'action/actCandidate.php',
        method: 'POST',
        data: {
            editIdClient: id
        },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
			

          $('#EditId').val(response.id);
          $('#nameEdit').val(response.name);
          $('#courseEdit').val(response.course_id);
          $('#feesEdit').val(response.fees);
          $('#durationNoEdit').val(response.durationNO);
          $('#durationEdit').val(response.duration);
          $('#genderEdit').val(response.gender);
          $('#modeEdit').val(response.mode);
          $('#phoneEdit').val(response.phone);
          $('#emailEdit').val(response.email);
          $('#addressEdit').val(response.address);
          $('#joiningDateEdit').val(response.join_date);
          $('#usernameEdit').val(response.username);
          $('#passwordEdit').val(response.password);
         
          
		  
   
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    }


    //---view function --------


    function goViewCandiaadate(id) 
                {   

                // Hide Add Candidates button
            document.getElementById("addCondidates").style.display = "none";

            // Show Back button
            document.getElementById("backBtnView").style.display = "inline-block";

            // Hide candidate table and show detailed view (you can customize this part)
            document.getElementById("condidateTable").style.display = "none";
            document.getElementById("nextDivId").style.display = "block";
            document.getElementById("navTable").style.display = "block";

            // Use PHP to set the base URL for the images
    var baseUrl = "<?php echo $internImageView; ?>"; // Ensure this variable is set in PHP
    var defaultUrl = "<?php echo $default_image; ?>"; // Ensure this variable is set in PHP
    $('#PayTrainee').val(id);


    $.ajax({
        url: 'action/actCandidate.php',
        method: 'POST',
        data: {
            viewIdClient: id
        },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {

            // Check if the image property exists and is not empty
        if (response.image && response.image.trim() !== '') {
            // Set the src attribute of the img tag to the actual image
            $('#viewImage').attr('src', baseUrl + response.image);
        } else {
            // Set the src attribute to the default image
            $('#viewImage').attr('src', defaultUrl);
        }

			
             
             

          $('#viewName').text(response.name);
          $('#viewCourse').text(response.course_id);
          $('#viewFees').text(response.fees);
          $('#viewDuration').text(response.durationNO + " " + response.duration);
        //   $('#durationEdit').text(response.duration);
          $('#viewGender').text(response.gender);
          $('#viewMode').text(response.mode);
          $('#viewPhone').text(response.phone);
          $('#viewMail').text(response.email);
          $('#viewAddress').text(response.address);
          $('#viewJoiningDate').text(response.join_date);
          $('#viewUsername').text(response.username);
          $('#viewPassword').text(response.password);
         
              $('#payStudent').val(response.inter_paym_id);
              $('#traineeName').val(response.name);
              $('#overAmnt').val(response.fees);
              $('#amntReceived').val(response.totalAmount);
              // Calculate the balance amount
              var balanceAmount = response.fees - response.totalAmount;
                
              // Set the balance amount in the #remaining field
              $('#remaining').val(balanceAmount);
		    // Now trigger payment table load
            loadPaymentDetails(id); // Call function to load payment table
   
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    }


    function loadPaymentDetails(intern_id) {
    $.ajax({
        url: 'action/actCandidate.php',  // URL of your PHP file that handles fetching payments
        method: 'POST',
        data: { internId: intern_id },    // Pass the intern_id to fetch payments
        dataType: 'json',
        success: function(response) {
            var paymentTable = $('#example3 tbody');
            paymentTable.empty();  // Clear existing table rows

            if (response.length > 0) {
                // Loop through the payments and append rows to the table
                $.each(response, function(index, payment) {
                    var row = '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + payment.formatted_date + '</td>' +
                        '<td>₹ ' + payment.formatted_amount + '</td>' +
                        '<td>' + payment.pay_mode + '</td>' +
                        '<td>' + payment.received_by + '</td>' +
                        '</tr>';
                    paymentTable.append(row);
                });
            } else {
                // Handle case where no payments are found
                paymentTable.append('<tr><td colspan="5">No payment records found</td></tr>');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error loading payment details:', status, error);
        }
    });
}





function goDeleteClient(id)
{
    //alert(id);
    if(confirm("Are you sure you want to delete Candidate?"))
    {
      $.ajax({
        url: 'action/actCandidate.php',
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
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );


                var table = $('#example3').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example3_wrapper .col-md-6:eq(0)' );
		} );
</script>

    <!--Handles the Ajax call-->
<script>
        $(document).ready(function () {

// Handle the form submission via AJAX
$('#candidatesForm').off('submit').on('submit', function (e) {
    e.preventDefault(); // Prevent normal form submission

    var form = document.getElementById('candidatesForm');

    // Check form validity using the HTML5 built-in validation
    if (form.checkValidity() === false) {
        e.stopPropagation(); // Stop submission if form is invalid
        form.classList.add('was-validated'); // Bootstrap's way of showing validation feedback
        return; // Exit the function, don't proceed with the AJAX request
    }
    // Concatenate duration number and unit
    var durationNo = $('#durationNo').val();
    var durationUnit = $('#duration').val();
    var fullDuration = durationNo + " " + durationUnit; // Example: "5 Day"

    // Create a new FormData object
    var formData = new FormData(this);
    formData.append('fullDuration', fullDuration); // Add the concatenated duration to FormData

    // Disable the submit button to prevent double submission
    const submitButton = $(this).find('button[type="submit"]');
    submitButton.prop('disabled', true);

    
    $.ajax({
        url: "action/actCandidate.php",
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
                resetForm('candidatesForm');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message
                });
            }
        },
        error: function (xhr, status, error) {
            // Re-enable the submit button on error
            submitButton.prop('disabled', false);
            console.error(xhr.responseText);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while adding Candidate data.'
            });
        }
    });
});




    // edit form --------------

// Handle the form submission via AJAX
$('#EditcandidatesForm').off('submit').on('submit', function (e) {
    e.preventDefault(); // Prevent normal form submission
    
    var form = document.getElementById('EditcandidatesForm');
    
    // Check form validity using the HTML5 built-in validation
    if (form.checkValidity() === false) {
        e.stopPropagation(); // Stop submission if form is invalid
        form.classList.add('was-validated'); // Bootstrap's way of showing validation feedback
        return; // Exit the function, don't proceed with the AJAX request
    }

    // Concatenate duration number and unit
    var durationNo = $('#durationNoEdit').val();
    var durationUnit = $('#durationEdit').val();
    var fullDuration = durationNo + " " + durationUnit; // Example: "5 Day"

    // Create a new FormData object
    var formData = new FormData(this);
    formData.append('fullDuration', fullDuration); // Add the concatenated duration to FormData

    // Manually append the username if the input is readonly
    var username = $('#usernameEdit').val();
    formData.append('usernameEdit', username); // Add username manually to FormData

    // Disable the submit button to prevent double submission
    const submitButton = $(this).find('button[type="submit"]');
    submitButton.prop('disabled', true);

    
    $.ajax({
        url: "action/actCandidate.php",
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json', // Expect JSON response
        success: function (response) {
            // Re-enable the submit button after success or error
            submitButton.prop('disabled', false);

            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
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

                // Reset the form after successful submission
                resetForm('EditcandidatesForm');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message
                });
            }
        },
        error: function (xhr, status, error) {
            // Re-enable the submit button on error
            submitButton.prop('disabled', false);
            console.error(xhr.responseText);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while adding Candidate data.'
            });
        }
    });
});







    // Reset the form when the 'Add Candidates' button is clicked
    $('#addCondidates').click(function () {
        resetForm('candidatesForm');
        $('#username').removeClass('is-invalid is-valid'); // Remove is-invalid class
        $('#submitBtn').prop('disabled', false);
    });
    });

    // Function to reset the form and hide error messages
    function resetForm(formId) {
    var form = document.getElementById(formId);
    form.reset(); // Reset the form
    form.classList.remove('was-validated'); // Remove validation styling
    $('.error-message').hide(); // Hide all error messages (if any custom ones exist)
    }

</script>


<script>
    $(document).ready(function () {

var today = new Date().toISOString().split('T')[0];
$('#date').attr('max', today);

function validateField(fieldId, errorId) {
  var value = $('#' + fieldId).val().trim();
  if (value === '') {
    $('#' + errorId).show();
    return false;
  } else {
    $('#' + errorId).hide();
    return true;
  }
}

$('#TraineeSubmitBtn').click(function (e) {
  e.preventDefault();
  var isValid = true;
  isValid = validateField('balance', 'amountError') && isValid;
  isValid = validateField('date', 'dateError') && isValid;
  isValid = validateField('payMode', 'modeError') && isValid;
  isValid = validateField('received', 'receivedError') && isValid;

  if (isValid) {
    $('#TraineePayment').trigger('submit');
    console.log("Form submitted");
  }
});

$('#TraineePayment').off('submit').on('submit', function (e) {
  e.preventDefault();
  var formData = new FormData(this);

  formData.forEach(function (value, key) {
    console.log(key + ": " + value);
  });

  $.ajax({
    url: "action/actCandidate.php",
    method: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      console.log("AJAX success:", response);
      if (response.success) {
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: response.message,
          timer: 2000
        }).then(function () {
          $('#PaymenttraineeModal').modal('hide');
          $('.modal-backdrop').remove();
          resetForm('TraineePayment');

          var id = $('#PayTrainee').val();
          loadPaymentDetails(id); // Call function to load payment table
          setTimeout(function () {
          
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
      console.error("AJAX error:", xhr.responseText);
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'An error occurred while adding Payment data.'
      });
      $('#TraineeSubmitBtn').prop('disabled', false);
    }
  });
});

function resetForm(formId) {
  document.getElementById(formId).reset();
  $('.error-message').hide();
}
});
</script>


	
	<!--app JS-->
	<script src="<?php echo $app; ?>"></script>
</body>

</html>