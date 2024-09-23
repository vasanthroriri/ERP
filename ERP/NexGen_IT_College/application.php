<?php
session_start();

include("../db/dbConnection.php");
include("../url.php");    
//    $selQuery = "SELECT a.*, b.* 
//     FROM client_tbl AS a
//     LEFT JOIN project_tbl as b ON a.client_id=b.client
//     WHERE a.client_status='Active'
//     GROUP BY a.client_id
//     ORDER BY
//     a.client_id DESC";
    
//     $resQuery = mysqli_query($conn , $selQuery); 
    
?>
<!doctype html>
<html lang="en">

<?php include "head.php";?>

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
			<?php include "left.php";?>
		<!--end sidebar wrapper -->
		<!--start header -->
			<?php include "top.php";?>
		<!--end header -->
		<!--start page wrapper -->
        
		
		<div class="page-wrapper">
			<div class="page-content">
                
				
            <div class="page-title-box">
                
                <div class="page-title-right">
                    <h2 class="page-title">Application Report</h2>

                </div>
                   
            </div>


            <!-- <div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-group">
                <label for="dateFilter" class="form-label">Date:</label>
                <input type="date" id="dateFilter" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="roleFilter" class="form-label">Role:</label>
                <select id="roleFilter" class="form-select">
                    <option value="">All Roles</option>
                    <option value="Employee">Employee</option>
                    <option value="Trainee">Trainee</option>
                    
                </select>
            </div>
        </div>
    </div>
</div> -->


        <!-- Table to display the attendance report -->
        <div id="loading">Loading Application data, please wait...</div>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
                      
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Description</th>
										
									</tr>
								</thead>
								<tbody>

                       
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
			</div><!--end page-content-->
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

     <!-- Initialize tooltips -->
     <script>
		$(document).ready(function() {
			$('#example2').DataTable();
		  } );
	</script>
	<!-- <script>
		$(document).ready(function() {
			var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });
		} );
</script> -->
     <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Load data when page loads
    loadAttendanceData();
});

function loadAttendanceData() {
    // Show the loading indicator
    const loadingElement = document.getElementById("loading");
    if (loadingElement) {
        loadingElement.style.display = 'block';
    }

    fetch('https://treasurebackend.roririsoft.com/forms/nexgen/academy/list/')
        .then(response => response.json())
        .then(data => {
            // Hide the loading indicator
            if (loadingElement) {
                loadingElement.style.display = 'none';
            }

            // Check if DataTable is already initialized and destroy it
            if ($.fn.DataTable.isDataTable('#example2')) {
                $('#example2').DataTable().destroy();
            }

            const tableBody = document.querySelector("#example2 tbody");
            tableBody.innerHTML = '';
            console.log(data.data.results);
            // Ensure the data structure is correct and not empty
            if (data.data && data.data.results && data.data.results.length > 0) {
                let i = 1;
                data.data.results.forEach(record => {
                    const row = `<tr>
                        <td>${i++}</td>
                        <td>${record.name}</td>
                        <td>${record.email}</td>
                        <td>${record.phone_number}</td>
                        <td>${record.course}</td>
                        <td colspan="3">${record.description}</td>
                    </tr>`;
                    tableBody.innerHTML += row;
                });

                // Initialize DataTable with buttons
                const table = $('#example2').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'print']
                });

                $('#example2').DataTable().buttons().container()
                    .appendTo('#example2_wrapper .col-md-6:eq(0)');
            } else {
                // Show no data message if no results are found
                tableBody.innerHTML = `<tr><td colspan="6">No data found for the selected date.</td></tr>`;
            }
        })
        .catch(error => {
            // Hide the loading indicator and handle the error
            if (loadingElement) {
                loadingElement.style.display = 'none';
            }
            console.error('Error fetching attendance records:', error);
            document.querySelector("#example2 tbody").innerHTML = `<tr><td colspan="6">Error loading data.</td></tr>`;
        });
}

   
</script>





   



	
	<!--app JS-->
	<script src="<?php echo $app; ?>"></script>
</body>

</html>