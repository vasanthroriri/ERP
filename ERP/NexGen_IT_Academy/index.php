<!doctype html>
<html lang="en">
<?php   session_start();
include("../db/dbConnection.php");
include("../url.php");
 include("head.php");
 
 $stuId = $_SESSION['id'];
 ?>


<body>
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


			<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

			<?php
			 if ($_SESSION['is_admin'] == 'True' ) {
					?>

					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Trainees</p>
										<h4 class="my-1">
										<?php
											$selEmp = "SELECT count(basic_id) as trainee_count FROM additional_details WHERE entity_id=3 AND add_status='Active'";
											$resultEmp = $conn->query($selEmp);

											if ($resultEmp) {
												$rowEmp = $resultEmp->fetch_assoc();
												$empCount = $rowEmp['trainee_count'];
												echo $empCount;
											} else {
												echo "Error: " . $conn->error;
											}
											?>
										</h4>
										<!-- <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i>$34 from last week</p> -->
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-wallet"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				 }
				?>

					<?php
					 if ( $_SESSION['role'] == '10') {
				
					?>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Completed Application</p>
										<h4 class="my-1">
										<?php
											$selEmp = "SELECT 
											COUNT(DISTINCT jt.app_id) AS complete_task_count
										FROM 
											application_track AS a,
											JSON_TABLE(a.application_details, '$[*]' COLUMNS (
												app_id VARCHAR(255) PATH '$.app_id',
												status VARCHAR(255) PATH '$.status',
												role VARCHAR(255) PATH '$.role',
												timestamp VARCHAR(255) PATH '$.timestamp'
											)) AS jt
										WHERE 
											jt.status = 'Complete' AND student_id = '$stuId'";
											$resultEmp = $conn->query($selEmp);
											// Define and execute the query to count total applications
									$total_app = "SELECT COUNT(application_id) AS app_count FROM application_tbl WHERE application_status = 'Active'";
									$total_app_res = $conn->query($total_app);
									$row_app = $total_app_res->fetch_assoc();
									$total_app_count = $row_app['app_count'];

									// Check if resultEmp is valid and fetch the result
									if ($resultEmp) {
										$rowEmp = $resultEmp->fetch_assoc();
										$empCount = $rowEmp['complete_task_count'];
										
										// Properly use the ternary operator and concatenate the results
										echo ($empCount ? $empCount : '0') . "/" . ($total_app_count ? $total_app_count : '0');
									} else {
										// Handle errors in SQL execution
										echo "Error: " . $conn->error;
									}

									
											?>
										</h4>
										<!-- <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>$24 from last week</p> -->
									</div>
									<div class="widgets-icons bg-light-info text-info ms-auto"><i class='bx bxs-group'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				

					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Completed Syllabus</p>
										<h4 class="my-1">
										<?php
											$selEmp = "SELECT 
											COUNT(DISTINCT jt.syllabus_id) AS pending_task_count
										FROM 
											syllabus_track AS a,
											JSON_TABLE(a.syl_track_details, '$[*]' COLUMNS (
												syllabus_id VARCHAR(255) PATH '$.syllabus_id',
												course_id VARCHAR(255) PATH '$.course_id', 
												status VARCHAR(255) PATH '$.status',
												role VARCHAR(255) PATH '$.role',
												timestamp VARCHAR(255) PATH '$.timestamp'
											)) AS jt
										WHERE 
											jt.status = 'Complete' AND syl_student_id = '$stuId'";
											$resultEmp = $conn->query($selEmp);

											if ($resultEmp) {
												$rowEmp = $resultEmp->fetch_assoc();
												$empCount = $rowEmp['pending_task_count'];
												echo ($empCount) ? $empCount : '0';
											} else {
												echo "Error: " . $conn->error;
											}
											?>
										</h4>
										<!-- <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>$34 from last week</p> -->
									</div>
									<div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-binoculars'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<?php
				 }
				?>

			<?php
			 if ($_SESSION['is_admin'] == 'True' ) {
					?>

					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Courses</p>
										<h4 class="my-1">
										<?php
											$selEmp = "SELECT COUNT(id) AS course_count FROM academy_course_details WHERE status = 'Available';";
											$resultEmp = $conn->query($selEmp);

											if ($resultEmp) {
												$rowEmp = $resultEmp->fetch_assoc();
												$empCount = $rowEmp['course_count'];
												echo $empCount;
											} else {
												echo "Error: " . $conn->error;
											}
											?>
										</h4>
										<!-- <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>12.2% from last week</p> -->
									</div>
									<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bx-line-chart-down'></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Income in this Month</p>
										<h4 class="my-1">
										<?php
											$selEmp = "SELECT SUM(received_amnt) AS total_income
                                            FROM payment
                                            WHERE entity_id = 3
                                              AND received_date >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
                                              AND received_date < DATE_FORMAT(DATE_ADD(CURDATE(), INTERVAL 1 MONTH), '%Y-%m-01')";
											$resultEmp = $conn->query($selEmp);

											if ($resultEmp) {
												$rowEmp = $resultEmp->fetch_assoc();
												$empCount = $rowEmp['total_income'];
												// Format the amount and add rupee symbol
                                                $formattedAmount = '₹ ' . number_format($empCount, 2);
                                                echo $formattedAmount;
											} else {
												echo "Error: " . $conn->error;
											}
											?>
										</h4>
									</div>
									<div class="text-success ms-auto font-35"><i class='bx bxl-shopify'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					
						<?php } ?>

				</div>

		
				</div>
				</div>
				<!--end row-->
				
			

			
			
		
		<!--end page wrapper -->
		<!--start overlay-->
		 <?php include "footer.php"; ?>
	</div>
	<!--end wrapper-->




	<!--start switcher-->
	
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="<?php echo $bootsrapBundle; ?>"></script>
	<!--plugins-->
	<script src="<?php echo $js; ?>"></script>
	<script src="<?php echo $simplebar;?>"></script>
	<script src="<?php echo $mentimenu; ?>"></script>
	<script src="<?php echo $perfectScrolbar;  ?>"></script>
	<script src="<?php echo $charts;  ?>"></script>
	<script src="<?php echo $datatableMin; ?>"></script>
	<script src="<?php echo $datatbaleBootstrap;?>"></script>
	
	<script src="<?php echo $index;?>"></script>
	<!--app JS-->
	<script src="<?php echo $app; ?>"></script>
</body>

</html>