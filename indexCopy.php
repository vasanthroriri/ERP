
<!doctype html>
<html lang="en">
 
<head>
<?php 
session_start();
       if(!isset($_SESSION['username']))
    {
        header("Location:login.php");
    } 
?>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<title>RORIRI GROUPS</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
        
            <div class="row row-cols-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-3" style="margin: 50px;">
                    <div class="col">
						<div class="card">
							<div class="card-body">
								<div>
									<h5 class="card-title">Roriri Software Solution Pvt Ltd</h5>
								</div>
								<p class="card-text">We don't just develop software, we craft solutions</p>	<a href="RoririSoftware/index.php" class="btn btn-primary">Go Dashboard</a>
							</div>
						</div>
					</div>
                    <div class="col">
						<div class="card">
							<div class="card-body">
								<div>
									<h5 class="card-title">NexGen IT Academy</h5>
								</div>
								<p class="card-text">Investing in knowledge transforms potential into progress.</p>	<a href="NexGen_IT_Academy/index.php" class="btn btn-primary">Go Dashboard</a>
							</div>
						</div>
					</div>
                    <div class="col">
						<div class="card">
							<div class="card-body">
								<div>
									<h5 class="card-title">NexGen IT College</h5>
								</div>
								<p class="card-text">Where innovation meets education, shaping tomorrow's leaders.</p>	<a href="NexGen_IT_College/index.php" class="btn btn-primary">Go Dashboard</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<div>
									<h5 class="card-title">Coordinator</h5>
								</div>
								<p class="card-text">Where innovation meets education, shaping tomorrow's leaders.</p>	<a href="RoririSoftware/coordinator.php" class="btn btn-primary">Go Dashboard</a>
							</div>
						</div>
					</div>
            </div>
                    
    </div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class=""></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2024. All right reserved.</p>
		</footer>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>