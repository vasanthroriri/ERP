<?php
session_start();
include("C:\\xampp\\htdocs\\RORIRI_ERP\\db\\dbConnection.php");
include("../url.php");   
 
    
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
		<?php include("left.php");?>
		<!--end sidebar wrapper -->
		<!--start header -->
		<?php include("top.php");?>
		<!--end header -->
		<!--start page wrapper -->
		<?php include("addCourse.php");
        include("editStudent.php");?>

		<div class="page-wrapper">
			<div class="page-content">


				<div class="page-title-box">

					<div class="page-title-right">
						<h2 class="page-title">Course</h2>
						<div class="position-relative" style="height: 80px;"> <!-- Adjust height as needed -->
							<button type="button" id="addclgCourseBtn"
								class="btn btn-primary position-absolute top-0 end-0" data-bs-toggle="modal"
								data-bs-target="#AddclgCourseModal">Add New Course</button>
						</div>

					</div>
				</div>
				<div class="card" style="width: 18rem;">
					<div class="card-body">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">Some quick example text to build on the card title and make up
							the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
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

	<!-- Initialize tooltips -->

	<script>
		//Data Table script 

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
	<!-- JavaScript for Client-Side Validation and AJAX Submission -->


	<!--app JS-->
	<script src="<?php echo $app; ?>"></script>
</body>

</html>