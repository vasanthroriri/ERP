<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
<div class="sidebar-header">
	
				<?php if ($_SESSION['is_admin'] === 'True'): ?>
                <a href="../index.php">
                <?php endif; ?>
                	<div>
                		<img src="../assets/img/Logo Roriri.png" class="logo-icon" alt="RORIRI">
                	</div>
                <?php if ($_SESSION['is_admin'] === 'True'): ?>
                </a>
				<?php endif; ?>
				<div>
					<h4 class="logo-text">IT Academy</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<?php
				 if ($_SESSION['is_admin'] == 'True' ) {
					?>

					<li>
					<a href="index.php">
						<div class="parent-icon"><i class="lni lni-home me-2"></i></div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>

				<li>
					<a href="trainee.php">
						<div class="parent-icon"><i class="lni lni-graduation me-2"></i></div>
						<div class="menu-title">Trainee</div>
					</a>
				</li>
				

				<li>
					<a href="subject.php">
						<div class="parent-icon"><i class="lni lni-pencil me-2"></i></div>
						<div class="menu-title">Subject</div>
					</a>
				</li>

				<li>
					<a href="course.php">
						<div class="parent-icon"><i class="lni lni-book me-2"></i></div>
						<div class="menu-title">Course</div>
					</a>
				</li>

				<li>
					<a href="assignApplication.php">
						<div class="parent-icon"><i class="lni lni-stackoverflow"></i></div>
						<div class="menu-title">Application</div>
					</a>
				</li>
				
				<li>
					<a href="complaint.php">
						<div class="parent-icon"><i class="lni lni-customer me-2"></i></div>
						<div class="menu-title">Complaint</div>
					</a>
				</li>

				<li>
					<a href="https://treasurehunt.roririsoft.com/">
						<div class="parent-icon"><i class="lni lni-bulb me-2"></i></div>
						<div class="menu-title">Treasure Hunt</div>
					</a>
				</li>
				
				
				 
				<?php
				 }
				?>
				<?php
				 if ($_SESSION['role'] == '13') {
					?>

				<li>
					<a href="syllabus.php">
						<div class="parent-icon"><i class="lni lni-list me-2"></i></div>
						<div class="menu-title">Syllabus</div>
					</a>
				</li>

				
				<?php
				 }
				?>
			
				<?php
				 if ( $_SESSION['role'] == '13') {
					?>
				<li>
					<a href="assignApplication.php">
						<div class="parent-icon"><i class="lni lni-stackoverflow"></i></div>
						<div class="menu-title">Application</div>
					</a>
				</li>

				<li>
					<a href="attendance.php">
						<div class="parent-icon"><i class="lni lni-folder me-2"></i></div>
						<div class="menu-title">Attendance</div>
					</a>
				</li>

				<li>
					<a href="https://treasurehunt.roririsoft.com/">
						<div class="parent-icon"><i class="lni lni-bulb me-2"></i></div>
						<div class="menu-title">Treasure Hunt</div>
					</a>
				</li>

				
				<?php
				}
				?>
				
					<?php
			 if ( $_SESSION['role'] == '10') {
				
					?>
				<li>
					<a href="index.php">
						<div class="parent-icon"><i class="lni lni-home me-2"></i></div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>

				<li>
					<a href="traineeDetails.php?id=<?php echo $_SESSION['trainee_id'] ;?>">
						<div class="parent-icon"><i class="lni lni-graduation me-2"></i></div>
						<div class="menu-title">Profile</div>
					</a>
				</li>

				<li>
					<a href="listSyllabus.php">
						<div class="parent-icon"><i class="lni lni-book me-2"></i></div>
						<div class="menu-title">Subject</div>
					</a>
				</li>
				
					

				<li>
					<a href="listApplication.php">
						<div class="parent-icon"><i class="lni lni-pencil me-2"></i></div>
						<div class="menu-title">Application</div>
					</a>
				</li>
				

				<li>
					<a href="complaint.php">
						<div class="parent-icon"><i class="lni lni-customer me-2"></i></div>
						<div class="menu-title">Complaint</div>
					</a>
				</li>
				

				<li>
					<a href="https://treasurehunt.roririsoft.com/">
						<div class="parent-icon"><i class="lni lni-bulb me-2"></i></div>
						<div class="menu-title">Treasure Hunt</div>
					</a>
				</li>
		
				
				<?php
				 }
				?>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->