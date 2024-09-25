<?php
session_start();
include "url.php";
include "db/dbConnection.php";
    
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
                
			
			<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Industrial Visit Revenue</p>
										<h4 class="my-1">₹ 0,00</h4>
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bx-building"></i>
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
										<p class="mb-0 text-secondary">Internship</p>
										<h4 class="my-1">₹ 0,00</h4>	
									</div>
									<a href="RoririSoftware/internship.php"><div class="widgets-icons bg-light-info text-info ms-auto"><i class='bx bxs-briefcase'></i></a>
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
										<p class="mb-0 text-secondary">Course</p>
										<h4 class="my-1">₹ 0,00</h4>
									</div>
									<a href="NexGen_IT_Academy/course.php"><div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-graduation'></i></a>
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
										<p class="mb-0 text-secondary">WorkShop</p>
										<h4 class="my-1">₹ 0,00</h4>
									</div>
									<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bxs-group'></i>
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
										<p class="mb-0 text-secondary">NexGen IT Academy</p>
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
									<a href="NexGen_IT_Academy/index.php"><div class="text-primary ms-auto font-35"><i class='bx bxs-network-chart'></i></a>
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
										<p class="mb-0 text-secondary">NexGen IT College</p>
										<h4 class="my-1">₹ 0,00</h4>
									</div>
									<a href="NexGen_IT_College/index.php"><div class="text-danger ms-auto font-35"><i class='bx bxs-book'></i></a>
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
										<p class="mb-0 text-secondary">Projects</p>
										<h4 class="my-1">₹ 0,00</h4>
									</div>
									<a href="RoririSoftware/project.php"><div class="text-warning ms-auto font-35"><i class='bx bxs-folder'></i></a>
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
										<p class="mb-0 text-secondary">Riya IAS Academy</p>
										<h4 class="my-1">₹ 0,00</h4>
									</div>
									<div class="text-success ms-auto font-35"><i class='lni lni-target'></i>
									</div>
								</div>
							</div>
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
	<script src="assets/js/jquery.min.js"></script>
	<!--plugins-->
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script src="assets/plugins/select2/js/select2-custom.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.min.js"></script>
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="assets/js/index.js"></script>


