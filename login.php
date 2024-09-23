<?php
session_start();
include("db/dbConnection.php");


include("url.php");

if (isset($_REQUEST['logout'])) {
    session_destroy();
    header("Location: login.php");
}
$error = "";
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     // Get the current host
//     $host = $_SERVER['HTTP_HOST'];

//     // Define entity IDs based on host names
//     $entity_id = 0; // Default to 0 or any value you prefer
//     if ($host === 'trainee.nexgenitacademy.com') { 
//         $entity_id = 3; // Host A corresponds to entity ID 1
//     } elseif ($host === 'workforce.roririsoft.com') {
//         $entity_id = 1; // Host B corresponds to entity ID 2
//     } elseif ($host === 'erp.inforiya.in') {
// 		$entity_id = ''; // Host B corresponds to entity ID 2
// 	}// Add more host conditions if needed

    // SQL query to fetch user details
    $sql = "SELECT basic_details.*, roles.*, additional_details.* 
            FROM basic_details 
            LEFT JOIN additional_details ON additional_details.basic_id = basic_details.id 
            LEFT JOIN roles ON roles.role_id = additional_details.role 
            WHERE basic_details.username = '$username' 
            AND basic_details.password = '$password'"; 
    
    if($entity_id != '') {
        $sql .= " AND additional_details.entity_id = '$entity_id'"; // Apply entity ID filter
    }
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user = $row['username'];
        $role_name = $row['role_name'];
        $role = $row['role'];
        $entity_id = $row['entity_id'];
        $is_admin = $row['is_admin']; 
        $userId = $row['id'];
        $course_id_1 = $row['course_id'];
        $name = $row['name'];

        // Set session variables
        $_SESSION['role'] = $role;
        $_SESSION['username'] = $user;
        $_SESSION['role_name'] = $role_name;
        $_SESSION['id'] = $userId;
        $_SESSION['entity_id'] = $entity_id;
        $_SESSION['is_admin'] = $is_admin;
        $_SESSION['name'] = $name;
        $_SESSION['course_id_1'] = $course_id_1;

        if ($is_admin === 'True') {
            $sqlAdmin = "SELECT role FROM `admin_tbl` WHERE `id` = '$userId'";
            $resAdmin = $conn->query($sqlAdmin);
            $rowAdmin = $resAdmin->fetch_assoc();
            $_SESSION['role_name'] = $rowAdmin['role'];
            header('Location: index.php');
        } elseif ($entity_id == 1) { 
            // Employee
            $sqlEmp = "SELECT * FROM `basic_details` 
            INNER JOIN `additional_details` ON `additional_details`.`basic_id` = `basic_details`.`id` 
            WHERE `basic_details`.`id` = '$userId'";
        
            $resEmp = $conn->query($sqlEmp);
        
            if ($resEmp->num_rows > 0) {
                $rowEmp = $resEmp->fetch_assoc();
                $_SESSION['image'] = $rowEmp['image'];
                header('Location: RoririSoftware/employeeDetails.php?id=' .  $userId);
                exit; 
            }
        } elseif ($entity_id == 2) { 
            // Student
            $sqlStu = "SELECT * FROM `basic_details` 
            INNER JOIN `additional_details` ON `additional_details`.`basic_id` = `basic_details`.`id` 
            WHERE `basic_details`.`id` = '$userId'";
            $resStudent = $conn->query($sqlStu);
            if ($resStudent->num_rows > 0) {
                header('Location:NexGen_IT_College/studentDetail.php?id=' . $userId);
                exit();
            }
        } elseif ($entity_id == 3) { 
            // Trainee
            $sqlTrainee = "SELECT * FROM `basic_details` 
            INNER JOIN `additional_details` ON `additional_details`.`basic_id` = `basic_details`.`id` 
            WHERE `basic_details`.`id` = '$userId'";
            $resTrainee = $conn->query($sqlTrainee);
            if ($resTrainee->num_rows > 0) {
                $rowTrainee = $resTrainee->fetch_assoc();
                $trainee_id = $rowTrainee['id'];
                $course_id = $rowTrainee['course'];
                $_SESSION['trainee_id'] = $trainee_id;
                header('Location:NexGen_IT_Academy/index.php');
                exit();
            }
        } else {
            echo 'Invalid entity ID.';
        }
    } else {
        $_SESSION['msg'] = "Invalid username or password.";
        header("Location: login.php");
        exit();
    }
// }

?>

<!doctype html>
<html lang="en">

<head>
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
	<title>RORIRI Software Solutions</title>
</head>
<style>
        #error-message {
            display: none;
            color: red;
        }
        .error {
            display: block;
        }
    </style>
<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-cover">
			<div class="">
				<div class="row g-0">

					<div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

                        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
							<div class="card-body">
                                 <img src="assets/images/login-images/login-cover.svg" class="img-fluid auth-img-cover-login" width="650" alt=""/>
							</div>
						</div>
						
					</div>

					<div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
						<div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
							<div class="card-body p-sm-5">
								<div class="">
									<div class="mb-3 text-center">
										<img src="assets\images\login-images\logo.png" width="170" alt="">
									</div>
									<div class="text-center mb-4">
										<h5 class="">Login</h5>
									</div>
									<div class="form-body">
									
										<?php if(isset($_SESSION['msg'])) {   ?>

										
											<div class="alert alert-danger">
												
												<?php echo $_SESSION['msg']; session_unset(); ?>
											</div>
									
										<p></p> <?php } ?>
										<form class="row g-3" action="" method="POST">
										
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Username</label>
												<input type="text" class="form-control" name="username" id="inputEmailAddress" placeholder="Username">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword"  placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
												</div>
											</div>
											
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary">Login</button>
												</div>
											</div>
											
										</form>
										<?php if(isset($error)) { ?>
            <div id='message'><?php echo $error; ?></div>
        <?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>